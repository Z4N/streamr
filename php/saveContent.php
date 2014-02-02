<?php
/**
 * Permet de récupérer le contenu complet associté à la news
 */
require 'simple_html_dom.php';

// Exemple d'url récupérée 'http://www.gameblog.fr/blogs/mo5com/p_101370_les-podcasts-de-mo5-com-23-les-remakes-de-2013'
$newsUrl = $_GET['url'];

// on récupère tous le contenu des balises p de la div ayant comme class "textcontent"
$html = file_get_html($newsUrl);
$content = $html->find('article', 0);

// On enleve tout ce qui n'est pas interessant dans le contenu html sur une news Gameblog
$content = substr($content, strpos($content, '</header>')+strlen('</header>'), strlen($content));
$content = substr($content, 0, strpos($content, '<div class="partager'));

// On le contenu de la news
echo utf8_encode($content);