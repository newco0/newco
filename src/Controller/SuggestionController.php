<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SuggestionController extends AbstractController
{
    /**
     * @Route("/suggestion", name="suggestion")
     */
    public function index()
    {
        return $this->render('front/suggestion/index.html.twig', [
            'controller_name' => 'SuggestionController',
        ]);
    }
}
