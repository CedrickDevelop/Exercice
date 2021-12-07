<?php

namespace AppBundle\Controller;

use AppBundle\Form\ComputerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Computer;
use AppBundle\Entity\Departement;

/**
 * @Route("/Computer")
 */
class ComputerController extends Controller
{

  /**
   * @Route("/Add/{depId}", name="AddComputer")
   */
  public function AddAction(Request $request, $depId)
  {    
    
    $cnx = $this->getDoctrine()->getManager();
    $departement = $cnx->getRepository(Departement::class)->find($depId);
    $domaine = $departement->getDomaine();
    
    $computer = new Computer();
    $form = $this->createForm(ComputerType::class, $computer);
    $form->handleRequest($request);

    if($form->isSubmitted()){
      //On le set directement avec l'entite departement. Comme on recupere les infos de l'entite il va detecter automatiquement les setters et les getters
      $computer->setNameDepartement($departement);
      $cnx->persist($computer);
      $cnx->flush();

      return $this->redirectToRoute('showComputer');
    }

    return $this->render('@App/Computer/ajout.html.twig', [
      'form'        =>$form->createView(),
      'domaine'     => $domaine
    ]);

  }
 

  
  /**
   * @Route("/Afficher", name="showComputer")
   */
  public function showAction(Request $request)
  {


    return $this->render('@App/Computer/show.html.twig', [

    ]);

  }
}
