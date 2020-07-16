<?php
// CALL Settings


$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://newsapi.org/v2/top-headlines?country=ca&category=sports&apiKey=258e86f68dc44e5591c4dec4b69749fc'
]);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
   'Content-Type: application/json'
) );






