<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(indexes={
 *     @ORM\Index(name="email_password", columns={"email", "password"}),
 *     @ORM\Index(name="role_reg_date", columns={"role", "reg_date"})
 * })
 */
class Users
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", options={"unsigned"=true})
     * @ORM\OneToMany(targetEntity="UsersAbout", mappedBy="user")
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $role;

    /**
     * @ORM\Column(columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     */
    private $reg_date;

    /**
     * @ORM\Column(columnDefinition="TIMESTAMP DEFAULT '0000-00-00 00:00:00'")
     */
    private $last_visit;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UsersAbout", mappedBy="user", orphanRemoval=true)
     */
    private $user_abouts;

    public function __construct()
    {
        $this->user_abouts = new ArrayCollection();
    }

    /**
     * @return Collection|Users[]
     */
    public function getUserAbouts()
    {
        return $this->user_abouts;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getRegDate()
    {
        return $this->reg_date;
    }

    public function setRegDate($reg_date)
    {
        $this->reg_date = $reg_date;
    }
}
