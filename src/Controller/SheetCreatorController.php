<?php

namespace App\Controller;

use App\Entity\Template;
use App\Entity\Favory;
use App\Entity\Users;
use App\Entity\Widget;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\WidgetRepository;
use App\Repository\TemplateRepository;

class SheetCreatorController extends AbstractController
{
    #[Route('/sheet_creator', name: 'sheet_creator')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $widgets = $doctrine->getRepository(Widget::class)->findAll();
        $users = $this->getUser();
        $favorys = $doctrine->getRepository(Favory::class)->findby(['users'=>$users]);
        $void = [];
        return $this->render('blank_page/index.html.twig', [
            'controller_name' => 'SheetCreatorController',
            'widgets' => $widgets,
            'favorys' => $favorys,
            'template'=> $void
        ]);
    }


    /**
    * @Route("/sheet_creator/{id}", name="sheet_creatorId")
    */
    public function index2(ManagerRegistry $doctrine,int $id): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $repository = $doctrine->getRepository(Widget::class)->findAll();
        $users = $this->getUser();
        $favorys = $doctrine->getRepository(Favory::class)->findby(['users'=>$users]);
        $template = $doctrine->getRepository(Template::class)->findOneBy(["id" => $id]);
        return $this->render('blank_page/index.html.twig', [
            'controller_name' => 'SheetCreatorController',
            'widgets' => $repository,
            'template'=>$template,
            'favorys' => $favorys,
        ]);
    }
}