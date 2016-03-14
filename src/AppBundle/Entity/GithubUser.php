<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\GithubUserRepository")
 * @ORM\Table()
 */
class GithubUser
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string")
     * @ORM\Id
     */
    private $id;

    /**
     * @var ArrayCollection $comments The comments
     * @ORM\OneToMany(targetEntity="Comment",mappedBy="githubUser", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $comments;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return GithubUser
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
     * Add comment
     *
     * @param Comment $comment
     *
     * @return GithubUser
     */
    public function addComment(Comment $comment)
    {
        if (!$this->comments->contains($this)) {
            $this->comments->add($comment);
        }

        if ($comment->getGithubUser() !== $this) {
            $comment->setGithubUser($this);
        }
    }

    /**
     * Remove comment
     *
     * @param Comment $comment
     */
    public function removeComment(Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set id
     *
     * @param string $id
     *
     * @return Repo
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
}
