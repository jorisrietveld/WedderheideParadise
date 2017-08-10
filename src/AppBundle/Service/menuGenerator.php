<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 10-08-2017 11:18
 * Licence: GPLv3 - General Pulbic Licence version 3
 */

namespace AppBundle\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\RouteCollection;
use \Symfony\Component\Routing\RouterInterface;
use \Symfony\Component\Routing\Route;
use Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser;

class menuGenerator
{
	private $router;
	private $entityManager;
	private $controllerNameParer;

	public function __construct( RouterInterface $router, EntityManagerInterface $entityManager, ControllerNameParser $controllerNameParser )
	{
		$this->router = $router;
		$this->entityManager = $entityManager;
		$this->controllerNameParer = $controllerNameParser;
	}

	public function getRoutes()
	{
		$routes = $this->router->getRouteCollection();

		foreach ( $routes as $route )
		{
			$this->convertController( $route );
		}

		return [
			'routes' => $this->filterRoutes( $routes ),
		];
	}

	protected function filterRoutes( RouteCollection $routeCollection, string $excludePattern = "_" )
	{
		$routesToRemove = [];

		foreach ( $routeCollection as $item => $value )
		{
			if( $item[0] == $excludePattern )
			{
				$routesToRemove[] = $item;
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