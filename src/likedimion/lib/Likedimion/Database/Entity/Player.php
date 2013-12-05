<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 01.12.13
 * Time: 1:18
 */

namespace Likedimion\Database\Entity;

use Likedimion\Exception\ValidationException;

/**
 * Class Player
 * @package Likedimion\Database\Entity
 *
 * @Entity(repositoryClass="Likedimion\Database\Repository\PlayerRepositoryImpl")
 * @Table(name="players")
 * @HasLifecycleCallbacks
 */
class Player
{
    const MALE = 1;
    const FEMALE = 2;

    const WARRIOR = 1;
    const MAGE = 2;
    const RANGER = 3;

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
     * @var int
     * @Column(name="class", type="integer")
     */
    protected $class;
    /**
     * @var PlayerStatistic
     * @OneToOne(targetEntity="PlayerStatistic", cascade={"persist", "remove"})
     * @JoinColumn(name="statistic_id", referencedColumnName="id")
     */
    protected $statistic;
    /**
     * @var int
     * @Column(name="sex", type="integer")
     */
    protected $sex;

    /**
     * @var \DateTime
     * @Column(type="date", name="create_date")
     */
    protected $createdDate;
    /**
     * @var int
     * @Column(type="integer", name="last_action_time", nullable=true)
     */
    protected $lastActionTime;

    public function __construct()
    {
        $this->setCreatedDate(new \DateTime());
        $this->setStatistic(new PlayerStatistic());
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
        $account->addPlayer($this);
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

    /**
     * @return int
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param int $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * @return \Likedimion\Database\Entity\PlayerStatistic
     */
    public function getStatistic()
    {
        return $this->statistic;
    }

    /**
     * @param \Likedimion\Database\Entity\PlayerStatistic $statistic
     */
    public function setStatistic($statistic)
    {
        $this->statistic = $statistic;
    }

    /**
     * @return int
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param int $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @PrePersist @PreUpdate
     */
    public function preSave()
    {
        $this->setLastActionTime(time());
        if (!in_array($this->getClass(), $this->getClasses())) {
            throw new ValidationException("player_class_is_not_valid");
        }
        if($this->getSex() != self::MALE or $this->getSex() != self::FEMALE){
            throw new ValidationException("player_sex_is_not_valid");
        }
    }

    /**
     * @return int
     */
    public function getLastActionTime()
    {
        return $this->lastActionTime;
    }

    /**
     * @param int $lastActionTime
     */
    public function setLastActionTime($lastActionTime)
    {
        $this->lastActionTime = $lastActionTime;
    }

    /**
     * @return array
     */
    protected function getClasses()
    {
        return array(
            self::WARRIOR, self::MAGE, self::RANGER
        );
    }

} 