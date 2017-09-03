<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 10-08-2017 12:46
 * Licence: GPLv3 - General Pulbic Licence version 3
 */

namespace AppBundle\Controller;


use AppBundle\Service\menuGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Intl\Exception\NotImplementedException;

class AuthenticationController extends Controller
{
	public function loginAction()
	{
		return $this->render('@App/Home/login.html.twig',[
			'renderedMenuLinks' => $this->get( menuGenerator::class )->renderMenu()
	]);
	}

	public function registerAction()
	{
		throw new NotImplementedException('Not implemented!');
	}
}