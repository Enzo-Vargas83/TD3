<?php
if (!empty($_POST)) {
    $action = $_POST['action'];
    $id = $_POST['identifiant'];
    $email = $_POST['email'];
    $num = $_POST['numtel'];
    $password = $_POST['password'];
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

        $query = "SELECT * FROM user WHERE Identifiant = '".$_POST['identifiant']."'";
        $queryResult = mysqli_query($dbLink, $query);
        var_dump($queryResult);
        if($queryResult == false){
            $query1 = 'INSERT INTO user (Identifiant, mail, Num_tel) VALUES (\'' . $id . '\', \''
                . $email . '\',\'' . $email . '\')';

            if (!($dbResult = mysqli_query($dbLink, $query))) {
                echo 'Erreur dans requête<br />';
                // Affiche le type d'erreur.
                echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
                // Affiche la requête envoyée.
                echo 'Requête : ' . $query . '<br/>';
                exit();
            }
        }

    } else {
        echo '<br/><strong>Bouton non géré !</strong><br/>';
    }
}
?>

