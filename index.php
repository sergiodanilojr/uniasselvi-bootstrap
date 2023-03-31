<?php

require __DIR__ . '/vendor/autoload.php';

use App\Http\Blog\HomeController;
use Framework\Database\Connection;
use Framework\Support\Config;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\ServerRequestFactory;
use League\Route\Router;

// Carregamento das variáveis de ambiente;
Dotenv\Dotenv::createUnsafeImmutable(__DIR__)->load();

$request = ServerRequestFactory::fromGlobals($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);

$router = new Router;

$router->get('/blog', HomeController::class);

// $router->get('/database', function (): ResponseInterface {

//     $response = new Response();

//     $conn = Connection::getInstance();

//     // Inserindo dados no Banco ( tabela users )
//     $statement = $conn->prepare('
//         INSERT INTO users (name, email, password) 
//         VALUES("Casa", "casa@email.com", "123456")
//     ');

//     $statement->execute();

//     // Lendo todos os dados do banco ( tabela users )
//     $statement = $conn->prepare('SELECT * FROM users');
//     $statement->execute();

//     $data = $statement->fetchAll();

//     dd($data);

//     return $response;
// });

$router->get('/usuarios', function () {
    $conn = Connection::getInstance();
    // Lendo todos os dados do banco ( tabela users )
    $statement = $conn->prepare('SELECT * FROM users');
    $statement->execute();

    $users = $statement->fetchAll();

    $html = '';

    foreach ($users as $user) {
        $html .= "<a href='/usuarios/{$user->id}' 
        style='margin:10px 6px; color:red; display: block;'>{$user->name}</a>";
    }

    $response = new Response();

    $response->getBody()->write($html);

    return $response;
});

$router->get('/usuarios/{user}', function ($request, array $params) {

    $conn = Connection::getInstance();

    $response = new Response();

    // Lendo todos os dados do banco ( tabela users )
    $statement = $conn->prepare("SELECT * FROM users WHERE id = {$params['user']}");
    $statement->execute();

    $user = $statement->fetch();

    if (!$user) {
        $response->getBody()->write("<p>Usuário não encontrado</p>");
        return $response;
    }

    $html = "<div style='padding:6px; border: 1px solid rgba(0,0,0,.4); border-radius:6px;'>
        <h2 style='display:block;'>{$user->name}</h2>
        <p style='display:block; font-size:.8em;'>E-mail: {$user->email}</p>
    </div>";

    $response->getBody()->write($html);

    return $response;
});

$response = $router->dispatch($request);

(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);
