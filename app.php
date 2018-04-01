<?php

session_start();

require __DIR__ . '/../vendor/autoload.php';

/**
* 
*/

class Database
{
	private $pdo;
	
	public function __construct(PDO $pdo)
	{
		$this->pdo = $pdo;
	}

	public function query($sql)
	{
		return $this->pdo->prepare($sql);
	}
}

$app = new \Slim\App([
	'settings' => [
		'displayErrorDetails' => true,
	],
	
]);

$container = $app->getContainer();

//Access customer DB
$container['pdo'] = function () {

	$dbhost = "127.0.0.1";
	$dbusername = "admindb";
	$dbpassword = "adminpass";
	$dbname = "kmutt_customer";

	$pdo = new PDO("mysql:host=". $dbhost .";charset=UTF8;dbname=". $dbname, $dbusername, $dbpassword);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $pdo;
};

//Connect to Cutomer DB
$container['db'] = function ($container) {
	return new Database($container->pdo);
}; 

//$pdo = new PDO("mysql:host=". $dbhost .";dbname=". $dbname.";charset=utf8", $dbusername, $dbpassword);


//Access hongkhai DB
$container['pdo2'] = function () {

	$dbhost = "127.0.0.1";
	$dbusername = "admindb";
	$dbpassword = "adminpass";
	$dbname = "kmutt_member"; //hongkhai

	// $dbhost = "localhost";
	// $dbusername = "root";
	// $dbpassword = "";
	// $dbname = "hongkhai";

	$pdo = new PDO("mysql:host=". $dbhost .";dbname=". $dbname.";charset=utf8", $dbusername, $dbpassword);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	return $pdo;
};

//Connect to HongKhai DB
$container['db2'] = function ($container) {
	return new Database($container->pdo2);
};


//ACCESS TO KMUTT DB
$container['pdo3'] = function () {

	$dbhost = "modls51.lib.kmutt.ac.th:3306";
	$dbusername = "traceon";
	$dbpassword = "traceon_gate";
	$dbname = "LIBPATRON"; 

	$pdo = new PDO("mysql:host=". $dbhost .";dbname=". $dbname.";charset=utf8", $dbusername, $dbpassword);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	return $pdo;
};
//Connect to KMUTT DB
$container['dbKmutt'] = function ($container) {
	return new Database($container->pdo3);
}; 



$container['HomeController'] = function ($container) {
	return new \App\Controllers\HomeController($container);
};

$container['loginController'] = function ($container) {
	return new \App\Controllers\loginController($container);
};

$container['permController'] = function ($container) {
	return new \App\Controllers\permController($container);
};

$container['recomBookController'] = function ($container) {
	return new \App\Controllers\recomBookController($container);
};

$container['scReportController'] = function ($container) {
	return new \App\Controllers\scReportController($container);
};

$container['mediaController'] = function ($container){
	return new \App\Controllers\mediaController($container);
};

$container['playlistManagement'] = function ($container){
	return new \App\Controllers\playlistManagement($container);
};

$container['bdReportController'] = function ($container){
	return new \App\Controllers\bdReportController($container);
};

$container['ssReportController'] = function ($container){
	return new \App\Controllers\ssReportController($container);
};

$container['sgReportController'] = function ($container){
	return new \App\Controllers\sgReportController($container);
};

$container['fgReportController'] = function ($container){
	return new \App\Controllers\fgReportController($container);
};

$container['memberController'] = function ($container){
	return new \App\Controllers\memberController($container);
};

$container['groupController'] = function ($container){
	return new \App\Controllers\groupController($container);
};

$container['facultyController'] = function ($container){
	return new \App\Controllers\facultyController($container);
};

$container['educationController'] = function ($container){
	return new \App\Controllers\educationController($container);
};

$container['blackListController'] = function ($container){
	return new \App\Controllers\blackListController($container);
};

$container['cardController'] = function ($container){
	return new \App\Controllers\cardController($container);
};

$container['visitorController'] = function ($container){
	return new \App\Controllers\visitorController($container);
};

$container['configController'] = function ($container){
	return new \App\Controllers\configController($container);
};

$container['dbSyncController'] = function ($container){
	return new \App\Controllers\dbSyncController($container);
};

require __DIR__ . '/../app/routes.php';