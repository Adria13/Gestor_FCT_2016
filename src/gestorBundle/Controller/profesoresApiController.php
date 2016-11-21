<?php

namespace gestorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use gestorBundle\Entity\profesores;
use Symfony\Component\HttpFoundation\JsonResponse;


class empresaApiController extends Controller
{
  public function JSONAction()
   {
       $repository = $this->getDoctrine()->getRepository('gestorBundle:profesores');
       $empresas = $repository->findAll();
       //var_dump($empresas);
       $data = array('profs' => array());
       foreach ($empresas as $empresa) {
           $data['profs'][] = $this->serializeEmpresa($empresa);
       }
       $response = new JsonResponse($data, 200);
       return $response;
       //return $this->json($empresas);*/
   }

   private function serializeEmpresa(Empresa $empresa)
  {
    return array(
        'nombre' => $empresa->getNombre(),
        'direccion' => $empresa->getDireccion(),
        'cp' => $empresa->getCp(),
        'telefono1' => $empresa->getTelefono1(),
        'telefono2' => $empresa->getTelefono2(),
        'fechaCreacion' => $empresa->getFechaCreacion(),
    );
  }

}
?>
