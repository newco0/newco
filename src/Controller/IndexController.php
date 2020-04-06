<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Publication;
use App\Entity\Image;
use App\Entity\Users;
use App\Form\PublicationType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
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
        $idusers = $this->getUser();
        $publication = new Publication();
        $image = new Image();
        //$publication->getImages()->add($image);
        $users = $entityManager
            ->getRepository(Users::class)
            ->find($idusers);
        $publication->setUser($users);

        $form = $this->createForm(PublicationType::class, $publication);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('images')->getData();
            //dd($imageFile);
            if ($imageFile) {
                foreach ($imageFile as $subForm) {
                    $img = new Image();
                    $img->setName(md5($subForm->getPath()));
                    $img->setType(0);
                    $img->setPubli($publication);
                    /** @var UploadedFile $subForm */
                    //dd($subForm);
                    $originalFilename = pathinfo($subForm->getPath()->getClientOriginalName(), PATHINFO_FILENAME);
                    $safeFilename = $slugger->slug($originalFilename);
                    $newFilename = $safeFilename . '-' . uniqid() . '.' . $subForm->getPath()->guessExtension();
                    try {
                        $subForm->getPath()->move(
                            $this->getParameter('image_directory'),
                            $newFilename
                        );
                        $subForm->setPath($newFilename);
                    } catch (FileException $e) {
                    }
                    $publication->addImage($img);
                }
                $publi = $form->getData();
                $entityManager->persist($publi);
                $entityManager->flush();
            }
        }
        $publiaff = $entityManager
            ->getRepository(Publication::class)
            ->findAll();
        return $this->render('front/index/index.html.twig', [
            'publication' => $publiaff,
            'form' => $form->createView()
        ]);
    }
}
