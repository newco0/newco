<?php

namespace App\Controller;

use App\Entity\AdminResponse;
use App\Form\AdminResponseType;
use App\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MessageController extends AbstractController
{
    /**
     * @Route("/admin/messageadmin/{id}", name="messageadmin")
     */

    public function index(MailerInterface $mailer, Request $request, $id)
    {
        unset($form);
        $entityManager = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        $message =  $entityManager
            ->getRepository(Contact::class)
            ->find($id);

        $email = $message->getEmail();
        $object = $message->getObject();

        $response =  $entityManager
            ->getRepository(AdminResponse::class)
            ->findBy([
                'contact' => $id
            ]);

        // initialize a new adminresponse

        $adminresp = new AdminResponse();
        $adminresp->setAdmin($user);
        $adminresp->setContact($message);

        // create form with the adminresp

        $form = $this->createForm(AdminResponseType::class, $adminresp);
        $form->handleRequest($request);

        // if the form is submitted and valid save this and return a new jsonreponse error to false, otherwise, return the form submitted
        // WARNING this form is send by an ajax query, and the response with the render in the else if, comes to display the error message from the validator

        if ($form->isSubmitted() && $form->isValid()) {
            $adminresp = $form->getData();
            $text = $form->get('message')->getData();
            $entityManager->persist($adminresp);
            $entityManager->flush();

            // send mail by calling the sendmail method to the user after flush the data

            $this->sendEmail($mailer, "socialnewco@gmail.com", $email, $object, $text);

            return new JsonResponse(['error' => false]);
        } else if ($form->isSubmitted() && !$form->isValid()) {
            return $this->render('admin/message/index.html.twig', [
                'form' => $form->createView(),
                'message' => $message,
                'response' => $response
            ]);
        }
        return $this->render('admin/message/index.html.twig', [
            'form' => $form->createView(),
            'message' => $message,
            'response' => $response
        ]);
    }

    public function sendEmail($his, $from, $to, $subject, $html)
    {
        $email = (new Email())
            ->from($from)
            ->to($to)
            ->subject($subject)
            ->html("<p>$html</p>");
        $his->send($email);
        return new Response(true);
    }
}
