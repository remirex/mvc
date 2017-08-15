<?php

class PostModel extends Model
{
    public function index()
    {
        // delete post
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($post['delete_post'])
        {
            $this->query('UPDATE posts SET deleted = 1 WHERE id_post = :id_post');
            $this->bind(':id_post', $post['id_post']);
            $this->execute();
        }
        // show all posts
        $this->query('SELECT * FROM posts WHERE deleted = 0 ORDER BY id_post DESC ');
        $rows = $this->resultset();
        return $rows;
    }
    public function addPost()
    {
       // sanitize post
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($post['submit'])
        {
            // insert into database
            $this->query('INSERT INTO posts (title, body) VALUES (:title, :body)');
            $this->bind(':title', $post['title']);
            $this->bind(':body', $post['body']);
            $this->execute();
            // verify
            if($this->lastInsertId())
            {
                header('Location:'.ROOT_URL.'posts');
            }
        }
        return;
    }
}