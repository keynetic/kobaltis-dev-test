<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GithubUserType extends AbstractType {
	public function buildForm( FormBuilderInterface $builder, array $options ) {
		$builder
			->add( 'id', HiddenType::class )
			->add( 'name', HiddenType::class )
			->add( 'bio', HiddenType::class )
			->add( 'avatar_url', HiddenType::class )
			->add( 'html_url', HiddenType::class );
	}

	public function configureOptions( OptionsResolver $resolver ) {
		$resolver->setDefaults( array(
			'data_class' => 'AppBundle\Entity\GithubUser'
		) );
	}

	public function getName() {
		return 'githubUser';
	}
}