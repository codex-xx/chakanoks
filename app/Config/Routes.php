<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::attempt');
$routes->get('/logout', 'Auth::logout');
$routes->get('/dashboard', 'Admin\\Dashboard::index');
$routes->get('/admin', 'Admin\\Dashboard::index');
$routes->get('/admin/dashboard', 'Admin\\Dashboard::index');

// IT Administrator Routes
$routes->group('it', ['filter' => 'adminauth'], static function($routes) {
    $routes->get('dashboard', 'IT\\ITDashboard::index');
    $routes->get('user-management', 'IT\\UserManagement::index');
    $routes->get('system-logs', 'IT\\SystemLogs::index');
});

// Inventory Staff Routes
$routes->group('inventory', ['filter' => 'roleguard:inventory_staff'], static function($routes) {
    $routes->get('dashboard', 'Inventory\\Dashboard::index');
    $routes->get('items', 'Inventory\\Items::index');
    $routes->match(['get','post'], 'items/search', 'Inventory\\Items::search');
});

$routes->group('admin', ['filter' => 'adminauth'], static function($routes) {
	// Dashboard
	$routes->get('dashboard', 'Admin\\Dashboard::index');
	
	// Inventory Management
	$routes->get('inventory', 'Admin\\Inventory::index');
	
	// Purchasing Management
	$routes->get('purchasing', 'Admin\\Purchasing::index');
	
	// Supplier Management
	$routes->get('suppliers', 'Admin\\Suppliers::index');
	
	// Logistics Management
	$routes->get('logistics', 'Admin\\Logistics::index');
	
	// Franchising Management
	$routes->get('franchising', 'Admin\\Franchising::index');
	
	// Reports & Analytics
	$routes->get('reports', 'Admin\\Reports::index');
	
	// User Management
	$routes->get('users', 'Admin\\Users::index');
	$routes->post('users', 'Admin\\Users::store');
	$routes->post('users/(:num)', 'Admin\\Users::update/$1');
	$routes->get('users/(:num)/delete', 'Admin\\Users::delete/$1');
	
	// System Settings
	$routes->get('settings', 'Admin\\Settings::index');
});

// Supplier Routes
$routes->group('supplier', ['filter' => 'supplierauth'], static function($routes) {
	$routes->get('dashboard', 'Supplier\\Dashboard::index');
	$routes->get('purchase-orders', 'Supplier\\PurchaseOrders::index');
	$routes->get('purchase-orders/view/(:any)', 'Supplier\\PurchaseOrders::viewDetails/$1');
	$routes->get('purchase-orders/quote/(:any)', 'Supplier\\PurchaseOrders::sendQuote/$1');
	$routes->get('purchase-orders/confirm/(:any)', 'Supplier\\PurchaseOrders::confirmOrder/$1');
	$routes->get('delivery-management', 'Supplier\\DeliveryManagement::index');
	$routes->get('delivery-management/track/(:any)', 'Supplier\\DeliveryManagement::trackLocation/$1');
	$routes->get('delivery-management/update/(:any)', 'Supplier\\DeliveryManagement::updateStatus/$1');
	$routes->get('delivery-management/mark-delivered/(:any)', 'Supplier\\DeliveryManagement::markDelivered/$1');
	$routes->get('invoices', 'Supplier\\Invoices::index');
	$routes->get('invoices/view/(:any)', 'Supplier\\Invoices::view/$1');
	$routes->get('invoices/download/(:any)', 'Supplier\\Invoices::download/$1');
	$routes->get('invoices/send/(:any)', 'Supplier\\Invoices::send/$1');
	$routes->get('product-catalog', 'Supplier\\ProductCatalog::index');
	$routes->get('product-catalog/add', 'Supplier\\ProductCatalog::add');
	$routes->get('product-catalog/edit/(:any)', 'Supplier\\ProductCatalog::edit/$1');
	$routes->get('product-catalog/delete/(:any)', 'Supplier\\ProductCatalog::delete/$1');
	$routes->get('contracts', 'Supplier\\Contracts::index');
	$routes->get('contracts/view/(:any)', 'Supplier\\Contracts::view/$1');
	$routes->get('contracts/download/(:any)', 'Supplier\\Contracts::download/$1');
	$routes->get('contracts/renew/(:any)', 'Supplier\\Contracts::renew/$1');
	$routes->get('contracts/create', 'Supplier\\Contracts::create');
	$routes->get('performance-reports', 'Supplier\\PerformanceReports::index');
	$routes->get('performance-reports/generate', 'Supplier\\PerformanceReports::generate');
	$routes->get('performance-reports/schedule', 'Supplier\\PerformanceReports::schedule');
	$routes->get('performance-reports/settings', 'Supplier\\PerformanceReports::settings');
	$routes->get('performance-reports/goals', 'Supplier\\PerformanceReports::goals');
	$routes->get('performance-reports/export/(:any)', 'Supplier\\PerformanceReports::export/$1');
	$routes->get('company-profile', 'Supplier\\Dashboard::index');
});


