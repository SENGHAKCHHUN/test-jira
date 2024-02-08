<?php
require '../../database/database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['name']) and !empty($_POST['description'])) {
        require_once('../../models/category.model.php');
        updateCategory($_POST['name'], $_POST['description'], $_POST['id']);

        header('location: /category');
    }
}
