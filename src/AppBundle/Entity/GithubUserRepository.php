<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;
use UserBundle\Entity\User;

/**
 * GithubUserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GithubUserRepository extends EntityRepository
{
	/**
	 * Gets Comments for a user
	 *
	 * @return array
	 */
	public function getCommentsforUser( $githubUser_id, User $user ) {
		return $this->createQueryBuilder( 'gu' )
		            ->select( 'c.body, c.date' )
		            ->join( 'gu.comments', 'c', 'WITH', 'c.user = :user' )->setParameter( 'user', $user )
		            ->where( 'gu.id = :id' )->setParameter( 'id', $githubUser_id )
		            ->getQuery()
		            ->getResult();
	}
}