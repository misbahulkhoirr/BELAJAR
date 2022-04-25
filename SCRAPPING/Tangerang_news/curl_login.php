<?php

$data = array(
    "login" => "xxxxxx",
    "password" => "xxxxxx",
    "security_level" => "0",
    "form " => "submit"
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.figma.com/files/recent?fuid=1062287911398930347');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
curl_close($ch);
echo $result;
