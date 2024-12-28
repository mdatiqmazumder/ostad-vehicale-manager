<?php 
require 'header.php';
require_once '../app/Classes/FileHandler.php';
require_once '../app/Classes/VehicleActions.php';
require_once '../app/Classes/VehicleBase.php';
require_once '../app/Classes/VehicleManager.php';

use App\Classes\VehicleManager;

$manager = new VehicleManager();

// Get the vehicle ID from the URL
$id = $_GET['id'] ?? null;
if (!$id) {
    echo "Invalid vehicle ID.";
    exit;
}

// Fetch the vehicle by ID
$vehicles = $manager->getVehicles();
$vehicle = array_filter($vehicles, fn($v) => $v['id'] == $id);
if (!$vehicle) {
    echo "Vehicle not found.";
    exit;
}
$vehicle = array_shift($vehicle); // Get the first (and only) matching vehicle
?>
<h2>Delete Vehicle</h2>
<p>Are you sure you want to delete this vehicle?</p>
<div>
    <strong>Name:</strong> <?= $vehicle['name'] ?><br>
    <strong>Type:</strong> <?= $vehicle['type'] ?><br>
    <strong>Price:</strong> $<?= $vehicle['price'] ?><br>
</div>
<a href="../public/index.php?action=delete&id=<?= $vehicle['id'] ?>" class="btn btn-danger">Delete</a>
<a href="../public/index.php" class="btn btn-secondary">Cancel</a>
