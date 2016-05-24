<?php

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=resultat.csv');


// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings


if ($db = new SQLiteDatabase('vote-oralires.db')) {
    fputcsv($output, array('Courriel', 'Catégorie', 'Vote', 'Date et heure', 'Adresse IP', 'User agent (navigateur)'));

    $result = $db->query('SELECT * FROM votes');
    foreach ($result as $entry) {
        fputcsv($output, array($entry['email'], $entry['categorie'], $entry['vote'], $entry['date'], $entry['ip'], $entry['useragent']));
    }
    
}
else {
    fputcsv($output, "Impossible d'afficher le contenu");
}

?>