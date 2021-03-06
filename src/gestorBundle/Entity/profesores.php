<?php

namespace gestorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * profesores
 *
 * @ORM\Table(name="profesores")
 * @ORM\Entity(repositoryClass="gestorBundle\Repository\profesoresRepository")
 */
class profesores
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=255)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="departamento", type="string", length=255)
     */
    private $departamento;


    /**
     * Get id
     *
     * @return int
     */

     //hacemos la relacion de uno a muchos
     /**
      * @ORM\ManyToOne(targetEntity="alumnos", inversedBy="profesores")
      */

      //private $alumnos;

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return profesores
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     *
     * @return profesores
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set departamento
     *
     * @param string $departamento
     *
     * @return profesores
     */
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get departamento
     *
     * @return string
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * Set alumnos
     *
     * @param \gestorBundle\Entity\alumnos $alumnos
     *
     * @return profesores
     */
    public function setAlumnos(\gestorBundle\Entity\alumnos $alumnos = null)
    {
        $this->alumnos = $alumnos;

        return $this;
    }

    /**
     * Get alumnos
     *
     * @return \gestorBundle\Entity\alumnos
     */
    public function getAlumnos()
    {
        return $this->alumnos;
    }
}
