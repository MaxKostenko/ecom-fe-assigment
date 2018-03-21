<?php

use Slim\Http\Request;
use Slim\Http\Response;

$app->post('/api', function (Request $request, Response $response, array $args) {
    $params = $request->getParsedBody();
    $image =  $request->getUploadedFiles()[0] ?? NULL;

    return $response->withJson($this->get('post')->addPost($params, $image));
}
);

$app->get('/api', function (Request $request, Response $response, array $args) {
    return $response->withJson(
        [
            'tags'  => $this->get('tag')->getTop(),
            'posts' => $this->get('post')->getList()
        ]
    );
}
);
