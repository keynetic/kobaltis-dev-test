<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use UserBundle\Entity\User;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\CommentRepository")
 * @ORM\Table()
 */
class Comment {
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var $body The body
     * @ORM\Column(type="text")
     */
    private $body;

    /**
     * @var \DateTime $date The date
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @var GithubUser $githubUser The Github User
     *
     * @ORM\ManyToOne(targetEntity="GithubUser",inversedBy="comments", cascade={"persist"})
     * @ORM\JoinColumn()
     */
    private $githubUser;

    /**
     * @var User $user The user
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User",inversedBy="comments")
     * @ORM\JoinColumn()
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->date = new \DateTime();
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
     * Set body
     *
     * @param string $body
     *
     * @return Comment
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Comment
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set GithubUser
     *
     * @param GithubUser $githubUser
     *
     * @return Comment
     */
    public function setGithubUser(GithubUser $githubUser = null)
    {
        $this->githubUser = $githubUser;

        return $this;
    }

    /**
     * Get GithubUser
     *
     * @return GithubUser
     */
    public function getGithubUser()
    {
        return $this->githubUser;
    }

    /**
     * Set user
     *
     * @param User $user
     *
     * @return Comment
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}
