<?php

use Phalcon\Mvc\Controller;

class MoviesController extends Controller
{
    public function indexAction()
    {
        // return '<h1>in movies!!!</h1>';
    }
    public function addAction()
    {
        $user = new Movies();

        $user->assign(
            $this->request->getPost(),
            [
                'movie_name',
                'movie_type'
            ]
        );

        print_r($this->request->getPost());

        $success = $user->save();

        $this->view->success = $success;

        if ($success) {
            $this->view->message = "Register succesfully";
        } else {
            $this->view->message = "Not Register succesfully due to following reason: <br>" . implode("<br>", $user->getMessages());
        }
        // $movies = new Movies();
        // print_r($this->request->getPost());
        // $movies->assign(
        //     $this->request->getPost(),
        //     [
        //         'movie_name',
        //         'movie_type'
        //     ]
        // );
        // $success = $movies->save();
        // $this->view->success = $success;
    }
}
