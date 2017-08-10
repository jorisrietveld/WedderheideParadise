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
use \Symfony\Component\HttpFoundation\RequestStack;
use \Symfony\Component\Templating\EngineInterface;

class menuGenerator
{
	private $router;
	private $entityManager;
	private $controllerNameParer;
	private $requestStack;
	private $twig;
	private $excludeRoutePrefix = [
		'_',
	];

	private $publicMenuAllowedControllers = [
		'AppBundle:Home:home',
	];

	public function __construct( RouterInterface $router, EntityManagerInterface $entityManager, ControllerNameParser $controllerNameParser, RequestStack $requestStack, EngineInterface $twig )
	{
		$this->router = $router;
		$this->entityManager = $entityManager;
		$this->controllerNameParer = $controllerNameParser;
		$this->requestStack = $requestStack;
		$this->twig = $twig;
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

	private function renderMenuItem( array $contextVars = [] )
	{
		return $this->twig->render( '@App/design/modules/scroller-navigation-link.html.twig', $contextVars );
	}

	public function renderMenu( array $slugs = [] )
	{
		$output = '';

		foreach ( $this->getRoutesForMenu() as $routeName => $route )
		{
			if( $route->hasDefault('parent') && $route->getDefault('parent') == $this->requestStack->getCurrentRequest()->get('_route') )
			{
				$output .= $this->renderMenuItem([
					'pathName' => $routeName,
				    'linkTranslationKey' => $route->getDefault('linkTranslationKey'),
				    'slugs' => $slugs
				]);
			}
			elseif( !$route->hasDefault('parent') )
			{
				$output .= $this->renderMenuItem([
					'addClass' => 'text-white',
					'pathName' => $routeName,
					'linkTranslationKey' => $route->getDefault('linkTranslationKey'),
				]);
			}
			else{

			}
		}

		return $output;
	}
	/*
		private function isRouteWithArgs( string $path )
		{
			return count( explode( '{', $path ) ) > 1 ? true : false;
		}

		private function sortItems( RouteCollection $routeCollection, string $currentRoute )
		{
			$categories = [];

			foreach ( $routeCollection as $routeName => $route )
			{
				$categoryToUse = null;

				if ( array_key_exists( $route->getPath(), $categories ) )
				{
					if ( $route->hasDefault( 'isMain' ) )
					{
						$categories[$route->getPath()]->addMainItem( $route );
						$categories[$route->getPath()]->addRouteName( $route );

					}
					elseif ( $route->getPath() == $currentRoute )
					{
						$categories[$route->getPath()]->addSubmenuItem( $route );
					}
				}
				elseif( !$this->isRouteWithArgs( $route->getPath() ) )
				{
					$categories[$route->getPath()] = new MenuCategory( $route->getPath() );

					if ( $route->hasDefault( 'isMain' ) )
					{
						$categories[$route->getPath()]->addMainItem( $route );
					}
					elseif ( $route->getPath() == $currentRoute )
					{
						$categories[$route->getPath()]->addSubmenuItem( $route );
					}
				}
			}

			return $categories;
		}*/

	/*public function renderMenu()
	{
		$sortedRoutes = $this->sortItems( $this->getRoutesForMenu(), $this->requestStack->getCurrentRequest()->getPathInfo() );

		return $sortedRoutes;
	}*/

	private function isNotForCurrentLocale( string $routeName )
	{
		return $routeName[0] . $routeName[1] == $this->requestStack->getCurrentRequest()->getLocale() ? false : true;
	}

	private function isNotAppRoute( string $routeName )
	{
		return in_array( $routeName[0], $this->excludeRoutePrefix ) ? true : false;
	}

	private function isControllerInMenu( string $routeName, Route $route )
	{
		return in_array( $route->getDefault( '_controller' ), $this->publicMenuAllowedControllers ) ? false : true;
	}

	protected function filterRoutes( RouteCollection $routeCollection )
	{
		$routesToRemove = [];

		foreach ( $routeCollection as $routeName => $route )
		{
			if ( $this->isControllerInMenu( $routeName, $route ) ||
				$this->isNotAppRoute( $routeName ) ||
				$this->isNotForCurrentLocale( $routeName )
			)
			{
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