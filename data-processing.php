<?php
if (!empty($_POST)) {
    $action = $_POST['action'];
    $id = $_POST['identifiant'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $connexionReussie = false;
    if ($action == 'mailer') {
        $file= 'data.txt';
        if(!($file = fopen($file, 'a+'))) {
            echo 'Erreur d\'ouverture';
            exit();
        }
        fputs($file, 'id : ' . $id . ', email : ' . $email . PHP_EOL);
        fclose($file); ?>
        <?php
        $dbLink = mysqli_connect('mysql-vargas.alwaysdata.net', 'vargas', 'lolo83520', 'vargas_td2');

        $query = "SELECT * FROM users WHERE Identifiant = '".$_POST['identifiant']."'";
        $queryResult = mysqli_query($query, $dbLink);
        var_dump($queryResult);

    } else {
        echo '<br/><strong>Bouton non géré !</strong><br/>';
    }
}
?>

