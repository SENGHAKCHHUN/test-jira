<?php

require 'models/category.model.php';

$categories = getCategories();

require "views/category/category.view.php";