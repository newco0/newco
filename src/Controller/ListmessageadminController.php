<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;
use Symfony\Component\HttpFoundation\Response;

class ListmessageadminController extends AbstractController
{
    /**
     * @Route("/listmessageadmin", name="listmessageadmin")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $allmessage = $entityManager->getRepository(Contact::class)->findAll();

        return $this->render('admin/listmessageadmin/index.html.twig', [
            'allmessage' => $allmessage,

        ]);
    }

    /**
     * @Route("/listmessageadmin/updateisread/{id}", name="updateisread")
     */

    public function updateIsRead($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $message = $entityManager->getRepository(Contact::class)->find($id);
        if(!$message){
            return new Response(false);
        }
        $message->setIsRead(!$message->getIsRead());
        $entityManager->persist($message);
        $entityManager->flush();
        return new Response(true);
        // $message->setIsRead('New product name!');
    }

    /**
     * @Route("/listmessageadmin/updateisactive/{id}", name="updateisactive")
     */

    public function updateIsActive($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $message = $entityManager->getRepository(Contact::class)->find($id);
        if(!$message){
            return new Response(false);
        }
        $message->setIsActive(!$message->getIsActive());
        $entityManager->persist($message);
        $entityManager->flush();
        return new Response(true);
    }
}
