<?php
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
    die("Error :" . $ex->getMessage());
}

$pageID = isset($_GET['page']) ? $_GET['page'] : 1;
$searchTerm = isset($_GET['search']) ? $_GET['search'] : null;

$query = $capsule->table("items");

if ($searchTerm) {
    $query->where('id', 'like', "%$searchTerm%")
          ->orWhere('product_name', 'like', "%$searchTerm%")
          ->orWhere('PRODUCT_code', 'like', "%$searchTerm%")
          ->orWhere('list_price', 'like', "%$searchTerm%");
}

$totalItems = $query->count();
$totalPages = ceil($totalItems / __items_per_page);

$items = $query->select()->skip(($pageID - 1) * __items_per_page)->take(__items_per_page)->get();

require_once("views/index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <style>
        table {
            border-collapse: collapse;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        th, td {
            border: 2px solid black;
        }
    </style>
</head>
<body>
    <?php
    $itemID = isset($_GET['item']) ? $_GET['item'] : null;    if ($itemID !== null) {
        $item = $capsule->table("items")->where("id", $itemID)->first();
        if ($item !== null) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>Rating</th><th>Price</th><th>Photo</th></tr>";
            echo "<tr><td>{$item->id}</td><td>{$item->product_name}</td><td>{$item->Rating}</td><td>{$item->list_price}</td><td><img src='images/{$item->Photo}' alt='{$item->product_name}'></td></tr>";
            echo "</table>";
            
        } else {
            echo "Product not found.";
        }
    } else {
        echo "Invalid request.";
    }
    ?>
</body>
</html>
