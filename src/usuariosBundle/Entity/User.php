<?php

namespace usuariosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="usuariosBundle\Repository\UserRepository")
 */
class User implements UserInterface
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
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     */

     /**
     * @Assert\NotBlank()
     */

     /**
     * @Assert\Length(
     *      min = 4,
     *      max = 32,
     *      minMessage = "Tu nombre de usuatio tiene que contener más de {{ limit }} caracteres",
     *      maxMessage = "Tu nombre de usuatio tiene que contener menos de {{ limit }} caracteres"
     * )
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */

     /**
     * @Assert\NotBlank()
     */

     /**
     * @Assert\Email(
     *     message = "El email introducido'{{ value }}' no es un email válido.",
     *     checkMX = true
     * )
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=64)
     */
     /**
     * @Assert\NotBlank()
     */

     /**
     * @Assert\Length(
     *      min = 0,
     *      max = 8,
     *      minMessage = "Tu contraseña tiene que contener más de {{ limit }} caracteres",
     *      maxMessage = "Tu contraseña tiene que ser menor que {{ limit }} caracteres"
     * )
     */

    private $password;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    private $plainPassword;

    public function getPlainPassword(){
      return $this->plainPassword;
    }

    public function setPlainPassword($password){
      $this->plainPassword = $password;
    }




    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    //Métodos que debe implementar el Entity por UserInterface
    public function getSalt()
    {
        // The bcrypt algorithm doesn't require a separate salt.
        // You *may* need a real salt if you choose a different encoder.
        return null;
    }

    public function getRoles() {
      return array('ROLE_USER');
    }

    public function eraseCredentials(){

    }
}
