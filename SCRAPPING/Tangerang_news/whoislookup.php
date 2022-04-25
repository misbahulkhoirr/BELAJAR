<?php

$data = array(
    'remoteAddress' => 'rentalmobiltng.com'
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.yougetsignal.com/tools/whois-lookup/php/get-whois-lookup-json-data.php');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$response = curl_exec($ch);
$arrayResult = json_decode($response, true);
print_r($arrayResult);

echo "remote Adres => " . $arrayResult['remoteAddress'] . "<br>";
echo "remote Avaible => " . $arrayResult['domainAvailable'] . "<br>";
echo $arrayResult['whoisData'];
