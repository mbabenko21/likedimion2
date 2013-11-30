<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 01.12.13
 * Time: 1:30
 */

namespace Likedimion\Database\Entity;

/**
 * Class Token
 * @package Likedimion\Database\Entity
 *
 * @Entity
 * @Table(name="tokens")
 */
class Token {

    /**
     * @var int
     * @Column(type="integer")
     * @Id
     * @GeneratedValue
     */
    protected $id;
    /**
     * @var string
     * @Column(name="value", type="string")
     */
    protected $value;
    /**
     * @var \DateTime
     * @Column(name="end_date", type="date")
     */
    protected $endDate;
    /**
     * @var \DateTime
     * @Column(name="start_date", type="date")
     */
    protected $startDate;

    public function __construct(){
        $this->setStartDate(new \DateTime());
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
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param \DateTime $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }
} 