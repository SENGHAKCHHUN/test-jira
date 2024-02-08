<?php
session_start();
// Check if the user is not logged in, redirect to the login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

?>
<?php require "../partials/head.php" ?>
<?php require "../../utils/url.php" ?>
<?php require "../partials/nav.php" ?>
<?php
require '../../database/database.php';
require '../../models/category.model.php';
$categories = getCategories();
?>
<div class="card mt-5">
    <div class="card-body">
        <form action="../../controllers/post/post.create.controller.php" method="post">
            <div class="form-group">
                <input type="text" placeholder="title" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label for="sel1">Select list:</label>

                <select class="form-control" id="sel1" name="category_id">
                    <option>Chose Category</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>">
                            <?= $category['name'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <textarea class="form-control" placeholder="Description" name="description"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-block btn-primary">Add Post</button>
            </div>
        </form>
    </div>
</div>

<?php require "../partials/footer.php" ?>