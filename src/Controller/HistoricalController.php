<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HistoricalController extends AbstractController
{
    /**
     * @Route("/historical", name="historical")
     */
    public function index()
    {
        return $this->render('front/historical/index.html.twig', [
            'controller_name' => 'HistoricalController',
        ]);
    }
}
