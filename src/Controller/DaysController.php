<?php

namespace App\Controller;

use App\Form\DaysType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DaysController extends AbstractController
{
    /**
     * @Route("/days", name="days")
     */
    public function index(): Response
    {
        $daysForm = $this->createForm(DaysType::class);

        return $this->render('days/index.html.twig', [
            'controller_name' => 'DaysController',
            'form' => $daysForm->createView(),
        ]);
    }
}
