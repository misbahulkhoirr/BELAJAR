<?php

namespace App\Http\Controllers;

use DOMDocument;
use Illuminate\Http\Request;

class Home_Controller extends Controller
{
    function index()
    {
        $url = 'https://unsplash.com/';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);
        // echo $result;

        $dom = new DOMDocument();
        libxml_use_internal_errors($result);
        $dom->loadHTML($result);
        $tags = $dom->getElementsByTagName(('img'));

        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $url = 'https://unsplash.com/s/photos/' . $search;

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);

            $dom = new DOMDocument();
            libxml_use_internal_errors($result);
            $dom->loadHTML($result);
            $tags = $dom->getElementsByTagName('img');
        }
        return view('home', [
            'tags' => $tags,
            // 'search' => $search
        ]);
    }
}
