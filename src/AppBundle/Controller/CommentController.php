<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type;
use FOS\UserBundle\Model\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;


class CommentController extends Controller {

	/**
	 * @Route(path="/comments", name="comment")
	 * @Template()
	 */
	public function indexAction() {

		if ( $this->isGranted( 'IS_AUTHENTICATED_REMEMBERED' ) ) {

			$user = $this->getUser();

			if ( ! is_object( $user ) || ! $user instanceof UserInterface ) {
				throw new AccessDeniedException( 'This user does not have access to this section.' );
			}

			$em                 = $this->getDoctrine()->getManager();
			$repo               = $em->getRepository( 'AppBundle:Comment' );
			$params['comments'] = $repo->findAll();

			return $params;

		} else {
			return $this->redirectToRoute( 'fos_user_security_login' );
		}
	}
}
