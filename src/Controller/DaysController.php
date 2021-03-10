<?php

namespace App\Controller;

use App\ViewModel\Date;
use App\Form\DaysType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class DaysController extends AbstractController
{
    /**
     * @Route("/", name="days", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function calculate(Request $request): Response
    {
        $date = new Date();
        $form = $this->createForm(DaysType::class, $date);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            return $this->render('days/show.html.twig', [
                'date' => $date,
            ]);
        }

        return $this->render('days/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
