<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\WidgetRepository;

class SheetCreatorController extends AbstractController
{
    #[Route('/sheet_creator', name: 'sheet_creator')]
    public function index(WidgetRepository $doctrine): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $repository = $doctrine->findAll();
        return $this->render('blank_page/index.html.twig', [
            'controller_name' => 'SheetCreatorController',
            'widgets' => $repository
        ]);
    }
}
