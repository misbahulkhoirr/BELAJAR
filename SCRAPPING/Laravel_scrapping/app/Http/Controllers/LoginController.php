<?php

namespace App\Http\Controllers;

use DOMDocument;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function index()
    {
        return view('login', [
            'title' => 'Login'
        ]);
    }

    function login(Request $request)
    {
        $cookie = '../public/cookie/' . session()->getId() . '.txt';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://oplbo.com/auth/login');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIEJAR,  $cookie);
        $respons = curl_exec($ch);


        $dom = new DOMDocument($respons);
        $libxml_previous_state = libxml_use_internal_errors(true);
        $dom->loadHTML($respons);
        libxml_use_internal_errors($libxml_previous_state);
        $tags = $dom->getElementsByTagName(('input'));

        for ($i = 0; $i < $tags->length; $i++) {
            $grab = $tags->item($i);
            if ($grab->getAttribute('name') === '_token') {
                $token = $grab->getAttribute('value');
            }
        }

        $data = array(
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            '_token' => $token
        );

        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, "https://oplbo.com/auth/login");
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
        curl_setopt($ch, CURLOPT_COOKIEFILE,  $cookie);
        $hasil = curl_exec($ch);
        curl_close($ch);
        // echo $hasil;
        // dd($hasil);
        return view('dashboard', compact('hasil'));
    }

    function logout(Request $request)
    {
        $cookie = '../public/cookie/' . session()->getId() . '.txt';
        // $data = array(
        //     '_token' => $request->input('_token'),
        // );
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, 'http://192.168.1.23:8000/logout');
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_COOKIEJAR,  $cookie);
        // $respons = curl_exec($ch);
        // echo $respons;






        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        // curl_setopt($ch, CURLOPT_URL, "http://192.168.1.23:8000/logout");
        // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
        // curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
        // $hasil = curl_exec($ch);

        // curl_close($ch);
        // echo $hasil;
        // return redirect('login');
        \Cookie::forget($cookie);

        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/login');
    }
}
