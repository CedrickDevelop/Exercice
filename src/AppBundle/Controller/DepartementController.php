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
     * @Route("/Ajout", name="AddDepartement")
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
            $domain = $request->get('appbundle_departement')['domaine'];
            
            if ($domain == 0 ){
                $this->addFlash('error', 'Votre domaine n\'est pas bon');
            } else {

                $cnx->persist($dep);
                $cnx->flush();
    
                return $this->redirectToRoute('Afficher');
            }


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

        $cnx = $this->getDoctrine()->getManager();

        $departement = $cnx->getRepository(Departement::class)->findAll();

        return $this->render('@App/Departement/show.html.twig', [
            'departement'   =>  $departement
        ]);
    }

    /**
     * @Route("/ShowOne/{id}", name="AfficherOne")
     */
    public function ShowOneAction($id)
    {

        $cnx = $this->getDoctrine()->getManager();
        
        $departement = $cnx->getRepository(Departement::class)->findAll();

        $OneDepartement = $cnx->getRepository(Departement::class)->findOneBy(['id'=>$id]);

        return $this->render('@App/Departement/show.html.twig', [
            'departement'   =>  $departement,
            'oneDepartement'=>  $OneDepartement
        ]);
    }

    /**
     * @Route("/Delete/{id}", name="Delete")
     */
    public function DeleteAction($id)
    {

        $cnx = $this->getDoctrine()->getManager();

        $dep = $cnx->getRepository(Departement::class)->findOneBy(['id'=>$id]);

        $cnx->remove($dep);
        $cnx->flush();


        return $this->redirectToRoute('Afficher');
    }

    /**
     * @Route("/Update/{id}", name="Update")
     */
    public function UpdateAction($id, Request $request)
    {

        $cnx = $this->getDoctrine()->getManager();
        
        $dep = $cnx->getRepository(Departement::class)->findOneBy(['id'=>$id]);

        $form = $this->createForm(DepartementType::class, $dep);
        $form->handleRequest($request);

        if ($form->isSubmitted()){
            $cnx->persist($dep);
            $cnx->flush();

            return $this->redirectToRoute('Afficher');
        }


        return $this->render('@App/Departement/ajout.html.twig', [
            'form'  =>  $form->createView()
        ]);
    }

}
