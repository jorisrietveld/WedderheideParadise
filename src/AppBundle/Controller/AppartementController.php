<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 16-07-2017 12:55
 * Licence: GPLv3 - General Pulbic Licence version 3
 */
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AppartementController extends Controller
{
    public function appartementAction()
    {
        return $this->render('AppBundle:Appartement:appartement.html.twig', array(
            // ...
        ));
    }

}
