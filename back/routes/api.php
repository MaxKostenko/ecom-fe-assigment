<?php

use Slim\Http\Request;
use Slim\Http\Response;

$app->post('/api', function (Request $request, Response $response, array $args) {
    usleep(2000000);
    $params = $request->getParsedBody();
    $image =  ($request->getUploadedFiles())['image'] ?? NULL;
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
