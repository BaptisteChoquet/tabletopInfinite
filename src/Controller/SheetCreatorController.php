<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\WidgetRepository;
use App\Repository\TemplateRepository;

class SheetCreatorController extends AbstractController
{
    //#[Route('/sheet_creator', name: 'sheet_creator')]
    

    /**
    * @Route("/sheet_creator", name="sheet_creator")
    */
    public function index(WidgetRepository $doctrine): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $repository = $doctrine->findAll();
        $void = [];
        return $this->render('blank_page/index.html.twig', [
            'controller_name' => 'SheetCreatorController',
            'widgets' => $repository,
            'template'=> $void
            
        ]);
    }


    /**
    * @Route("/sheet_creator/{id}", name="sheet_creatorId")
    */
    public function index2(WidgetRepository $doctrine,TemplateRepository $doctrineTemplate,int $id): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $repository = $doctrine->findAll();
       
        $template = $doctrineTemplate->findOneBy(["id" => 10]);
        return $this->render('blank_page/index.html.twig', [
            'controller_name' => 'SheetCreatorController',
            'widgets' => $repository,
            'template'=>$template
        ]);
    }
}