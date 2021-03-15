<?php

use Slim\Slim;
use Controller\ContactController;

require_once 'vendor/autoload.php';

$app = new Slim();

/**
 * remember of AllowOverride ALL
 * @todo creates an array of object on contactModel for the categories, please
 */
$app->get('/', function () {
    echo "ola";
});

$app->post('/new-contact', function () use ($app) {
    $user = new ContactController();
    $app->response->setBody(
        $user->createContactData(
            $app->request->post()
        )
    );

    return $app->response->getBody();
});

$app->get('/contacts', function() use ($app) {
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

