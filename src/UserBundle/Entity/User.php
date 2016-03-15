<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;
use AppBundle\Entity\Comment;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 */
class User extends BaseUser {
	/**
	 * @var int
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	public function __construct() {
		parent::__construct();
		$this->comments = new ArrayCollection();
	}

	/**
	 * @var Comment $comment The comments
	 * @ORM\OneToMany(targetEntity="AppBundle\Entity\Comment", mappedBy="user", cascade={"persist", "remove"}, orphanRemoval=true)
	 */
	private $comments;

	/**
	 * Add comment
	 *
	 * @param Comment $comment
	 *
	 * @return User
	 */
	public function addComment( Comment $comment ) {
		if ( ! $this->comments->contains( $this ) ) {
			$this->comments->add( $comment );
		}

		if ( $comment->getUser() !== $this ) {
			$comment->setGithubUser( $this );
		}

		return $this;
	}

	/**
	 * Remove comment
	 *
	 * @param Comment $comment
	 */
	public function removeComment( Comment $comment ) {
		$this->comments->removeElement( $comment );
	}

	/**
	 * Get comments
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getComments() {
		return $this->comments;
	}


}

