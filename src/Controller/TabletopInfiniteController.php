<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TabletopInfiniteController extends AbstractController
{
    /**
    * @Route("/home")
    */
    public function index(): Response
    {
        return $this->render('tabletop_infinite/RollTest.html.twig', [
            'controller_name' => 'RollTest',
        ]);
    }
}
