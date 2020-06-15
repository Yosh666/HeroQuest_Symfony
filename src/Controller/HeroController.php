<?php

namespace App\Controller;

use App\Entity\Aventurier;
use App\Form\AventurierType;
use App\Repository\AventurierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/aventurier")
 */
class HeroController extends AbstractController
{
    /**
     * @Route("/index", name="hero_index")
     */
    public function index(AventurierRepository $aventurierRepository): Response
    {
        return $this->render('hero/index.html.twig', [
            'aventuriers' => $aventurierRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name= "hero_new")
     * @Route ("/edit", name= "hero_edit")
     */
    public function edit( Aventurier $aventurier=null, Request $request):Response
    {
        if($aventurier == null){
            $aventurier= new Aventurier();
            $mode='new';
        }
        else
        {
            $mode='edit';
        }
        $form = $this->createForm(AventurierType::class,$aventurier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em= $this->getDoctrine()->getManager();
            $em->persist($aventurier);
            $em->flush();
            if($mode= 'new')
            {
                $this->addFlash("success","Bienvenue dans l'aventure ".$aventurier->getName(). " le ". $aventurier->getRace(). " \o/");
            }
            else{
                $this->addFlash("success","Bravo ".$aventurier->getName(). " tu as modifié un truc \o/");
            }
            return $this->redirectToRoute('hero_index');

        }

        return $this->render('hero/edit.html.twig',[
            'aventurier'=>$aventurier,
            'form'=>$form->createView(),
            'mode'=>$mode
        ]);
    }









}
