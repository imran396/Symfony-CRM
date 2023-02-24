<?php

namespace Beon\IntranetBundle\Entity;

use Beon\IntranetBundle\Enums\UserGroupEnum;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 */
class User implements UserInterface, \Serializable, EquatableInterface, TokenInterface
{


    /**
     * @var integer
     */
    private $id;


    private $name;


    private $displayName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var \Beon\IntranetBundle\Entity\Customer
     */
    private $customer;

    /**
     * @var integer used for customer prepopulation and not mapped in db
     */
    private $customer_id;

    /**
     * @var \Beon\IntranetBundle\Entity\AccessLevel
     */
    private $accessLevel;

    /**
     * @var array
     */
    private $roles;

    /**
     * @var integer
     */
    private $group;


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
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDisplayName()
    {
        return $this->composeUserName();
    }

    /**
     * @return mixed
     */
    public function getClosing()
    {
        if ($this->getGroup() == UserGroupEnum::GRAPHICS) {
            if ($this->getDisplayName() == 'Grafik-Abteilung') {
                return "Grafik-Abteilung der Enchilada Gruppe\n";
            } else {
                return $this->getDisplayName() . " von der Grafik-Abteilung der Enchilada Gruppe\n";
            }
        } else {
            return $this->getDisplayName() . " von beon-communications\n\nbeon-communications\nPostfach 52 44\n97002 Würzburg\n" . $this->getEmail();
        }
    }

    /**
     * @param mixed $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    /**
     * Set email
     *
     * @param string $email
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
     * @return User
     */
    public function setPassword($password)
    {
        if (!$password) {
            $this->password = null;
            return $this;
        }

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
     * Set customer
     *
     * @param \Beon\IntranetBundle\Entity\Customer $customer
     * @return User
     */
    public function setCustomer(\Beon\IntranetBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \Beon\IntranetBundle\Entity\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Loads the user for the given username.
     *
     * This method must throw UsernameNotFoundException if the user is not
     * found.
     *
     * @param string $username The username
     *
     * @return UserInterface
     *
     * @see UsernameNotFoundException
     *
     * @throws UsernameNotFoundException if the user is not found
     *
     */
    public function loadUserByUsername($username)
    {
        // TODO: Implement loadUserByUsername() method.
    }

    /**
     * Refreshes the user for the account interface.
     *
     * It is up to the implementation to decide if the user data should be
     * totally reloaded (e.g. from the database), or if the UserInterface
     * object can just be merged into some internal array of users / identity
     * map.
     * @param UserInterface $user
     *
     * @return UserInterface
     *
     * @throws UnsupportedUserException if the account is not supported
     */
    public function refreshUser(UserInterface $user)
    {
        // TODO: Implement refreshUser() method.
    }

    /**
     * Whether this provider supports the given user class
     *
     * @param string $class
     *
     * @return Boolean
     */
    public function supportsClass($class)
    {
        // TODO: Implement supportsClass() method.
    }

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return Role[] The user roles
     */
    public function getRoles()
    {
        if (!$this->roles) {
            $this->roles = [];
            if ($this->accessLevel) {
                foreach ($this->accessLevel->getPermissions() as $permission) {
                    $this->roles[] = 'ROLE_' . strtoupper($permission->getIdentifier());
                }
            }
        }
        return $this->roles;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        $this->name;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * String representation of object
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     */
    public function serialize()
    {
        return serialize(array(
            $this->id
//            $this->getSalt()
        ));
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Constructs the object
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     */
    public function unserialize($serialized)
    {

        list (
            $this->id
            ) = unserialize($serialized);
    }

    function __toString()
    {
        return $this->composeUserName();
    }

    private function composeUserName()
    {
        if ($this->displayName) {
            return $this->displayName;
        } else if ($this->customer) {
            return $this->customer->getName();
        } else {
            return $this->name;
        }
    }

    /**
     * The equality comparison should neither be done by referential equality
     * nor by comparing identities (i.e. getId() === getId()).
     *
     * However, you do not need to compare every attribute, but only those that
     * are relevant for assessing whether re-authentication is required.
     *
     * Also implementation should consider that $user instance may implement
     * the extended user interface `AdvancedUserInterface`.
     *
     * @param UserInterface $user
     *
     * @return Boolean
     */
    public function isEqualTo(UserInterface $user)
    {
        return true;
    }

    /**
     * Returns the user credentials.
     *
     * @return mixed The user credentials
     */
    public function getCredentials()
    {
        // TODO: Implement getCredentials() method.
    }

    /**
     * Returns a user representation.
     *
     * @return mixed either returns an object which implements __toString(), or
     *                  a primitive string is returned.
     */
    public function getUser()
    {
        // TODO: Implement getUser() method.
    }

    /**
     * Sets a user.
     *
     * @param mixed $user
     */
    public function setUser($user)
    {
        // TODO: Implement setUser() method.
    }

    /**
     * Returns whether the user is authenticated or not.
     *
     * @return Boolean true if the token has been authenticated, false otherwise
     */
    public function isAuthenticated()
    {
        // TODO: Implement isAuthenticated() method.
        return true;
    }

    /**
     * Sets the authenticated flag.
     *
     * @param Boolean $isAuthenticated The authenticated flag
     */
    public function setAuthenticated($isAuthenticated)
    {
        // TODO: Implement setAuthenticated() method.
        $isAuthenticated = true;
    }

    /**
     * Returns the token attributes.
     *
     * @return array The token attributes
     */
    public function getAttributes()
    {
        // TODO: Implement getAttributes() method.
    }

    /**
     * Sets the token attributes.
     *
     * @param array $attributes The token attributes
     */
    public function setAttributes(array $attributes)
    {
        // TODO: Implement setAttributes() method.
    }

    /**
     * Returns true if the attribute exists.
     *
     * @param string $name The attribute name
     *
     * @return Boolean true if the attribute exists, false otherwise
     */
    public function hasAttribute($name)
    {
        // TODO: Implement hasAttribute() method.
    }

    /**
     * Returns an attribute value.
     *
     * @param string $name The attribute name
     *
     * @return mixed The attribute value
     *
     * @throws \InvalidArgumentException When attribute doesn't exist for this token
     */
    public function getAttribute($name)
    {
        // TODO: Implement getAttribute() method.
    }

    /**
     * Sets an attribute.
     *
     * @param string $name The attribute name
     * @param mixed $value The attribute value
     */
    public function setAttribute($name, $value)
    {
        // TODO: Implement setAttribute() method.
    }

    public function isGranted($role)
    {
        return in_array($role, $this->getRoles());
    }


    public function isCustomerValid()
    {

//        if ($this->group == UserGroupEnum::CUSTOMERS && !$this->customer) {
//            return false;
//        }

        return true;
    }


    /**
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * @param int $customer_id
     */
    public function setCustomerId($customer_id)
    {
        $this->customer_id = $customer_id;
    }

    /**
     * Set accessLevel
     *
     * @param \Beon\IntranetBundle\Entity\AccessLevel $accessLevel
     * @return User
     */
    public function setAccessLevel(\Beon\IntranetBundle\Entity\AccessLevel $accessLevel = null)
    {
        $this->accessLevel = $accessLevel;

        return $this;
    }

    /**
     * Get accessLevel
     *
     * @return \Beon\IntranetBundle\Entity\AccessLevel
     */
    public function getAccessLevel()
    {
        return $this->accessLevel;
    }

    /**
     * Get group
     *
     * @return integer
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set group
     *
     * @param integer $group
     * @return User
     */
    public function setGroup($group)
    {
        $this->group = $group;
        return $this;
    }
}
