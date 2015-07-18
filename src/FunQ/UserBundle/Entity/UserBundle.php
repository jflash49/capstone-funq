<?php

namespace FunQ\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Serializable;
/**
 * @ORM\ Table (name="UserBundle")
 * @ORM\ Entity(repositoryClass="FunQ\UserBundle\Entity\UserBundleRepository")
 */
 
class UserBundle implements AdvancedUserInterface, Serializable
{
    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column (type="string")
     */
    private $username;

    /**
     * @var string
     * @ORM\Column (type="string")
     */
    private $password;

    /**
     * @var string 
     * @ORM\Column (type="json_array")
     */ 
     private $roles = array();

    /**
    * @var bool
    *
    * @ORM\Column(type="boolean")
    */
    private $isActive = true;
    
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
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * Set username
     *
     * @param string $username
     * @return UserBundle
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
     * Set password
     *
     * @param string $password
     * @return UserBundle
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
     * Set Roles
     * 
     */ 
    public function setRoles(array $roles)
    {
    $this->roles = $roles;

    // allows for chaining
    return $this;
    }
    /**
     * Get Roles
     * 
     * @return array
     */ 
    public function getRoles()
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }
    
    /**
     * erase credentials
     * 
     */ 
    public function eraseCredentials()
    {
    // blank for now
    }
    
    
    /**
     * get salt
     * 
     * @return null
     */ 
    public function getSalt()
    {
        return null;
    }
    
    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return UserBundle
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
    public function isAccountNonExpired()
    {
        return true;
    }
    
    public function isAccountNonLocked()
    {
        return true;
    }
    
    public function isCredentialsNonExpired()
    {
        return true;
    }
    
    public function isEnabled()
    {
        return $this->getIsActive();
    }

    /**
     * Set email
     *
     * @param string $email
     * @return UserBundle
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
    public function serialize()
    {
        return serialize(array(
        $this->id,
        $this->username,
        $this->password,
    ));
    }

    public function unserialize($serialized)
    {
        list (
        $this->id,
        $this->username,
        $this->password,
    ) = unserialize($serialized);
    }
}
