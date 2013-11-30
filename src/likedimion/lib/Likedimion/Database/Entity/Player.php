<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 01.12.13
 * Time: 1:18
 */

namespace Likedimion\Database\Entity;

/**
 * Class Player
 * @package Likedimion\Database\Entity
 *
 * @Entity
 * @Table(name="players")
 */
class Player {
    /**
     * @var int
     * @Column(type="integer")
     * @Id
     * @GeneratedValue
     */
    protected $id;
    /**
     * @var string
     * @Column(name="name", type="string")
     */
    protected $name;

    /**
     * @var Account
     * @ManyToOne(targetEntity="Account", inversedBy="players")
     */
    protected $account;

    /**
     * @var \DateTime
     * @Column(type="date", name="create_date")
     */
    protected $createdDate;

    public function __construct(){
        $this->setCreatedDate(new \DateTime());
    }
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return \Likedimion\Database\Entity\Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param \Likedimion\Database\Entity\Account $account
     */
    public function setAccount($account)
    {
        $this->account = $account;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param \DateTime $createdDate
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }
} 