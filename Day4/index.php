<?php   
$pageID = isset($_GET['page']) ? $_GET['page'] : 1;

require "vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

try {
    $capsule->addConnection([
        "driver" => "mysql",
        "host" => __host__,
        "database" => __database__,
        "username" => __username__,
        "password" => __password__
    ]);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();
} catch (\Exception $ex) {
    die("Error :" . $ex.getMessage());
}

$totalItems = $capsule->table("items")->count();
$totalPages = ceil($totalItems / __items_per_page);

$items = $capsule->table("items")->select()->skip(($pageID - 1) * __items_per_page)->take(__items_per_page)->get();

require_once("views/index.php");
?>