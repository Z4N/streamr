<?php
/**
 * Permet de sauvegarder l'image associté à la news et de formater la date
 */

// Exemple d'url récupérée "http://www.gameblog.fr/images/actu/495/40902_gb_news.jpg"
$imageUrl = $_POST['image_url'];
// Exemple de date récupéré "Sun, 02 Feb 2014 01:00:00 -0800"
$date = $_POST['date'];

// On sauvegarde l'image en local
if($imageUrl == '')
{
    $image = 'noimage.jpg';
}
else
{
    $img = @file_get_contents($imageUrl);
    if($img === false)
    {
        $image = 'noimage.jpg';
    }
    else
    {
        $image = substr($imageUrl, strrpos($imageUrl, '/') + 1);
        file_put_contents('../newsImages/'.$image, $img);
    }
}

// On formate la date dans un format triable YYYY-MM-DD HH:MM:SS
$time = strtotime($date);
$newDate = date('Y-m-d H:i:s', $time);

// On retourne le nom de l'image sauvegardée
echo json_encode(array('imageName' => $image, 'date' => $newDate));