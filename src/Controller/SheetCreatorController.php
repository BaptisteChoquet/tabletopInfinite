<?php

namespace App\Controller;

use App\Entity\Template;
use App\Entity\Favory;
use App\Entity\Users;
use App\Entity\Widget;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\WidgetRepository;
use App\Repository\TemplateRepository;

class SheetCreatorController extends AbstractController
{
    #[Route('/sheet_creator', name: 'sheet_creator')]
    public function index(ManagerRegistry $doctrine, Request $request): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $widgets = $doctrine->getRepository(Widget::class)->findAll();
        $users = $this->getUser();
        $favorys = $doctrine->getRepository(Favory::class)->findby(['users'=>$users]);
        $void = [];
        $entityManager = $doctrine->getManager();
        if ($request->isXmlHttpRequest()){
            $data =$_POST['id'];
            $widget = $doctrine->getRepository(Widget::class)->find($data);
                

                    if($favory = $entityManager->getRepository(Favory::class)->findOneBy([
                        'users'=>$users,
                        'widget'=>$widget
                    ])){
                        $favory = $entityManager->getRepository(Favory::class)->findOneBy([
                            'users'=>$users,
                            'widget'=>$widget
                        ]);
                        $entityManager->remove($favory);
                        $entityManager->flush();
                        echo("supp without for");
                        
                        
                    
                    }else{
                        $favory = new Favory();
                        $favory->setUsers($users);
                        $favory->setWidget($widget);
                        $entityManager->persist($favory);
                        $entityManager->flush();
                        echo("add with for");
                    
                    }
                
            
               
        }
        return $this->render('blank_page/index.html.twig', [
            'controller_name' => 'SheetCreatorController',
            'widgets' => $widgets,
            'favorys' => $favorys,
            'template'=> $void
        ]);
    }


    /**
    * @Route("/sheet_creator/template/{id}", name="sheet_creatorId")
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

    /**
    * @Route("/sheet_creator/ajax")
    */
    public function ajax(Request $request){
        var_dump($_POST);
    }

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
    }

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
    }
}