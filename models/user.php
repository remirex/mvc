<?php

class UserModel extends Model
{
    public function register()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $password = password_hash($post['password'], PASSWORD_BCRYPT);
        if($post['submit'])
        {
            if($post['name'] == '' or $post['email'] == '' or $post['password'] == '')
            {
                Messages::setMsg('Please fill all input fields', 'error');
                return;
            }
            $this->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
            $this->bind(':name', $post['name']);
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);
            $this->execute();
            if($this->lastInsertId())
            {
                header('Location:'.ROOT_URL.'users/login');
            }
        }
        return;
    }
    public function login()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($post['submit'])
        {
            if($post['email'] == '' or $post['password'] == '')
            {
                Messages::setMsg('Please fill all input fields', 'error');
                return;
            }else {
                $this->query('SELECT * FROM users WHERE email = :email LIMIT 1');
                $this->bind(':email', $post['email']);
                $row = $this->singleRes();
                if(password_verify($post['password'], $row->password))
                {
                    $_SESSION['is_logged_in'] = true;
                    $_SESSION['user_data'] = array(
                        'id_user' => $row->id_user,
                        'name' => $row->name,
                        'email' => $row->email,
                        'status' => $row->status
                    );
                    header('Location:'.ROOT_URL.'posts');
                }
                else
                {
                    Messages::setMsg('Incorect login', 'error');
                }
            }
        }
    }
}