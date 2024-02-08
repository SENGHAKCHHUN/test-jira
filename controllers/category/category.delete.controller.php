<?php
require '../../database/database.php';
$id = $_GET['id'] ? $_GET['id'] : null;
if (isset($id))
{
    require '../../models/category.model.php';
    deleteCategory($id);
    header('Location: /category');
}