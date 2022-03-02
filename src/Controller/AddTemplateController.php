<?php

namespace App\Controller;

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
        $em = $this->getDoctrine()->getManager();
        $em->persist($template);
        $em->flush();
        //$user = $this->container->get('security.token_storage')->getToken()->getUser();
        //$user = $user->getName();

        
        return new Response("");
    }


}
