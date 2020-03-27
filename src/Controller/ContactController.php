<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;
use App\Entity\Users;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */

     
    public function index(Request $request)
    {
        $contact = new Contact();
        $user = new Users();
        $user->setId(4);
        $id = $user->getId();
        $contact->setIdUser($id);
        $contact->setDateRegister(new \DateTime());
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            var_dump($task);
            // return $this->redirectToRoute('connection');
        }

        return $this->render('front/contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
