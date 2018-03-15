<?php
require '../vendor/autoload.php';
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;
$app->get('/api', function (Request $request, Response $response, array $args) {

    return $response->withJson(
        [
            'tags' => [
                'hello',
                'hello1',
                'hello2',
                'hello3',
                'hello4',
            ],
            'posts' => [
                [
                    'title' => 'post title',
                    'text' => 'some super test 7',
                    'email' => 'test_user@mimi.com',
                ],
                [
                    'title' => 'post title hallo',
                    'text' => 'some super test 6',
                    'email' => 'test_user@mimi.com',
                ],
                [
                    'title' => 'post title vallo',
                    'text' => 'some super test 5',
                    'email' => 'test_user@mimi.com',
                ],
                [
                    'title' => 'post title shallo',
                    'text' => 'some super test 4',
                    'email' => 'test_user@mimi.com',
                ],
                [
                    'title' => 'post title sallo',
                    'text' => 'some super test 3',
                    'email' => 'test_user@mimi.com',
                ],
                [
                    'title' => 'post title kallo',
                    'text' => 'some super test 2',
                    'email' => 'test_user@mimi.com',
                ],
                [
                    'title' => 'post title tallo',
                    'text' => 'some super test 1',
                    'email' => 'test_user@mimi.com',
                ],
            ]
        ]);
});


$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});
$app->run();