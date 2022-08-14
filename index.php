<?php
$weather = "";
$error = "";
if(isset($_GET['city'])){
$url_content = file_get_contents('https://api.openweathermap.org/data/2.5/weather?q='.$_GET['city'].'&units=metric&appid=54867939e16c7c928c2947ffc698ed28');
$forcastArray = json_decode($url_content, true);
if($forcastArray['cod'] == 200){
    $weather = 'The weather in '.$_GET['city'].' is '.$forcastArray['weather'][0]['description'];
    $weather = $weather.'. The temperature is '.$forcastArray['main']['temp'].'°C. The speed of wind is '.$forcastArray['wind']['speed'].' m/sec.';
    
}else{
    $error = "The city name is incorrect! Please try again!";
}

}
// print_r($forcastArray);
// }else{
//     echo "nothing";
// }


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Weather App</title>
  </head>
  <body>
    <div class="container" id="main">
        <h1>Weather in the City</h1>
        <form>
  <div class="mb-3">
    <label for="city" class="form-label">Choose city:</label>
    <input type="text" class="form-control" id="city" name="city" aria-describedby="Forcast city" placeholder="Enter City Name">
  </div>
  <button type="submit" class="btn btn-primary">Ask</button>
</form>
    </div>
    <?php

    if($weather){
    echo '<div class="alert alert-light" role="alert">'.$weather.'</div>';
             
    }else if ($error){
        echo '<div class="alert alert-warning" role="alert">'.$error.'</div>';
    }
  ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
