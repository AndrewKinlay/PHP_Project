<?php
/**
 * Hdip\model
 */
namespace Hdip\model;

/**
 * call Database Table
 */
use Mattsmithdev\PdoCrud\DatabaseTable;
/**
 * call database manager
 */
use Mattsmithdev\PdoCrud\DatabaseManager;

/**
 * Class Jobs
 * @package Hdip\model
 */
class Jobs extends DatabaseTable
{

    /**
     * job id
     * @var id
     */
    private $id;
    /**
     * job title
     * @var title
     */
    private $title;
    /**
     * employer name
     * @var employer
     *
     */
    private $employer;
    /**
     * placement length
     * @var length
     */
    private $length;
    /**
     * date placement starts
     * @var startDate
     */
    private $startDate;

    /**
     * gets id
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * sets id
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * gets title
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * sets title
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * gets employer
     * @return mixed
     */
    public function getEmployer()
    {
        return $this->employer;
    }

    /**
     * sets employer
     * @param mixed $employer
     */
    public function setEmployer($employer)
    {
        $this->employer = $employer;
    }

    /**
     * gets length
     * @return mixed
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * sets length
     * @param mixed $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }

    /**
     * gets start date
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * sets start date
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }
}
