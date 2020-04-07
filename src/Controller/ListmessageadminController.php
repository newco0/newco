<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListmessageadminController extends AbstractController
{
    /**
     * @Route("/admin/listmessageadmin", name="listmessageadmin")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();

        // return all the messages contact to the view

        $allmessage = $entityManager->getRepository(Contact::class)->findAll();

        return $this->render('admin/listmessageadmin/index.html.twig', [
            'allmessage' => $allmessage,

        ]);
    }

    /**
     * @Route("/admin/listmessageadmin/updateisread/{id}", name="updateisread")
     */

    public function updateIsRead($id)
    {
        $entityManager = $this->getDoctrine()->getManager();

        // check if the message is existing, then set the isRead to the opposite. Otherwise send a jsonreponse error setting to true

        $message = $entityManager->getRepository(Contact::class)->find($id);

        if (!$message) {
            return new JsonResponse(["error" => true]);
        }

        $message->setIsRead(!$message->getIsRead());
        $entityManager->flush();

        return new JsonResponse(["error" => false]);
        // $message->setIsRead('New product name!');
    }

    /**
     * @Route("/admin/listmessageadmin/updateisactive/{id}", name="updateisactive")
     */

    public function updateIsActive($id)
    {
        $entityManager = $this->getDoctrine()->getManager();

        // check if the message is existing, then set the isActive to the opposite. Otherwise send a jsonreponse error setting to true

        $message = $entityManager->getRepository(Contact::class)->find($id);

        if (!$message) {
            return new JsonResponse(["error" => true]);
        }

        $message->setIsActive(!$message->getIsActive());
        $entityManager->flush();

        return new JsonResponse(["error" => false]);
    }
}
