<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 10-08-2017 11:18
 * Licence: GPLv3 - General Pulbic Licence version 3
 */

namespace AppBundle\Service;

use \Doctrine\ORM\EntityManagerInterface;
use \Symfony\Component\Routing\RouteCollection;
use \Symfony\Component\Routing\RouterInterface;
use \Symfony\Component\Routing\Route;
use \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser;
use Symfony\Component\HttpFoundation\RequestStack;

class menuGenerator
{
	private $router;
	private $entityManager;
	private $controllerNameParer;
	private $requestStack;
	private $excludeRoutePrefix = [
		'_',
	];

	private $publicMenuAllowedControllers = [
		'AppBundle:Home:home',
	];

	public function __construct( RouterInterface $router, EntityManagerInterface $entityManager, ControllerNameParser $controllerNameParser, RequestStack $requestStack )
	{
		$this->router = $router;
		$this->entityManager = $entityManager;
		$this->controllerNameParer = $controllerNameParser;
		$this->requestStack = $requestStack;
	}

	public function getRoutesForMenu()
	{
		$routes = $this->router->getRouteCollection();

		foreach ( $routes as $route )
		{
			$this->convertController( $route );
		}

		return $this->filterRoutes( $routes );
	}

	public function renderMenu()
	{

	}

	private function isNotForCurrentLocale( string $routeName )
	{
		return $routeName[0].$routeName[1] == $this->requestStack->getCurrentRequest()->getLocale() ? false: true;
	}

	private function isNotAppRoute( string $routeName )
	{
		return in_array( $routeName[0], $this->excludeRoutePrefix ) ? true : false;
	}

	private function isControllerInMenu( string $routeName, Route $route )
	{
		return in_array( $route->getDefault('_controller' ), $this->publicMenuAllowedControllers ) ? false : true;
	}

	protected function filterRoutes( RouteCollection $routeCollection )
	{
		$routesToRemove = [];

		foreach ( $routeCollection as $routeName => $route )
		{
			if( $this->isControllerInMenu( $routeName, $route ) ||
				$this->isNotAppRoute( $routeName) ||
				$this->isNotForCurrentLocale( $routeName )
			){
				$routesToRemove[] = $routeName;
			}
		}

		$routeCollection->remove( $routesToRemove );
		return $routeCollection;
	}

	private function convertController( Route $route )
	{
		if ( $route->hasDefault( '_controller' ) )
		{
			try
			{
				$route->setDefault( '_controller', $this->controllerNameParer->build( $route->getDefault( '_controller' ) ) );
			}
			catch ( \InvalidArgumentException $e )
			{
			}
		}
	}
}