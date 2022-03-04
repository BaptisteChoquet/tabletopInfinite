<?php

namespace App\Controller;
use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Template;

class AddTemplateController extends AbstractController
{
    /**
     * @Route("/add/template", name="add_template")
     */
    public function index(): Response
    {
        
        $template = new Template();
        $template->setName($_POST["name"]);
        $template->setType("bebou");
        $template->setContenu($_POST["page"]);
        $template->setDescription($_POST["description"]);
        $users = $this->getUser();
        $template->setUsers($users);
        $em = $this->getDoctrine()->getManager();
        $em->persist($template);
        $em->flush();
        

        
        return new Response("");
    }


}
