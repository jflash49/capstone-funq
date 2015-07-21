<?php

namespace FunQ\Bundle\FunQBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FunQ\UserBundle\Entity\UserBundle;

/**
 * 
 * @ORM\Table (name="User")
 * @ORM\Table (repositoryClass="FunQ\Bundle\FunQBundle\Entity\UserRepository")
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="Username", type="string", length=255)
     * @var string
     */
    private $username;

    /**
     * @ORM\Column(name="firstName", type="string", length=255)
     * @var string
     */
    private $firstName;

    /**
     * @ORM\Column(name="lastName", type="string", length=255)
     * @var string
     */
    private $lastName;

    /**
     * @ORM\Column (type="date", name ="birthdate")
     * @var \DateTime
     */
    private $birthdate;

    /**
     * @ORM\Column(name="gender", type="string", length=2, options={"fixed" = true})
     * @var string
     */
    private $gender;

    /**
     * @ORM\Column(name="school", type="string", length=255)
     * @var string
     */
    private $school;
    
    /**
     * @ORM\Column(name="class", type="string",  length=255)
     * @var string
     */
    private $class;
    
    /**
     * @ORM\Column(name="parish",type="string", length=255, nullable=true)
     * @var string
     */
     private $parish;
     
     /**
     * @ORM\Column(name="UserType",type="string", length=1, nullable=true)
     * @var string
     */
     private $userType;
    
    /**
     * 
     * @ORM\Column(name="IQ", type="integer")
     * @var integer
     */
    private $iQ;

    /**
     * @ORM\Column(name="password", type="string", length=255)
     * @var string
     */
    private $password;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="FunQ\UserBundle\Entity\UserBundle")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
     private $owner;
     
    /**
     * 
     * @return UserBundle
     */ 
     
    public function getOwner()
    {
        return $this->owner;
    }
    /**
     * 
     * @param UserBundle $owner
     */ 
    public function setOwner(UserBundle $owner)
    {
        $this->owner = $owner;
    }
         
     
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
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
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return User
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set school
     *
     * @param string $school
     * @return User
     */
    public function setSchool($school)
    {
        $this->school = $school;

        return $this;
    }

    /**
     * Get school
     *
     * @return string 
     */
    public function getSchool()
    {
        return $this->school;
    }

    /**
     * Set class
     *
     * @param string $class
     * @return User
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get class
     *
     * @return string 
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set iQ
     *
     * @param integer $iQ
     * @return User
     */
    public function setIQ($iQ)
    {
        $this->iQ = $iQ;

        return $this;
    }

    /**
     * Get iQ
     *
     * @return integer 
     */
    public function getIQ()
    {
        return $this->iQ;
    }

    /**
     * Set password
     *
     * @param string $password
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

    /**
     * Set parish
     *
     * @param string $parish
     * @return User
     */
    public function setParish($parish)
    {
        $this->parish = $parish;

        return $this;
    }

    /**
     * Get parish
     *
     * @return string 
     */
    public function getParish()
    {
        return $this->parish;
    }

    /**
     * Set userType
     *
     * @param string $userType
     * @return User
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;

        return $this;
    }

    /**
     * Get userType
     *
     * @return string 
     */
    public function getUserType()
    {
        return $this->userType;
    }
}
