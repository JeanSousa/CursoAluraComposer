<?php

require 'vendor/autoload.php';
// require 'src/Buscador.php'; //esse require foi configurado no autoloader no composer json
// com o dump-autoload eu recarrego a informação do composer json para o vendor/autoload
// conhecer essas informaçoes

use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['base_uri' => 'https://www.alura.com.br/']);
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');

foreach ($cursos as $curso) {
    echo exibeMensagem($curso);
}
