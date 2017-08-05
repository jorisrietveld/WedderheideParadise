<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 16-07-2017 12:55
 * Licence: GPLv3 - General Pulbic Licence version 3
 */
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AboutController extends Controller
{
    public function aboutAction()
    {
        return $this->render('AppBundle:About:about.html.twig', array(
            // ...
        ));
    }

}
