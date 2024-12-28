<?php require 'header.php'; ?>
<h2>Add Vehicle</h2>
<form method="POST" action="../public/index.php?action=add">
    <input type="text" name="name" placeholder="Name" class="form-control mb-2" required>
    <input type="text" name="type" placeholder="Type" class="form-control mb-2" required>
    <input type="number" name="price" placeholder="Price" class="form-control mb-2" required>
    <input type="text" name="image" placeholder="Image URL" class="form-control mb-2" required>
    <button type="submit" class="btn btn-primary">Add</button>
</form>
