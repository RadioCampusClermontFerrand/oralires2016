<html>
  <head>
    <meta charset="utf-8">
    <title>Résultats du vote</title>
    <meta content="">
    <style></style>
  </head>
  <body>
    <h1>Résultats du vote radiolires 2016</h1>
    <h2>Synthèse des résultats</h2>
<?php
    if ($db = new SQLiteDatabase('vote-oralires.db')) {

        foreach(array("adultes", "ados", "enfants") as $cat) {
            echo "<h3>Catégorie ".$cat."</h3>";
            
            $result = $db->query('SELECT count(*) as nb, vote FROM votes where categorie="'.$cat."\" GROUP BY vote ORDER BY nb");
            if (count($result) != 0) {
                echo "<ul>";
                foreach ($result as $entry) {
                    echo "<li><strong>".$entry["vote"]."&nbsp;:</strong> ".$entry["nb"]."</li>";
                }
                echo "</ul>";
            }
            else {
                echo "<p>Pas encore de vote pour cette catégorie.</p>";
            }
            
        }
    }
    else {
        echo "<p>Impossible d'ouvrir la base de données.</p>";
    }
?>
    <p>Retour à <a href="..">la page de vote</a>.</p>
    <h2>Résultats bruts</h2>
    <p>Télécharger les résultats bruts en suivant ce lien&nbsp;: <a href="resultat.php">resultat.csv</a>. Ouvrir le fichier avec un tableur, et choisir comme séparateur la virgule.</p>
    <h2>Administration</h2>
    <ul>
        <li><a href="creation.php">Création de la base de données</a></li>
    </ul>
  </body>
</html>