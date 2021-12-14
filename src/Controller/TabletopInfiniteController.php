<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TemplateRepository;

class TabletopInfiniteController extends AbstractController
{
    /**
    * @Route("/home", name="home")
    */
    public function index(): Response
    {
        return $this->render('tabletop_infinite/RollTest.html.twig', [
            'controller_name' => 'RollTest',
        ]);
    }

    /**
    * @Route("/market", name="marketplace")
    */
    public function marketplace(TemplateRepository $templateRepository): Response
    {
        return $this->render('tabletop_infinite/Marketplace/indexMarketplace.html.twig',  [
            'controller_name' => 'indexMarketplace',
            'templates'=>$templateRepository->findAll(),
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
