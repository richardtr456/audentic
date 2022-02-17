<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::login');

$routes->get('/salir', 'Home::salir');
$routes->post('/autenticar', 'Home::autenticar');

// ENCAPSULAR MENU-RUTAS
$routes->group('/menu',["filter" => "sesionActiva"], function ($routes) {
    $routes->get('/', 'Home::menu');
    $routes->post('consultar', 'Home::consultar');

    $routes->group('usuarios', function ($routes) {
        //* :para visualizar los usuarios
        $routes->get('/', 'Usuarios::index');
            //? :para crear los usuarios
        $routes->get('crear_usuario', 'Usuarios::crearUsuario');
        $routes->post('registrar', 'Usuarios::registrar');
        //TODO: para editar los usuarios
        $routes->get('editar/(:any)', 'Usuarios::editar/$1');
        $routes->post('actualizar', 'Usuarios::actualizar');
        //! : para eliminar los usuarios
        $routes->get('eliminar/(:any)', 'Usuarios::eliminar/$1');
    });    
    $routes->group('pacientes', function ($routes) {
        // https://localhost/audentic/menu/pacientes/registrar
        //* :para visualizar los pacientes
        $routes->get('/', 'Pacientes::index');
        //? :para crear los pacientes
        $routes->post('registrar', 'Pacientes::registrar');
        //TODO: para editar los pacientes
        $routes->post('actualizar', 'Pacientes::actualizar');
        //! : para eliminar los pacientes
        // $routes->get('eliminar/(:any)', 'Usuarios::eliminar/$1');
        //! reporte falta hacer ajustes
        // $routes->get('reporte', 'Pacientes::reporte');

    });
    $routes->group('profesionales', function ($routes) {
        // https://localhost/audentic/menu/pacientes/registrar
        //* :para visualizar los pacientes
        $routes->get('/', 'Profesionales::index');
        //? :para crear los pacientes
        $routes->post('registrar', 'Profesionales::registrar');
        //TODO: para editar los pacientes
        $routes->post('actualizar', 'Profesionales::actualizar');
        //! : para eliminar los pacientes
        $routes->get('eliminar/(:any)', 'Profesionales::eliminar/$1');
    });
    $routes->group('especialidades', function ($routes) {
        // https://localhost/audentic/menu/pacientes/registrar
        //* :para visualizar los pacientes
        $routes->get('/', 'Especialidades::index');
        //? :para crear los pacientes
        $routes->post('registrar', 'Especialidades::registrar');
        //TODO: para editar los pacientes
        $routes->post('actualizar', 'Especialidades::actualizar');
        //! : para eliminar los pacientes
        $routes->get('eliminar/(:any)', 'Especialidades::eliminar/$1');
    });
    $routes->group('servicios', function ($routes) {
        // https://localhost/audentic/menu/pacientes/registrar
        //* :para visualizar los pacientes
        $routes->get('/', 'Servicios::index');
        //? :para crear los pacientes
        $routes->post('registrar', 'Servicios::registrar');
        //TODO: para editar los pacientes
        $routes->post('actualizar', 'Servicios::actualizar');
        //! : para eliminar los pacientes
        $routes->get('eliminar/(:any)', 'Servicios::eliminar/$1');
    });
    $routes->group('tratamientos', function ($routes) {
        // https://localhost/audentic/menu/pacientes/registrar
        //* :para visualizar los pacientes
        $routes->get('/', 'Tratamientos::index');
        //? :para crear los pacientes
        $routes->post('registrar', 'Tratamientos::registrar');
        //TODO: para editar los pacientes
        $routes->post('actualizar', 'Tratamientos::actualizar');
        //! : para eliminar los pacientes
        $routes->get('eliminar/(:any)', 'Tratamientos::eliminar/$1');
        
        
    });
    $routes->group('sesiones', function ($routes) {
        // https://localhost/audentic/menu/pacientes/registrar
        //* :para visualizar los pacientes
        $routes->get('/', 'Sesiones::index');
        $routes->get('cargar/(:any)', 'Sesiones::cargar/$1');

        //? :para crear los pacientes
        $routes->post('registrar', 'Sesiones::registrar');
        //TODO: para editar los pacientes
        $routes->post('actualizar', 'Sesiones::actualizar');
        //! : para eliminar los pacientes
        $routes->get('eliminar/(:any)', 'Sesiones::eliminar/$1');
    });
    
    

});


//Usuarios
    
    
    // $routes->get('/menu/usuarios/editar/(:any)', 'Usuarios::editar/$1');
    // $routes->post('/menu/usuarios/actualizar', 'Usuarios::actualizar');
    

    
    // $routes->post('/comprobar', 'Usuarios::getUsuario');
    






// $routes->get('/', 'Crud::index');
// $routes->get('/obtenerNombre/(:any)', 'Crud::obtenerNombre/$1');
// $routes->get('/eliminar/(:any)', 'Crud::eliminar/$1');
// $routes->post('/crear', 'Crud::crear');
// $routes->post('/actualizar', 'Crud::actualizar');




//$routes->get('(:any)', 'Pages::view/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
