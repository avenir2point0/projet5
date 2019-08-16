<?php

namespace App\Model;

class User implements \Serializable
{
    private $id;

    private $name;
    
    private $pseudo;

    private $email;
    
    private $password;
    
    private $dateInscription;

    private $admin;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

        /**
         * @return mixed
         */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->pseudo = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    /**
     * @param mixed $dateInscription
     */
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;
    }

        /**
         * @return mixed
         */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * @param mixed $admin
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }

    public function serialize()
    {
        return serialize(
            [
            'id'=> $this->id,
            'name'=>$this->name,
            'pseudo'=>$this->pseudo,
            'email'=>$this->email,
            'admin'=>$this->admin
            ]
        );
    }

    public function unserialize($serialized)
    {
        list(
            'id'=> $this->id,
            'name'=>$this->name,
            'pseudo'=>$this->pseudo,
            'email'=>$this->email,
            'admin'=>$this->admin
        ) = unserialize($serialized);
    }
}
