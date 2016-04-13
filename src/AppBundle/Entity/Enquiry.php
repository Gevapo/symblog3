<?php
/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 12/04/2016
 * Time: 14:42
 */

namespace AppBundle\Entity;


use Symfony\Component\Validator\Constraints as Assert;

class Enquiry
{

    protected $name;
    /**
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true,
     *     checkHost = true
     * )
     */
    protected $email;

    protected $subject;
    /**
     * @Assert\Length(
     *     max = "255",
     *     maxMessage = "Your message cannot be longer than {{ limit }} characters"
     * )
     */
    protected $body;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

}