<?php
function seo($text){
    $find = array("/Ğ/","/Ü/","/Ş/","/İ/","/Ö/","/Ç/","/ğ/","/ü/","/ş/","/ı/","/ö/","/ç/");
    $degis = array("G","U","S","I","O","C","g","u","s","i","o","c");
    $text = preg_replace("/[^0-9a-zA-ZÄzÜŞİÖÇğüşıöç]/"," ",$text);
    $text = preg_replace($find,$degis,$text);
    $text = preg_replace("/ +/"," ",$text);
    $text = preg_replace("/ /","-",$text);
    $text = preg_replace("/\s/","",$text);
    $text = strtolower($text);
    $text = preg_replace("/^-/","",$text);
    $text = preg_replace("/-$/","",$text);
    return $text;
}

function getWeather($city, $district = null){
    $apiKey = "8a83948724c466bcbf1bb2a40053bd55"; // OpenWeatherMap API anahtarınızı buraya ekleyin.
    $city = seo($city);

    if ($district) {
        $district = seo($district);
        $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q={$city},{$district}&appid={$apiKey}&units=metric&lang=tr";
    } else {
        $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric&lang=tr";
    }

    $response = file_get_contents($apiUrl);

    if ($response) {
        $data = json_decode($response);
        $weather = $data->weather[0]->description;
        $temperature = $data->main->temp;
        $icon = $data->weather[0]->icon;

        echo "<h2>{$city}";

        if ($district) {
            echo " - {$district}";
        }

        echo " için Hava Durumu</h2>";
        echo "<p>Hava: {$weather}</p>";
        echo "<p>Sıcaklık: {$temperature} °C</p>";
        echo "<img src='http://openweathermap.org/img/w/{$icon}.png' alt='Hava Durumu İkonu'>";
    } else {
        echo "<p class='text-danger'>Hava durumu bilgileri alınamadı. Lütfen geçerli bir şehir ve ilçe adı girin.</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hava Durumu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .weather-container {
            max-width: 400px;
            margin: 0 auto;
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="weather-container">
            <h1>Hava Durumu</h1>
            <form method="post">
                <div class="form-group">
                    <label for="city">İl:</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <div class="form-group">
                    <label for="district">İlçe (Opsiyonel):</label>
                    <input type="text" class="form-control" id="district" name="district">
                </div>
                <button type="submit" class="btn btn-primary">Hava Durumu Getir</button>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $city = $_POST["city"];
                $district = $_POST["district"];
                getWeather($city, $district);
            }
            ?>
        </div>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
