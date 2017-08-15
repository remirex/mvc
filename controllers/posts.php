<?php

class posts extends Controller
{
    protected function index()
    {
        $viewmodel = new PostModel();
        $this->returnView($viewmodel->index(), true);
    }
    protected function add()
    {
        if(!isset($_SESSION['is_logged_in']))
        {
            header('Location:'.ROOT_URL.'posts');
        }
        $viewmodel = new PostModel();
        $this->returnView($viewmodel->addPost(), true);
    }
}