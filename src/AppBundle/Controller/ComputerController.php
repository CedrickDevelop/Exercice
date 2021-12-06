<?php

namespace AppBundle\Controller;

use AppBundle\Form\ComputerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Computer;

/**
 * @Route("/Computer")
 */
class ComputerController extends Controller
{

  /**
   * @Route("/Add/{depId}", name="AddComputer")
   */
  public function AddAction(Request $request)
  {
    $computer = new Computer();

    $form = $this->createForm(ComputerType::class);
    $form->handleRequest($request);

    return $this->render('@App/Computer/ajout.html.twig', [
      'form'  =>$form->createView()
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
