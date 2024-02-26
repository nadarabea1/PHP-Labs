<?php
require_once("./vendor/autoload.php");
session_start();

$visitor = new Visitor(file_name);

if (!isset($_SESSION['is_counted'])) {
    $visitor->addVisitor();
    $_SESSION['is_counted'] = true;
}

echo "Counted Unique Visitors: <br />" . $visitor->getUniqueVisits();
