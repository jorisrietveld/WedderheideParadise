<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 16-07-2017 12:55
 * Licence: GPLv3 - General Pulbic Licence version 3
 */
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PricesController extends Controller
{
    public function prijzenAction()
    {
        return $this->render('AppBundle:Prices:prijzen.html.twig', array(
            // ...
        ));
    }

}
