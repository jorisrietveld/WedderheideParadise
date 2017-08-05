<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 16-07-2017 12:55
 * Licence: GPLv3 - General Pulbic Licence version 3
 */
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ReserveController extends Controller
{
    public function reserverenAction()
    {
        return $this->render('AppBundle:Reserve:reserveren.html.twig', array(
            // ...
        ));
    }

    public function reserverenCampingAction()
    {
        return $this->render('AppBundle:Reserve:reserveren_camping.html.twig', array(
            // ...
        ));
    }

}
