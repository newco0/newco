<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Publication;
use App\Entity\Image;
use Symfony\Component\Security\Core\Security;
use App\Entity\Users;
use App\Form\PublicationType;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */


    public function index(Security $security)
    {
        $publication = new Publication();
        $image = new Image();

        $users = $security->getUser();

        $form = $this->createForm(PublicationType::class, [$publication, $image]);
        

        return $this->render('front/index/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
