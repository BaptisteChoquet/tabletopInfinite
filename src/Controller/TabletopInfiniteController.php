<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TemplateRepository;
use App\Repository\BlankPageRepository;

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
        return $this->render('tabletop_infinite/Marketplace/indexMarketplace.html.twig',  [
            'controller_name' => 'indexMarketplace',
            'templates'=>$templateRepository->findAll(),
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
    * @Route("/aPropos", name="A_Propos")
    */
    public function propos(): Response
    {
        return $this->render('tabletop_infinite/aPropos.html.twig', [
            'controller_name' => 'aPropos',
        ]);
        }
    
        /**
     * @Route("/test")
     */
    public function downloadToPDF(TemplateRepository $templateRepository)
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('isPhpEnabled', true);
        
        
        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        $dompdf->set_base_path("/public/css/");

        
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('tabletop_infinite/Marketplace/indexMarketplace.html.twig', [
            'templates' =>$templateRepository->findAll(),
            'title' => "Welcome to our PDF Test"
        ]);

        $html = $html.'<link href="style.css" type="text/css" rel="stylesheet" />';
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);

        
    }
}


