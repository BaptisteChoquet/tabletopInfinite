<?php

namespace App\Controller;

use App\Entity\Favory;
use App\Entity\Users;
use App\Entity\Widget;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FavoriController extends AbstractController
{
    #[Route('/favori', name: 'app_favori')]
    public function index(): Response
    {
        return $this->render('favori/index.html.twig', [
            'controller_name' => 'FavoriController',
        ]);
    }

    public function addFavory(ManagerRegistry $doctrine,Users $Users , Widget $Widget){
        $entityManager = $doctrine->getManager();
        $favory = new Favory();
        $favory->setUsers($users);
        $favory->setWidget($widget);

        $entityManager->persist($favory);
        $entityManager->flush();
    }

    public function suppFavory(ManagerRegistry $doctrine, Favory $idFavory){
        
    }

}
