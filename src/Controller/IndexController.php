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
use Doctrine\Common\Collections\ArrayCollection;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index(Request $request, SluggerInterface $slugger)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $idusers = $this->getUser();

        $publication = new Publication();
        $image = new Image();
        $image->setName(md5($image->getPath()));
        $image->setType(0);
        $image->setPubli($publication);
        $users = $entityManager
            ->getRepository(Users::class)
            ->find($idusers);
        $publication->setUser($users);
        $publication->getImages()->add($image);
        $form = $this->createForm(PublicationType::class, $publication);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('images')->getData();
            if ($imageFile) {
                foreach ($imageFile as $subForm) {
                    /** @var UploadedFile $subForm */
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
                }
                $publi = $form->getData();
                $entityManager->persist($publi);
                $entityManager->flush();
            }
        }
        return $this->render('front/index/index.html.twig', [
            'form' => $form->createView()
        ]);
        

    }
}
