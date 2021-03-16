<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");

use Slim\Slim;
use Controller\ContactController;

require_once 'vendor/autoload.php';

$app = new Slim();
$app->response->headers->set('Content-Type', 'application/json');
/**
 * remember of AllowOverride ALL
 * @todo creates an array of object on contactModel for the categories, please
 */
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

