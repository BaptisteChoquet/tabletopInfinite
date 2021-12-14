<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BlankPageRepository;

class TabletopInfiniteController extends AbstractController
{
    /**
    *@Route("/home", name="home")
    */
    public function index(): Response
    {
        return $this->render('tabletop_infinite/RollTest.html.twig', [
            'controller_name' => 'RollTest',
        ]);
    }

    /**
     * @Route("home/characterSheet")
     */
    public function characterSheet(BlankPageRepository $blankPageRepository): Response
    {
        return $this->render('blank_page/index.html.twig', [
            'blank_pages' => $blankPageRepository->findAll(),
        ]);
    }
    /**
    * @Route("/aPropos", name="A_Propos")
    */
    public function propos(): Response
    {
        return $this->render('tabletop_infinite/aPropos.html.twig', [
            'controller_name' => 'aPropos',
        ]);
    }
}


