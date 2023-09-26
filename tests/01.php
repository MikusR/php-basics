<?php

$numOfEpisodesJson = json_decode(file_get_contents('https://rickandmortyapi.com/api/episode'));
$numOfEpisodes = $numOfEpisodesJson->info->count;
$episodes = [];
for ($i = 1; $i <= $numOfEpisodes; $i++) {

    $tempFile = file_get_contents("https://rickandmortyapi.com/api/episode/$i");
    $tempJson = json_decode($tempFile);
    $episodes[$i] = "Episode " . $tempJson->episode . ' with title ' . "'$tempJson->name'" . ' aired ' . $tempJson->air_date;

}

foreach ($episodes as $episode) {
    echo $episode . PHP_EOL;
}