<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 16-07-2017 12:55
 * Licence: GPLv3 - General Pulbic Licence version 3
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Service\menuGenerator;

class HomeController extends Controller
{
	public function homeAction()
	{
		$form = $this->createForm(ContactType::class );

		return $this->render( 'AppBundle:Home:home.html.twig', [
			'contactForm' => $form->createView(),
		    'routes' => $this->get( menuGenerator::class )->getRoutesForMenu()
		] );
	}

}
