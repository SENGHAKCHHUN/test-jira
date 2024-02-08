<?php
require '../../database/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['title']) and !empty($_POST['description'])and !empty($_POST['category_id'])) {
        require_once('../../models/post.model.php');
        createPost($_POST['title'], $_POST['description'],$_POST['category_id']);

        header('location: /post');
    }
}
