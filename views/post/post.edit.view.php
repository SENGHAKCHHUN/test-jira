<?php
session_start();
// Check if the user is not logged in, redirect to the login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

?>
<?php require "../../views/partials/head.php" ?>
<?php require "../../utils/url.php" ?>
<?php require "../../views/partials/nav.php" ?>
<?php
require '../../database/database.php';
require '../../models/category.model.php';
$categories = getCategories();
?>
<div class="card mt-5">
    <div class="card-body">
        <form action="../../controllers/post/post.update.controller.php" method="post">
            <input type="hidden" value="<?= $post['id'] ?>" name="id">
            <div class="form-group">
                <input type="text" placeholder="title" class="form-control" name="title" value="<?= $post['title'] ?>">
            </div>
            <div class="form-group">
                <label for="sel1">Select list:</label>

                <select class="form-control" id="sel1" name="category_id">
                    <option>Chose Category</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>" <?= ($category['id'] == $post['category_id']) ? 'selected' : '' ?>>
                            <?= $category['name'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <textarea class="form-control" placeholder="Description"
                    name="description"><?= $post['description'] ?></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-block btn-primary">Add Post</button>
            </div>
        </form>
    </div>
</div>

<?php require "../../views/partials/footer.php" ?>