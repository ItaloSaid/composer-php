#!/usr/bin/env php
<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Italo\BuscadorDeCursos\Buscador;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client([
    'verify' => false, // Desabilita a verificação do SSL
    'base_uri'=> 'https://www.alura.com.br/'
]);

$crawler = new Crawler();
$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar("cursos-online-programacao/php");
foreach ($cursos as $curso) {
    exibeMensagem($curso);
}