<html>
  <head>
    <meta charset="utf-8">
    <title>Mise à jour de la base de données</title>
    <meta content="">
    <style></style>
  </head>
  <body>
    <h1>Mise à jour de la base de données</h1>
<?php

    if (file_exists("vote-oralires.db")) {
        echo "<p>La base de données est déjà existante.</p>";

    }
    else {
        if ($db = new SQLiteDatabase('vote-oralires.db')) {

            $q = $db->query('CREATE TABLE votes (email VARCHAR(255), categorie VARCHAR(16), vote VARCHAR(255), ip VARCHAR(16), date DATETIME, useragent VARCHAR(255), PRIMARY KEY (email, categorie))');
                
            if (!$q) {
                echo "<p>Erreur pendant la création de la base de données.</p>";
            }
            else {
                echo "<p>Création de la base de données effectuée.</p>";
            }
        }
        else  {
                echo "<p>Erreur pendant la création du fichier de la base de données.</p>";
            }
    }
?>  
    <p>Retour à <a href=".">la page d'administration</a>.</p>
    </body>
</html>