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
<h2>Edit Vehicle</h2>
<form method="POST" action="../public/index.php?action=edit&id=<?= $vehicle['id'] ?>">
    <input type="text" name="name" value="<?= $vehicle['name'] ?>" class="form-control mb-2" required>
    <input type="text" name="type" value="<?= $vehicle['type'] ?>" class="form-control mb-2" required>
    <input type="number" name="price" value="<?= $vehicle['price'] ?>" class="form-control mb-2" required>
    <input type="text" name="image" value="<?= $vehicle['image'] ?>" class="form-control mb-2" required>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
