<?php
require '../../database/database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['title']) and !empty($_POST['description'])and !empty($_POST['category_id'])) {
        require_once('../../models/post.model.php');
        updatePost($_POST['title'], $_POST['description'], $_POST['category_id'],$_POST['id']);

        header('location: /post');
    }
}
