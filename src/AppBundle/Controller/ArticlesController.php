<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\ArticlesType;

/**
 * @Route("/Articles")
 */
class ArticlesController extends Controller
{
    /**
     * @Route("/Ajout", name="ajoutArticles")
     */
    public function AddAction(Request $request)
    {
        $form = $this->createForm(ArticlesType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            return $this->redirectToRoute('ajoutArticles');
        }
        
        return $this->render('@App/Articles/add.html.twig', [
            'form'      => $form->createView()
        ]);
    }

}
