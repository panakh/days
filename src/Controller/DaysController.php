<?php

namespace App\Controller;

use App\Entity\Days;
use App\Form\DaysType;
use App\Repository\DaysRepository;
use App\Service\DaysService;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Intl\Timezones;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/days")
 */
class DaysController extends AbstractController
{
    /**
//     * @Route("/", name="days_index", methods={"GET"})
//     */
//    public function index(): Response
//    {
//        return $this->render('days/index.html.twig', [
//            'days' => $daysRepository->findAll(),
//        ]);
//    }

    /**
     * @Route("/new", name="days_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $day = new Days();
        $form = $this->createForm(DaysType::class, $day);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $daysService = new DaysService();

            return $this->render('days/show.html.twig', [
                'timezone' => $day->getTimezone(),
                'offset' => $daysService->getUTCOffset($day->getDate(), $day->getTimezone()),
            ]);
        }

        return $this->render('days/new.html.twig', [
            'day' => $day,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="days_show", methods={"GET"})
     */
    public function show(Days $day): Response
    {
        return $this->render('days/show.html.twig', [
            'day' => $day,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="days_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Days $day): Response
    {
        $form = $this->createForm(DaysType::class, $day);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('days_index');
        }

        return $this->render('days/edit.html.twig', [
            'day' => $day,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="days_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Days $day): Response
    {
        if ($this->isCsrfTokenValid('delete'.$day->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($day);
            $entityManager->flush();
        }

        return $this->redirectToRoute('days_index');
    }
}
