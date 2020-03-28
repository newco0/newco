<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Users;
Use App\Form\InscriptionType;
use Symfony\Component\HttpFoundation\Request;

class ConnectionController extends AbstractController
{
    /**
     * @Route("/connection", name="connection")
     */
    public function inscription(Request $request)
    {
        $users = new Users();
        $form = $this->createForm(InscriptionType::class, $users);
        
        $form->handleRequest($request);
        
        $users->setIsActive(1)
            ->setDateRegister(new \DateTime('now'));
        if ($form->isSubmitted() && $form->isValid()) {
            var_dump($form->getdata());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($users);
            $entityManager->flush();
        }

        return $this->render('front/connection/index.html.twig', [
            'form' => $form->createView()
        ]);
        
    }
}
