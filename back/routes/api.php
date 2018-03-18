<?php
use Slim\Http\Request;
use Slim\Http\Response;

$app->post( '/api', function (Request $request, Response $response, array $args) {
    $newPost = $this->get('post')->addPost($request->getParsedBody());

    return $response->withJson(
        [
            'tags' => $this->get('tag')->getTop(),
            'post' => $newPost
        ]);
});

$app->get('/api', function (Request $request, Response $response, array $args) {

    return $response->withJson(
        [
            'tags' => $this->get('tag')->getTop(),
            'posts' => $this->get('post')->getList()
        ]);
});
