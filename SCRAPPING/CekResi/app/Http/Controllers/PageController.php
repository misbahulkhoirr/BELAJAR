<?php

namespace App\Http\Controllers;


use DOMDocument;
use Illuminate\Http\Request;

class PageController extends Controller
{
  function index()
  {
    return view('page', [
      'title' => 'Page'
    ]);
  }

  function test(Request $request)
  {
    $cek = 'https://cekresi.co.id/cek-ongkir';
    $referlogin = 'https://cekresi.co.id/cek-ongkir';
    $api = 'https://cekresi.co.id/api/ongkir/dom';
    $cookie = '../public/cookie/' . session()->getId() . '.txt';



    $courier = $request->input('courier');
    $destination = $request->input('destination');
    $origin = $request->input('origin');
    $weight = $request->input('weight');


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $cek);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
    $response = curl_exec($ch);
    curl_close($ch);

    $dom = new DOMDocument;
    libxml_use_internal_errors($response);
    $dom->loadHTML($response);

    $tags = $dom->getElementsByTagName(('select'));
    for ($i = 0; $i < $tags->length; $i++) {
      $grab = $tags->item($i);
      if ($grab->getAttribute('name') === 'courier') {
        $result1 = preg_replace('/(<select[^><]*)>/i', '$1 value=' . $courier . '>', $response);
      } elseif ($grab->getAttribute('name') === 'origin') {
        $result = preg_replace('/(<select\b[^><]*)>/i', '$1 value=' . $origin . '>', $response);
      } elseif ($grab->getAttribute('name') === 'destination') {
        $result = preg_replace('/(<select\b[^><]*)>/i', '$1 value=' . $destination . '>', $response);
      }
    }
    // dd($result1);
    echo $result1;
    // $tags = $dom->getElementsByTagName(('input'));
    // for ($i = 0; $i < $tags->length; $i++) {
    //   $grab = $tags->item($i);
    //   if ($grab->getAttribute('name') === 'weight') {
    //     $berat = $grab->setAttribute('value', $weight);
    //   }
    // }

    // $data = array(
    //   'courier' => $kurir->value,
    //   'destination' => $tujuan->value,
    //   'origin' => $asal->value,
    //   'weight' => $berat->value,
    // );
    // dd($result);

    // $tags = $dom->getElementsByTagName(('button'));
    // for ($i = 0; $i < $tags->length; $i++) {
    //   $grab = $tags->item($i);
    //   if ($grab->getAttribute('type') === 'submit') {

    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $api);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    //     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    //     curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
    //     curl_setopt($ch, CURLOPT_REFERER, $referlogin);
    //     $res = curl_exec($ch);
    //     curl_close($ch);
    //     dd($res);
    //   }
    // }




    // $data = array(
    //   'courier' => $request->input('courier'),
    //   'destination' => $request->input('destination'),
    //   'origin' => $request->input('origin'),
    //   'weight' => $request->input('weight'),
    // );


    // $ch = curl_init();
    // curl_setopt_array($ch, ([
    //   CURLOPT_URL => $api,
    //   CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36',
    //   CURLOPT_POST => true,
    //   CURLOPT_POSTFIELDS => json_encode($data),
    //   CURLOPT_RETURNTRANSFER => true,
    //   CURLOPT_FOLLOWLOCATION => true,
    //   CURLOPT_REFERER => $referlogin,
    //   CURLOPT_HTTPHEADER => array(
    //     // 'referer: https://cekresi.co.id',
    //     // 'sec-ch-ua: " Not A;Brand";v="99", "Chromium";v="99", "Google Chrome";v="99"',
    //     // 'sec-ch-ua-mobile: ?0',
    //     // 'sec-ch-ua-platform: "Windows"',
    //     // 'sec-fetch-dest: empty',
    //     // 'sec-fetch-mode: cors',
    //     // 'sec-fetch-site: same-origin',
    //     // 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.74 Safari/537.36',
    //     'x-api-key: 8d2123304016b90d9d5ca25587beaccab75c3541ddbace6de56008b2c666e8b8',
    //     'x-requested-with: XMLHttpRequest'
    //   ),
    //   CURLOPT_SSL_VERIFYPEER => false,
    //   CURLOPT_SSL_VERIFYHOST => 2,
    //   CURLOPT_COOKIEJAR => $cookie,
    //   CURLOPT_COOKIEFILE =>  $cookie,
    // ]));
    // $test = curl_exec($ch);
    // curl_close($ch);

    // dd($test);
  }
}
