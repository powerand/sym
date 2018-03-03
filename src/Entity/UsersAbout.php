<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsersAboutRepository")
 * @ORM\Table(indexes={
 *     @ORM\Index(name="user", columns={"user"}),
 *     @ORM\Index(name="user_item_value", columns={"user", "item", "value"}),
 *     @ORM\Index(name="item", columns={"item"})
 * })
 */
class UsersAbout
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="bigint", options={"unsigned"=true})
     */
    private $id;

    /**
     * @ORM\Column(type="integer", options={"unsigned"=true})
     * @ORM\ManyToOne(targetEntity="App\Entity\Users", inversedBy="user_abouts")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

    /**
     * @ORM\Column(type="string", columnDefinition="ENUM('country','firstname','state')")
     */
    private $item;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $value;

    /**
     * @ORM\Column(columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP")
     */
    private $up_date;

    public function getId()
    {
        return $this->id;
    }

    public function getUser(): Users
    {
        return $this->user;
    }

    public function setUser(Users $user)
    {
        $this->user = $user->id;
    }

    public function getItem()
    {
        return $this->item;
    }

    public function setItem($item)
    {
        $this->item = $item;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getUpDate()
    {
        return $this->up_date;
    }

    public function setUpDate($up_date)
    {
        $this->up_date = $up_date;
    }
}
