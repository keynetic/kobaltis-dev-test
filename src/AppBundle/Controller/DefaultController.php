<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comment;
use AppBundle\Form\Type;
use AppBundle\Form\Type\CommentType;
use FOS\UserBundle\Model\UserInterface;
use Github\Client;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;


class DefaultController extends Controller {

	/**
	 * @Route("/", name="homepage")
	 * @Template()
	 *
	 * @param Request $request
	 *
	 * @return array
	 */
	public function indexAction( Request $request ) {

		$params      = array();
		$query       = $request->get( 'q' );
		$user        = $this->getUser();
		$githubUsers = array();

		if ( $query ) {
			$client          = new Client();
			$githubApiResult = $client->api( 'users' )->find( $query );
			$githubUsers     = $githubApiResult['users'];
			$flashmessage    = '';

			if ( empty( $githubUsers ) ) {
				$flashmessage = 'No results for ' . $query;
			}

			$flashBag = $this->get( 'session' )->getFlashBag();
			$flashBag->get( 'notice' );
			$flashBag->set( 'notice', $flashmessage );
		}

		if ( $this->isGranted( 'IS_AUTHENTICATED_REMEMBERED' ) and ! empty( $githubUsers ) ) {

			if ( ! is_object( $user ) || ! $user instanceof UserInterface ) {
				throw new AccessDeniedException( 'This user does not have access to this section.' );
			} else {

				$em   = $this->getDoctrine()->getManager();
				$repo = $em->getRepository( 'AppBundle:GithubUser' );

				foreach ( $githubUsers as $key => $githubUser ) {

					$comment                = new Comment();
					$form                   = $this->createForm( CommentType::class, $comment );
					$githubUser['form']     = $form->createView();
					$githubUser['comments'] = $repo->getCommentsforUser( $githubUser['id'], $user );
					$githubUsers[ $key ]    = $githubUser;

				}

			}

			$form->handleRequest( $request );

			if ( $form->isSubmitted() && $form->isValid() ) {

				$comment = $form->getData();

				$comment->setUser( $user );

				$githubUserFromDb = $repo->find( $comment->getGithubUser()->getId() );

				if ( $githubUserFromDb == null ) {
					$em->persist( $comment );

				} else {
					$githubUserFromDb->addComment( $comment );
					$em->persist( $githubUserFromDb );
				}

				$em->flush();

				return $this->redirectToRoute( 'homepage', array( 'q' => $query ) );

			}

		}

		$params['githubUsers'] = $githubUsers;

		return $params;
	}
}
