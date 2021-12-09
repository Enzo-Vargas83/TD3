<?php
if (!empty($_POST)) {
    $action = $_POST['action'];
    $id = $_POST['identifiant'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pays = $_POST['pays'];
    $num = $_POST['numtel'];
    $genre = $_POST['sexe'];
    if ($action == 'mailer') {
        $file= 'data.txt';
        if(!($file = fopen($file, 'a+'))) {
            echo 'Erreur d\'ouverture';
            exit();
        }
        fputs($file, 'id : ' . $id . ', email : ' . $email . PHP_EOL);
        fclose($file);
    } else {
        echo '<br/><strong>Bouton non géré !</strong><br/>';

    }
    header('Location : index.php');
    exit();
}
?>
