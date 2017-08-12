<?php

namespace AppBundle\Controller;

use AppBundle\Service\menuGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EventController extends Controller
{
    public function eventsAction()
    {
	    return $this->render( 'AppBundle:Event:events.html.twig', [
		    'renderedMenuLinks' => $this->get( menuGenerator::class )->renderMenu(),
	    ] );
    }

    public function eventAction()
    {
	    return $this->render( 'AppBundle:Event:event.html.twig', [
		    'renderedMenuLinks' => $this->get( menuGenerator::class )->renderMenu(),
	    ] );
    }
}
