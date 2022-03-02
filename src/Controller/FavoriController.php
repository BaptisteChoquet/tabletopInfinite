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


class FavoriController extends AbstractController
{
    #[Route('/favori', name: 'app_favori')]
    public function index(): Response
    {
        return $this->render('favori/index.html.twig', [
            'controller_name' => 'FavoriController',
        ]);
    }
    #[Route('/addFavory/{idUsers}/{idWidget}', name: 'add_favory')]
    public function addFavory(ManagerRegistry $doctrine, int $idUsers, int $idWidget){
        $entityManager = $doctrine->getManager();
        if($idUsers == null || $idWidget == null){
            echo("null");
        }
        $users = $doctrine->getRepository(Users::class)->find($idUsers);
        $widget = $doctrine->getRepository(Widget::class)->find($idWidget);
        echo($idUsers);
        $favory = new Favory();
        $favory->setUsers($users);
        $favory->setWidget($widget);

        $entityManager->persist($favory);
        $entityManager->flush();
        $this->denyAccessUnlessGranted('ROLE_USER');
        $widgets = $doctrine->getRepository(Widget::class)->findAll();
        return $response = $this->forward('App\Controller\SheetCreatorController::index');
    }

    #[Route('/suppFavory/{idUsers}/{idWidget}', name: 'supp_favory')]
    public function suppFavory(ManagerRegistry $doctrine, int $idUsers, int $idWidget){
        $entityManager = $doctrine->getManager();
        $users = $doctrine->getRepository(Users::class)->find($idUsers);
        $widget = $doctrine->getRepository(Widget::class)->find($idWidget);
        $favory = $entityManager->getRepository(Favory::class)->findOneBy([
            'users'=>$users,
            'widget'=>$widget
        ]);
        $entityManager->remove($favory);
        $entityManager->flush();
        $widgets = $doctrine->getRepository(Widget::class)->findAll();
        return $response = $this->forward('App\Controller\SheetCreatorController::index');
    }

}
