<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\entity\Users;

class MyProfilController extends AbstractController
{
    /**
     * @Route("/myprofil", name="my_profil")
     */
    public function index()
    {
        
        $users = new Users();

        return $this->render('front/my_profil/index.html.twig', [
            'controller_name' => 'MyProfilController',
        ]);
    }
}
