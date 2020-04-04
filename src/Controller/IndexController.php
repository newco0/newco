<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Publication;
use App\Entity\Image;
use App\Entity\Users;
use App\Form\PublicationType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */


    public function index(Request $request, SluggerInterface $slugger)
    {
        $publication = new Publication();
        $image = new Image();
        $image->setType(0);
        $publication->getImages()->add($image);
        $image2 = new Image();
        $image2->setName('coucou');
        $publication->getImages()->add($image2);

        $entityManager = $this->getDoctrine()->getManager();
        $idusers = $this->getUser();
        
        $users = $entityManager
                ->getRepository(Users::class)
                ->find($idusers);
        $publication->setUser($users);
        $form = $this->createForm(PublicationType::class, [$publication, $image]);
        $form->handleRequest($request);
        //dd($form->getData());
        if ($form->isSubmitted() && $form->isValid()) {
            ///** @var UploadedFile $image */
            // $image = $form->get('image')->getData();
            // if ($image) {
            //     $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            //     // this is needed to safely include the file name as part of the URL
            //     $safeFilename = $slugger->slug($originalFilename);
            //     $newFilename = $safeFilename.'-'.uniqid().'.'.$image->guessExtension();
            //     // Move the file to the directory where brochures are stored
            //     try {
            //         $image->move(
            //             $this->getParameter('image_directory'),
            //             $newFilename
            //         );
            //     } catch (FileException $e) {
            //         // ... handle exception if something happens during file upload
            //     }
            //     // updates the 'brochureFilename' property to store the PDF file name
            //     // instead of its contents
            //     $image->setPath($newFilename)
            //     ->setName($newFilename)
            //     ->setType(2);
            $publi = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($publi);
            $entityManager->flush();
        }
        return $this->render('front/index/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
    // }
}
