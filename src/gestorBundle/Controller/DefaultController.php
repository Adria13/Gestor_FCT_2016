<?php

namespace gestorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use gestorBundle\Entity\empresa;
use gestorBundle\Form\empresaType;

//ponemos los use necesarios
use gestorBundle\Entity\profesores;
use gestorBundle\Form\profesoresType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function allAction()
    {
        $repository = $this->getDoctrine()->getRepository('gestorBundle:empresa');
        $datos = $repository->findAll();
        return $this->render('gestorBundle:Default:all.html.twig',array('datos' => $datos));
    }

    //generamos la funcion de recoger los datos de la base de adtos y enviarlos a un twig para mostrarlos por pantalla
    public function profesoresAction()
    {
        $repository = $this->getDoctrine()->getRepository('gestorBundle:profesores');
        $datosProf = $repository->findAll();
        return $this->render('gestorBundle:Default:profesores.html.twig',array('datosProf' => $datosProf));
    }

    public function crearEmpresaAction(){

      $empresa = new empresa();
      $empresa->setNombre("Empresa Falos");
      $empresa->setDireccion("C/ Ajaj");
      $empresa->setCp(54637);
      $empresa->setTelefono1(123456789);
      $empresa->setTelefono2(987654321);
      $empresa->setFechaCreacion("12/06/16");

      $mangDoct=$this->getDoctrine()->getManager();
      $mangDoct->persist($empresa);
      $mangDoct->flush();
      return $this->render('gestorBundle:Default:crearEmpresa.html.twig', array("empresaId"=>$empresa->getId()));
    }

    public function newAction(Request $request){

      $empresa= new empresa();
      $form = $this->createForm(empresaType::class,$empresa);

      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()){
        $empresa = $form->getData();
        $em = $this->getDoctrine()->getManager();
        $em->persist($empresa);
        $em->flush();
        return $this->redirectToRoute('all');
      }

      return $this->render('gestorBundle:Default:new.html.twig', array("form"=>$form->createView()));
    }

    //recogemos los datos de la base de datos para que los recoga el formulario.
    public function formProfesoresAction(Request $request){

      $profesores= new profesores();
      $form = $this->createForm(profesoresType::class,$profesores);

      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()){
        $empresa = $form->getData();
        $em = $this->getDoctrine()->getManager();
        $em->persist($profesores);
        $em->flush();
        return $this->redirectToRoute('profesores');
      }

      return $this->render('gestorBundle:Default:formProfesores.html.twig', array("form"=>$form->createView()));
    }

    public function alumnosAction(){
      $repository = $this->getDoctrine()->getRepository('gestorBundle:alumnos');
      $alumnos = $repository->findAll();
      return $this->render('gestorBundle:alumnos:all.html.twig',array('alumnos' => $alumnos));
    }
}
