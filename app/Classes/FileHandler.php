<?php
namespace App\Classes;

trait FileHandler {
    private $filePath = __DIR__ . '/../../data/vehicles.json';

    public function readData() {
        if (!file_exists($this->filePath)) {
            return [];
        }
        $data = file_get_contents($this->filePath);
        return json_decode($data, true) ?? [];
    }

    public function writeData($data) {
        file_put_contents($this->filePath, json_encode($data, JSON_PRETTY_PRINT));
    }
}
