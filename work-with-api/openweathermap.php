<?php
$myApiKey = '42b3491cce53360a8d1494d21bcda2cc';
$city = readline("Enter City ");

$url = "https://api.openweathermap.org/data/2.5/weather?q=$city&units=metric&appid=$myApiKey";
$weatherJsonDecoded = json_decode(file_get_contents($url));
$temperature = $weatherJsonDecoded->main->temp;
$feelsLike = $weatherJsonDecoded->main->feels_like;
$humidityPercent = $weatherJsonDecoded->main->humidity;

echo "Weather currently in $city\n";
echo "Temperature is {$temperature}°C that feels like {$feelsLike}°C\n";
echo "Humidity is $humidityPercent%";


