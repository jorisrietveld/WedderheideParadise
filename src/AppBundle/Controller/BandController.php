<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 12-08-2017 11:45
 * Licence: GPLv3 - General Pulbic Licence version 3
 */

namespace AppBundle\Controller;

use AppBundle\Service\menuGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BandController extends Controller
{
	public function bandsAction()
	{
		return $this->render( 'AppBundle:Band:bands.html.twig', [
			'renderedMenuLinks' => $this->get( menuGenerator::class )->renderMenu(),
		] );
	}

	public function bandAction()
	{
		return $this->render( 'AppBundle:Band:band.html.twig', [
			'renderedMenuLinks' => $this->get( menuGenerator::class )->renderMenu(),
		] );
	}
}