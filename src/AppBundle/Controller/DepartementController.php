<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Departement;

/**
 * @Route("/Departement")
 */
class DepartementController extends Controller
{
    /**
     * @Route("/Ajout", name="AppDepartement)
     */
    public function AjoutAction(Request $request)
    {
        $dep = new Departement();

        $formDep = $this->createForm(DepartementType::class);

        return $this->render('@App/Departement/ajout.html.twig', [

        ]);
    }

    /**
     * @Route("/Show")
     */
    public function ShowAction()
    {
        return $this->render('AppBundle:Departement:show.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/Delete")
     */
    public function DeleteAction()
    {
        return $this->render('AppBundle:Departement:delete.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/Update")
     */
    public function UpdateAction()
    {
        return $this->render('AppBundle:Departement:update.html.twig', array(
            // ...
        ));
    }

}
