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
        unset($form);
        $entityManager = $this->getDoctrine()->getManager();
        //$idusers = $this->getUser();
        $publication = new Publication();
        $image = new Image();
        // $image->setType(0);
        // $publication->getImage()->add($image);
        //dd($publication->getImage());
        // $users = $entityManager
        //     ->getRepository(Users::class)
        //     ->find($idusers);
        // $publication->setUser($users);
        $form = $this->createForm(PublicationType::class, $publication);
        //dd($form->createView());
        $form->handleRequest($request);
        //dd($form->getData());
        if ($form->isSubmitted() && $form->isValid()) {
            $publi = $form->getData();
            //dd($publication);
            $entityManager->persist($publi);
            $entityManager->flush();
        }
        $publiaff = $entityManager
            ->getRepository(Publication::class)
            ->findAll();
        return $this->render('front/index/index.html.twig', [
            'image' => $form['image'],
            'publication' => $publiaff,
            'form' => $form->createView()
        ]);
    }
}
