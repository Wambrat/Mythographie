<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MythologyController extends AbstractController
{
    /**
     * @Route("/", name="mythology")
     */
    public function index(): Response
    {
        
        
        return $this->render('mythology/index.html.twig', [
            
        ]);
    }
}
