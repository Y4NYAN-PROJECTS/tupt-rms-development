<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Errors
$routes->set404Override(function () {
    echo view('ErrorTemplates/error-404');
});

$routes->get('/tup', 'MainController::UserTypePage');
$routes->get('/logout', 'MainController::Logout');


// functions
$routes->get('/rgstn', 'MainController::Registration');
$routes->get('/sndotp/??', 'MainController::SendOTP/??');
$routes->get('/vryotp/??', 'MainController::VerifyOTP/??');
$routes->get('/svrgstn', 'MainController::SaveRegistration');
