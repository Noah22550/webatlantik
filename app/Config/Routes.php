<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::acceuil');
$routes->get('acceuil', 'visiteur::acceuil');
$routes->match(['get', 'post'], 'inscription', 'visiteur::inscription');
$routes->get('rapportajout', 'visiteur::rapportajout');
$routes->match(['get', 'post'], 'seconnecter', 'visiteur::seconnecter');
$routes->get('sedeconnecter', 'visiteur::sedeconnecter');
$routes->get('connexionreussie', 'visiteur::connexionreussie');
$routes->get('liaisonssecteur', 'clients::liaisonssecteur');
$routes->get('liaisonssecteur', 'clients::liaisonssecteur');
$routes->get('liaisontarif/(:num)', 'clients::liaisontarif/$1');
$routes->match(['get', 'post'], 'modifiercompte', 'clients::modifcompte');
$routes->get('affichertraverse', 'clients::affichertraverse');
$routes->get('traversetab/(:num)', 'clients::traversetab/$1');
$routes->match(['get', 'post'],'traversetab/(:num)/(:num)', 'clients::traversetab/$1/$2');
// Route POST pour le formulaire
$routes->post('traversetab/(:num)', 'clients::traversetab/$1');