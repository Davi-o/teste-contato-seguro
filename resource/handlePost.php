<?php
if (! empty($_POST)) {
    if (! empty($_POST['id'])) {
        $contactData['id'] = htmlspecialchars(strip_tags($_POST['id']));
    }

    $contactData['name'] = htmlspecialchars(strip_tags($_POST['name']));
    $contactData['age'] = htmlspecialchars(strip_tags($_POST['age']));
    $contactData['phoneNumber'] = htmlspecialchars(strip_tags($_POST['phoneNumber']));
    $contactData['email'] = htmlspecialchars(strip_tags($_POST['email']));

    try {
        $ch = curl_init('http://localhost/teste-contato-seguro/api/contact');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($contactData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

        curl_exec($ch);
    } catch (Exception $exception) {
        echo  "<script>alert('Erro ao cadastrar novo contato');</script>";
    }

    header('location: ../index.php');
    die();
}

