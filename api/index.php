<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 86400');
header('Access-Control-Allow-Headers: *');

use Slim\Slim;
use Controller\ContactController;

require_once 'vendor/autoload.php';

$app = new Slim();
$app->response->headers->set('Content-Type', 'application/json');

$app->post('/contact', function () use ($app) {
    $user = new ContactController();
    $app->response->setBody(
        $user->createContactData(
            $app->request->getBody()
        )
    );

    return $app->response->getBody();
});

$app->get('/', function() use ($app) {
    $user = new ContactController();
    $app->response->setBody($user->getAllContacts());
    return $app->response->getBody();
});

$app->delete('/delete-contact/:id', function ($id) use ($app) {
    $contact = new ContactController();
    $app->response->setBody($contact->deleteContact($id));
    return $app->response->getBody();
});

$app->run();

