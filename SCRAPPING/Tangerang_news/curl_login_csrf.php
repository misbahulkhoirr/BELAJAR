<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://unsplash.com/login');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
$response = curl_exec($ch);
curl_close($ch);


$dom = new DOMDocument;
libxml_use_internal_errors($response);
$dom->loadHTML($response);
$tags = $dom->getElementsByTagName(('input'));
for ($i = 0; $i < $tags->length; $i++) {
    $grab = $tags->item($i);
    if ($grab->getAttribute('name') === 'authenticity_token') {
        $token = $grab->getAttribute('value');
    }
}
$data = array(
    'user[email]' => 'email',
    'user[password]' => 'password',
    "authenticity_token" => $token,
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://unsplash.com/login');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$response = curl_exec($ch);
var_dump($data);
