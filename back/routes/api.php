<?php
use Slim\Http\Request;
use Slim\Http\Response;

$app->post( '/api', function (Request $request, Response $response, array $args) {
    $this->get('post')->addPost([
        'title' => 'Title Text',
        'text' => 'Text -> ' . time(),
        'author' => 'Some author',
    ]);
});

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
                    'time' => '12:34:00',
                ],
                [
                    'title' => 'post title hallo',
                    'text' => 'some super test 6',
                    'email' => 'test_user@mimi.com',
                    'time' => '12:30:00',
                ],
                [
                    'title' => 'post title vallo',
                    'text' => 'some super test 5',
                    'email' => 'test_user@mimi.com',
                    'time' => '12:24:00',
                ],
                [
                    'title' => 'post title shallo',
                    'text' => 'some super test 4',
                    'email' => 'test_user@mimi.com',
                    'time' => '12:14:00',
                ],
                [
                    'title' => 'post title sallo',
                    'text' => 'some super test 3',
                    'email' => 'test_user@mimi.com',
                    'time' => '12:10:00',
                ],
                [
                    'title' => 'post title kallo',
                    'text' => 'some super test 2',
                    'email' => 'test_user@mimi.com',
                    'time' => '12:04:00',
                ],
                [
                    'title' => 'post title tallo',
                    'text' => 'some super test 1',
                    'email' => 'test_user@mimi.com',
                    'time' => '12:01:00',
                ],
            ]
        ]);
});
