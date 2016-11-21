<?php

namespace gestorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use gestorBundle\Entity\profesores;
use Symfony\Component\HttpFoundation\JsonResponse;


//creamos el controlador y las funcines para generar el api desde los datos de la base de datos, generamos un array para guardarlos
class profesoresApiController extends Controller
{
  public function JSONAction()
   {
       $repository = $this->getDoctrine()->getRepository('gestorBundle:profesores');
       $empresas = $repository->findAll();
       //var_dump($empresas);
       $data = array('profs' => array());
       foreach ($profs as $profe) {
           $data['profs'][] = $this->serializeEmpresa($profe);
       }
       $response = new JsonResponse($data, 200);
       return $response;
       //return $this->json($empresas);*/
   }

   private function serializeProfesor(Profesores $profesores)
  {
    return array(
        'nombre' => $profesores->getNombre(),
        'apellidos' => $profesores->getApellidos(),
        'departamento' => $profesores->getDepartamento(),
    );
  }

}
?>
