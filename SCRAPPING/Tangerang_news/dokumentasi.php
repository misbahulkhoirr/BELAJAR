<?php
// SSL, yang merupakan singkatan dari Secure Sockets Layer, adalah protokol yang membuat tautan terenkripsi dan diautentikasi antara browser web dan server web;


$ch = curl_init(); // untuk start curl (inisialisasi CURL)
curl_setopt($ch, CURLOPT_URL, 'https://unsplash.com'); // untuk setting target url
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // untu verifikasi sertifikat SSL HOST
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  // untuk verifikasi sertifikat SSL orang lain
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // untuk memberi tahu library untuk mengikuti header Location
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // untuk post data ke server
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch); // untuk menampilkan data curl
curl_close($ch); // untuk menutup data curl
