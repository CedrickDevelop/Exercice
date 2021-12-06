<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Departement;
use AppBundle\Form\DepartementType;

/**
 * @Route("/Departement")
 */
class DepartementController extends Controller
{
    /**
     * @Route("/Ajout", name="Departement")
     */
    public function AjoutAction(Request $request)
    {
        // Creation du formulaire généré et recupertaion des entrées en fonction de l'entité pour le persister directement
        $dep = new Departement();
        $formDep = $this->createForm(DepartementType::class, $dep);
        $formDep->handleRequest($request);

        $cnx = $this->getDoctrine()->getManager();

        if ($formDep->isSubmitted())
        {
            $cnx->persist($dep);
            $cnx->flush();

            return $this->redirectToRoute('Afficher');

        }

        return $this->render('@App/Departement/ajout.html.twig', [
            'form'  =>  $formDep->createView()
        ]);
    }

    /**
     * @Route("/Show", name="Afficher")
     */
    public function ShowAction()
    {
        return $this->render('@App/Departement/show.html.twig', [
            
        ]);
    }

    /**
     * @Route("/Delete", name="Delete")
     */
    public function DeleteAction()
    {
        return $this->render('@App/Departement/delete.html.twig', [
            
        ]);
    }

    /**
     * @Route("/Update", name="Update")
     */
    public function UpdateAction()
    {
        return $this->render('@App/Departement/update.html.twig', [
            
        ]);
    }

}
