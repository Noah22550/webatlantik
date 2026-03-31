<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::acceuil');
$routes->get('acceuil', 'visiteur::acceuil');
$routes->match(['get', 'post'], 'inscription', 'visiteur::inscription');
$routes->get('rapportajout', 'visiteur::rapportajout');
$routes->match(['get', 'post'], 'seconnecter', 'visiteur::seconnecter');
$routes->get('sedeconnecter', 'visiteur::sedeconnecter');
$routes->get('connexionreussie', 'visiteur::connexionreussie');
