<?php

use Phalcon\Mvc\Micro\Collection;
use app\responses\Response;

$books = new Collection();
$books->setHandler('app\controllers\BookController', true);

$books->get('/v1/books/{id:[0-9]+}', 'getAction');
$books->get('/v1/books', 'getAllAction');
$books->post('/v1/books', 'createAction');
$books->put('/v1/books/{id:[0-9]+}', 'updateAction');
$books->delete('/v1/books/{id:[0-9]+}', 'deleteAction');

$application->mount($books);

$application->after(function() use($application) {
    $application->response->setContentType('application/json', 'UTF-8');
    $output_content = json_encode(new Response($application->getReturnedValue()), JSON_UNESCAPED_SLASHES);

    $application->response->setContent($output_content);
    $application->response->send();
});

$application->notFound(function () use ($application) {
    $application->response->setStatusCode(404, 'Not Found');
    $application->response->sendHeaders();

    $message = 'Action Not Found';
    $application->response->setContent($message);
    $application->response->send();
});

$application->error(function(\Exception $ex) use($application) {
    $content = [
        'status' => 'ERROR',
        'code' => $ex->getCode(),
        'description' => $ex->getMessage()
    ];

    $application->response->setContentType('application/json', 'UTF-8');
    $output_content = json_encode($content, JSON_UNESCAPED_SLASHES);
    $application->response->setContent($output_content);
    $application->response->setStatusCode(400);
    $application->response->send();
    exit;
});