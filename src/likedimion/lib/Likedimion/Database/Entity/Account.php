<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 30.11.13
 * Time: 22:03
 */

namespace Likedimion\Database\Entity;
use Doctrine\Common\Annotations as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Account
 * @package Likedimion\Database\Entity
 *
 * @Entity
 * @Table(name="accounts")
 */
class Account {
    /**
     * @var int
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    protected $id;
    /**
     * @var string
     * @Column(name="login", type="string")
     */
    protected $login;
    /**
     * @var string
     * @Column(name="password", type="string")
     */
    protected $password;
    /**
     * @var string
     * @Column(name="email", type="string")
     */
    protected $email;
    /**
     * @var ArrayCollection
     *
     * @OneToMany(targetEntity="Premium", mappedBy="account", cascade={"persist", "remove", "merge"})
     */
    protected $prems;
    /**
     * @var ArrayCollection
     *
     * @OneToMany(targetEntity="Player", mappedBy="account", cascade={"persist", "remove", "merge"})
     */
    protected $players;
    /**
     * @var Token
     * @OneToOne(targetEntity="Token")
     * @JoinColumn(name="token_id", referencedColumnName="id")
     */
    protected $authToken;

    /**
     * @var \DateTime
     * @Column(type="date", name="create_date")
     */
    protected $createdDate;

    public function __construct(){
        $this->setCreatedDate(new \DateTime());
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getPremiums()
    {
        return $this->prems;
    }

    public function addPremium(Premium $premium){
        $this->prems->add($premium);
        $premium->setAccount($this);
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getPlayers()
    {
        return $this->players;
    }

    public function addPlayer(Player $player){
        $this->players->add($player);
        $player->setAccount($this);
    }

    /**
     * @return \Likedimion\Database\Entity\Token
     */
    public function getAuthToken()
    {
        return $this->authToken;
    }

    /**
     * @param \Likedimion\Database\Entity\Token $authToken
     */
    public function setAuthToken($authToken)
    {
        $this->authToken = $authToken;
    }

    public function unsetAuthToken() {
        $this->authToken = null;
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