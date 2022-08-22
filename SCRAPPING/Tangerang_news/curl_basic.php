<?php

$ch = curl_init(); // start curl
curl_setopt($ch, CURLOPT_URL, 'http://worldtimeapi.org/api/timezone/Asia/Jakarta'); // setting target url
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // untu
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // untuk mengatasi masalah ssl
curl_exec($ch);
curl_close($ch);
