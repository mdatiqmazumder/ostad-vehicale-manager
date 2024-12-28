<?php
require_once '../app/Classes/FileHandler.php';
require_once '../app/Classes/VehicleActions.php';
require_once '../app/Classes/VehicleBase.php';
require_once '../app/Classes/VehicleManager.php';

use App\Classes\VehicleManager;

$manager = new VehicleManager(); // No arguments needed now

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_GET['action'] ?? '';

    if ($action === 'add') {
        $manager->addVehicle($_POST);
    } elseif ($action === 'edit') {
        $manager->editVehicle($_GET['id'], $_POST);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete') {
    $manager->deleteVehicle($_GET['id']);
}

$vehicles = $manager->getVehicles();
?>

<?php require '../views/header.php'; ?>
<h2>Vehicles</h2>
<a href="../views/add.php" class="btn btn-success mb-3">Add Vehicle</a>
<div class="row">
    <?php foreach ($vehicles as $vehicle): ?>
        <div class="col-md-4">
            <div class="card">
                <img src="<?= $vehicle['image'] ?>" class="card-img-top" alt="<?= $vehicle['name'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $vehicle['name'] ?></h5>
                    <p class="card-text">Type: <?= $vehicle['type'] ?></p>
                    <p class="card-text">Price: $<?= $vehicle['price'] ?></p>
                    <a href="../views/edit.php?id=<?= $vehicle['id'] ?>" class="btn btn-primary">Edit</a>
                    <a href="../views/delete.php?id=<?= $vehicle['id'] ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
