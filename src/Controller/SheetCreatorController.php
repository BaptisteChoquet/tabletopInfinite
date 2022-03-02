<?php

namespace App\Controller;

use App\Entity\Favory;
use App\Entity\Users;
use App\Entity\Widget;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\WidgetRepository;

class SheetCreatorController extends AbstractController
{
    #[Route('/sheet_creator', name: 'sheet_creator')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $widgets = $doctrine->getRepository(Widget::class)->findAll();
        $users = $this->getUser();
        $favorys = $doctrine->getRepository(Favory::class)->findby(['users'=>$users]);
        return $this->render('blank_page/index.html.twig', [
            'controller_name' => 'SheetCreatorController',
            'widgets' => $widgets,
            'favorys' => $favorys
        ]);
    }
}
