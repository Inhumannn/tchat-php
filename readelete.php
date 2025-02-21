<?php
require_once("connect.php");
$tchat = $db->prepare('SELECT * FROM tchat ORDER BY id_tchat ASC');
$tchat->execute();
$result = $tchat->fetchAll();
foreach($result as $msg){
    echo '<p>Message de '.$msg['pseudo_tchat']. ' : '.$msg['message_tchat'].'
    <a href="update.php?id='.$msg['id_tchat'].'">Modifier</a>
    <a href="delete.php?id='.$msg['id_tchat'].'">Supprimer</a></p>';
}