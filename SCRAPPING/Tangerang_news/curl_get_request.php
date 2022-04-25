<?php

$search = "laptop";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://unsplash.com/s/photos/' . $search);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_exec($ch);
curl_close($ch);
