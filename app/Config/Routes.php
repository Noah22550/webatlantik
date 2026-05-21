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
$routes->get('liaisonssecteur', 'visiteur::liaisonssecteur');
$routes->get('liaisontarif/(:num)', 'visiteur::liaisontarif/$1');
$routes->match(['get', 'post'], 'modifiercompte', 'clients::modifcompte');
$routes->get('affichertraverse', 'clients::affichertraverse');
$routes->get('traversetab/(:num)', 'visiteur::traversetab/$1');
$routes->match(['get', 'post'],'traversetab/(:num)/(:num)', 'visiteur::traversetab/$1/$2');
$routes->post('traversetab/(:alphanum)', 'visiteur::traversetab/$1');
$routes->match(['get', 'post'], 'reserve/(:num)', 'clients::reserve/$1', ['filter' => 'client']);
$routes->get('voirresa', 'clients::voirresa', ['filter' => 'client']);
$routes->get ('paiement',         'Paiement::index');
$routes->get ('paiement/accepte', 'Paiement::accepte');
$routes->get ('paiement/annule',  'Paiement::annule');
$routes->get ('paiement/refuse',  'Paiement::refuse');
$routes->get ('paiement/retour',  'Paiement::retour');