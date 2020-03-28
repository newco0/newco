<?php

namespace App\Controller;

use App\Entity\AdminResponse;
use App\Form\AdminResponseType;
use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    /**
     * @Route("/messageadmin/{id}", name="message")
     */
    public function index($id)
    {
        unset($form);
        $entityManager = $this->getDoctrine()->getManager();
        $message =  $entityManager
            ->getRepository(Contact::class)
            ->find($id);

        $contact = new AdminResponse();
        $form = $this->createForm(AdminResponseType::class, $contact);
        return $this->render('admin/message/index.html.twig', [
            'form' => $form->createView(),
            'message' => $message
        ]);
    }
}
