<?php

namespace App\Controller;

use App\Entity\Template;
use App\Form\TemplateType;
use App\Repository\TemplateRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Dompdf\Dompdf;
use Dompdf\Options;

#[Route('/template')]
class TemplateController extends AbstractController
{
    #[Route('/', name: 'template_index', methods: ['GET'])]
    public function index(TemplateRepository $templateRepository): Response
    {
        return $this->render('template/index.html.twig', [
            'templates' => $templateRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'template_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $template = new Template();
        $form = $this->createForm(TemplateType::class, $template);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($template);
            $entityManager->flush();

            return $this->redirectToRoute('template_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('template/new.html.twig', [
            'template' => $template,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'template_show', methods: ['GET'])]
    public function show(Template $template): Response
    {
        return $this->render('template/show.html.twig', [
            'template' => $template,
        ]);
    }

    #[Route('/{id}/edit', name: 'template_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Template $template, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TemplateType::class, $template);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('template_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('template/edit.html.twig', [
            'template' => $template,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'template_delete', methods: ['POST'])]
    public function delete(Request $request, Template $template, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$template->getId(), $request->request->get('_token'))) {
            $entityManager->remove($template);
            $entityManager->flush();
        }

        return $this->redirectToRoute('template_index', [], Response::HTTP_SEE_OTHER);
    }
    // /**
    //  * @Route("/test/{id}")
    //  */
    // public function downloadToPDF(TemplateRepository $templateRepository, Template $template, int $id)
    // {
    //     // Configure Dompdf according to your needs
    //     $pdfOptions = new Options();
    //     $pdfOptions->set('isPhpEnabled', true);
    //     $pdfOptions->set('isHtml5ParserEnabled', true);
    //     $pdfOptions->set('isRemoteEnabled', true);
        
        
    //     // Instantiate Dompdf with our options
    //     $dompdf = new Dompdf($pdfOptions);
    //     $dompdf->set_base_path("/public/css/");

        
    //     // Retrieve the HTML generated in our twig file
    //     $html = $this->renderView('template/show.html.twig', [
    //         'templates'=> $templateRepository->find($id),
    //         'title' => "Welcome to our PDF Test"
    //     ]);
        
    //     // Load HTML to Dompdf
    //     $dompdf->loadHtml($html);

    //     // Render the HTML as PDF
    //     $dompdf->render();

    //     // Output the generated PDF to Browser (force download)
    //     $dompdf->stream("mypdf.pdf", [
    //         "Attachment" => false
    //     ]);

        
    // }
}
