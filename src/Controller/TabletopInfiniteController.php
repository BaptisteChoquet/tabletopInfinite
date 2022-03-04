<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TemplateRepository;
use App\Repository\BlankPageRepository;
use App\Entity\Template;
use App\Entity\Users;
use Dompdf\Dompdf;
use Dompdf\Options;

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
    * @Route("/market", name="marketplace")
    */
    public function marketplace(TemplateRepository $templateRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        return $this->render('tabletop_infinite/Marketplace/indexMarketplace.html.twig',  [
            'controller_name' => 'indexMarketplace',
            'templates'=>$templateRepository->findAll(),
            'currentUser'=> $this->getUser(),
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
    * @Route("/aPropos", name="about")
    */
    public function propos(): Response
    {
        return $this->render('tabletop_infinite/aPropos.html.twig', [
            'controller_name' => 'aPropos',
        ]);
        }
    
}


