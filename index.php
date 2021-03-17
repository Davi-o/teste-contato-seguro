<?php
    $curlSession = curl_init('http://localhost/teste-contato-seguro/api/');
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_SSL_VERIFYPEER, false);
    $response = json_decode(curl_exec($curlSession));
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="resource/api.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Agenda de Contatos</title>
</head>
<body class="bg-light">
    <div class="bg-white container card">
        <h1 class="text-info">
            Contatos
        </h1>
        <div class="card-body">
        <?php
            foreach ($response as $contact){
                echo "<form 
                        action='resource/edit-create-contact.php' 
                        method='post' 
                        id='editContact-{$contact->id}'></form>
                ";
            }
        ?>
        <form
            action='resource/edit-create-contact.php'
            method='post'
            id='new-contact'
        ></form>
        <table class="table table-responsive" id="contactsTable">
            <thead>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th class="bg-info" scope="col">
                    <button
                            type="submit"
                            form="new-contact"
                            value="Adicionar"
                            class="btn bg-info text-white"
                    >Adicionar <i class="fa fa-plus"></i></button>
                </th>
            </thead>
            <tbody>
                <?php
                    foreach ($response as $contact){
                        $json = json_encode($contact);
                        echo "
                            <tr scope='row' id='contact-{$contact->id}' >
                                <input 
                                    name='id' 
                                    type='hidden' 
                                    form='editContact-{$contact->id}'
                                    value='{$contact->id}' />
                                <td id='contactName'>
                                    <input 
                                        name='name' 
                                        value='{$contact->name}'
                                        type='hidden' 
                                        form='editContact-{$contact->id}'>
                                        {$contact->name}
                                    </input>
                                </td>
                                <input 
                                    name='age' 
                                    value='{$contact->age}'
                                    type='hidden'
                                    form='editContact-{$contact->id}'
                                />
                                <td id='contactEmail'>
                                    <input 
                                        name='email'
                                        value='{$contact->email}' 
                                        type='hidden' 
                                        form='editContact-{$contact->id}'>
                                        {$contact->email}
                                    </input>
                                </td>
                                <td id='contactPhone'>
                                    <input 
                                        name='phoneNumber'
                                        value='{$contact->phoneNumber}'
                                        type='hidden' 
                                        form='editContact-{$contact->id}'>
                                        {$contact->phoneNumber}
                                    </input>
                                </td>
                                <td colSpan='2'>
                                    <button 
                                        type='submit'
                                        id='editButton'
                                        form='editContact-{$contact->id}'
                                        class='btn bg-white'><i class='fa fa-pencil-square-o'></i></button>
                                    <button 
                                        type='button'
                                        onclick='deleteContact({$contact->id})' 
                                        id='deleteButton'
                                        class='btn bg-white'>
                                        <i class='fa fa-trash'></i>
                                    </button>
                                </td>
                            </tr>
                        ";
                    }
                ?>
            </tbody>
        </table>
        </div>
    </div>
    
</body>
</html>
