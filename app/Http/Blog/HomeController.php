<?php

namespace App\Http\Blog;

use Framework\Database\Connection;
use Framework\Http\Controller;

class HomeController extends Controller
{
    public function __invoke()
    {
        //conexão com o banco de dados

        $conn = Connection::getInstance();

        $stmt = $conn->prepare('SELECT * FROM users');
        $stmt->execute();
        $users = $stmt->fetchAll();

        if (empty($users)) {
            $this->response->getBody()->write('Deu ruim... Não tem usuários');
            return $this->response;
        }

        // visão 
        // $templates = new \League\Plates\Engine(__DIR__ . '/../../../resources/views/blog');
        // $view = $templates->render('home', ['users' => $users, 'title' => 'Blog']);

        $view = $this->view->render('blog::home', ['users' => $users, 'title' => 'Blog']);

        $this->response->getBody()->write($view);

        return $this->response;
    }
}
