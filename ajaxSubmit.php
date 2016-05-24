<?php
$email = SQLite3::escapeString($_POST['email']);
$categorie = SQLite3::escapeString($_POST['categorie']);
$vote = SQLite3::escapeString($_POST['vote']);
/*$email = "toto";
$categorie = "cat";
$vote = "v";*/

$ip = getenv('HTTP_CLIENT_IP')?:
getenv('HTTP_X_FORWARDED_FOR')?:
getenv('HTTP_X_FORWARDED')?:
getenv('HTTP_FORWARDED_FOR')?:
getenv('HTTP_FORWARDED')?:
getenv('REMOTE_ADDR');

$useragent = getenv("HTTP_USER_AGENT");

setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
date_default_timezone_set('Europe/Paris');

$date = date("Y-m-d H:i:s");

function reponse($message) {
    echo json_encode(array('status' => $message));
    exit(0);
}

if ($email == "" || $categorie == "" || $vote == "") {
    //file_put_contents('logs.txt', "empty quelquechose".PHP_EOL , FILE_APPEND);
    reponse("error");
}

if ($db = new SQLiteDatabase('admin/vote-oralires.db')) {

        $requete = "INSERT INTO votes (email, categorie, vote, ip, date, useragent) VALUES (\"".$email."\", \"".$categorie."\", \"".$vote."\", \"".$ip."\", \"".$date."\", \"".$useragent."\")";
        //file_put_contents('logs.txt', $requete.PHP_EOL , FILE_APPEND);


        if (!@$db->query($requete)) {
            reponse("existing-vote");
        }
        else {
            reponse("ok");
        }
}
else {
    reponse("error");
}

?>