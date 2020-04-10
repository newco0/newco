<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Publication;
use App\Entity\Image;
use App\Entity\Users;
use App\Form\PublicationType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\String\Slugger\SluggerInterface;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index(Request $request, SluggerInterface $slugger)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $users = $this->getUser();
        
        $publiaff = $entityManager
                ->getRepository(Publication::class)
                ->findWithImage();
                //dd($publiaff);
        $publication = new Publication();
        $image = new Image();
        $image->setType(0);
        $image->setPublication($publication);
        $publication->getImage()->add($image);
        $users = $entityManager
            ->getRepository(Users::class)
            ->find($users);
        $publication->setUser($users);
        $form = $this->createForm(PublicationType::class, $publication);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $publi = $form->getData();
            //dd($publication);
            $entityManager->persist($publi);
            $entityManager->flush();
            // dd($form);
            return $this->redirectToRoute('index');
        }
        
        return $this->render('front/index/index.html.twig', [
            'users' => $users,
            'publication' => $publiaff,
            'form' => $form->createView()
        ]);
    }
}
