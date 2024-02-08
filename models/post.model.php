<?php

function createPost(string $title, string $description,int $category_id) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into posts (title, description,category_id) values (:title, :description,:category_id)");
    $statement->execute([
        ':title' => $title,
        ':description' => $description,
        ':category_id' => $category_id,

    ]);

    return $statement->rowCount() > 0;
}

function getPost(int $id) : array
{
    global $connection;
    $statement = $connection->prepare("select * from posts where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}

function getPosts() : array
{
    // select project.id,project.name,project.post_id,posts.title from project inner join posts on project.post_id = posts.id order by project.id desc
    global $connection;
    $statement = $connection->prepare("select posts.id,posts.title,posts.category_id,posts.description,categories.name from posts inner join categories on posts.category_id = categories.id order by posts.id desc");
    $statement->execute();
    return $statement->fetchAll();
}

function updatePost(string $title, string $description,int $category_id, int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("update posts set title = :title, description = :description,category_id =:category_id where id = :id");
    $statement->execute([
        ':title' => $title,
        ':description' => $description,
        ':category_id' => $category_id,
        ':id' => $id

    ]);

    return $statement->rowCount() > 0;
}

function deletePost(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from posts where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}