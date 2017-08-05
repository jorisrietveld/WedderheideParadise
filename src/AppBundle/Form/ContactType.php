<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 21-07-2017 20:17
 * Licence: GPLv3 - General Pulbic Licence version 3
 */

namespace AppBundle\Form;


use function Sodium\add;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
	public function buildForm( FormBuilderInterface $builder, array $options )
	{
		$builder
			->add( 'name', TextType::class, [
				'attr'  => [ 'autofocus' => true ],
				'label' => 'home.content.form.contact.name',
			] )
			->add( 'subject', TextType::class, [
				'label' => 'home.content.form.contact.subject',
			] )
			->add( 'emailAddress', EmailType::class, [
				'label' => 'home.content.form.contact.email',
			] )
			->add( 'message', TextareaType::class, [
				'label' => 'home.content.form.contact.message',
			] )
			->add( 'userId', HiddenType::class )
			->add( 'country', HiddenType::class );
	}

	public function configureOptions( OptionsResolver $resolver )
	{
		$resolver->setDefaults( [
			'data_class' => ContactType::class,
		] );
	}
}