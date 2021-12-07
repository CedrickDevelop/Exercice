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
      $file = $form->get('images')->getData();
      // MISE EN FORME PHOTO
      
      // TECHNIQUE 1 AVEC FOREACH
      // $dataForm = $req->files->get('appBundle_computer')['images'];
      // $imgArray=array();
      // foreach($file as $key){
      //   $nameImg = pathinfo($key->getClientOriginalName(), PATHINFO_FILENAME).'.'$key->guessExtension();
      //   array_push($imgArray, $nameImg);
      //   $key->move($this->getParameter('UploadsDir'), $nameImg);
      // }

      // TECHNIQUE 2 AVEC BOUCLE FOR
      $photo = [];
      for($i=0; $i<count($file); $i++){
        
        // sprintf('%s_%s.%s', $file[$i]->getClientOriginalName(), uniqid(), $file[$i]->guessExtension()); // technique possible pour le traitement des noms

        $photoname[$i] = pathinfo($file[$i]->getClientOriginalName(), PATHINFO_FILENAME);
        $extension[$i] = $file[$i]->guessExtension();

        $uni = uniqid();

        $photo[$i] = $uni.'_'.$photoname[$i].'.'.$extension[$i];

        $file[$i]->move($this->getParameter('UploadsDir'), $photo[$i]);
      }    

      $computer->setImages($photo);      

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

    $cnx = $this->getDoctrine()->getManager();
    $computers = $cnx->getRepository(Computer::class)->findAll();


    return $this->render('@App/Computer/show.html.twig', [
        'computers'   => $computers
    ]);

  }
}
