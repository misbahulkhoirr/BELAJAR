<?php



if (!function_exists('fix_angka_bni')) {

    function fix_angka_bni($string)

    {

        $string = substr($string, 4, -3);

        $string = str_replace('.', '', $string);

        return (int)$string;
    }
}



function bank_bni($config, $transactions)

{

    global $pdo;



    $invoices = array();

    $lunas = array();



    $ua = "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36";

    $cookie = APP_PATH . '/cache/bni-cookie.txt';



    $ch = curl_init();



    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);

    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);

    curl_setopt($ch, CURLOPT_USERAGENT, $ua);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);



    curl_setopt(
        $ch,
        CURLOPT_URL,

        'https://ibank.bni.co.id/MBAWeb/FMB;jsessionid=0000gsadMFnW4TJnYCFiblgmvcx:1a1li5jho?page=Thin_SignOnRetRq.xml&MBLocale=bh'
    );

    $result = curl_exec($ch);



    include_once(INC_PATH . '/simple_html_dom.php');

    $dom = new simple_html_dom();



    $dom->load($result);

    $form = $dom->find('form', 0);

    if (strpos($config['api']['username'], ':') !== false) {

        $exp = explode(':', $config['api']['username']);

        $username = $exp[1];
    } else {

        $username = $config['api']['username']; // Username

    }

    $password = $config['api']['password']; // Password

    $no_rek = $config['nomor_rekening']; //Nomor Rekening



    $postdata = 'Num_Field_Err=%22Please+enter+digits+only%21%22&Mand_Field_Err=%22Mandatory+field+is+empty%21%22&CorpId=' .

        urlencode($username) . '&PassWord=' . urlencode($password) .

        '&__AUTHENTICATE__=Login&CancelPage=HomePage.xml&USER_TYPE=1&MBLocale=bh&language=bh&AUTHENTICATION_REQUEST=True&__JS_ENCRYPT_KEY__=&JavaScriptEnabled=N&deviceID=&machineFingerPrint=&deviceType=&browserType=&uniqueURLStatus=disabled&imc_service_page=SignOnRetRq&Alignment=LEFT&page=SignOnRetRq&locale=en&PageName=Thin_SignOnRetRq.xml&formAction=https%3A%2F%2Fibank.bni.co.id%2FMBAWeb%2FFMB%3Bjsessionid%3D0000gsadMFnW4TJnYCFiblgmvcx%3A1a1li5jho&mConnectUrl=FMB&serviceType=Dynamic';

    $form_action = $form->action;

    curl_setopt($ch, CURLOPT_URL, $form_action);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);

    curl_setopt($ch, CURLOPT_POST, 1);

    $result = curl_exec($ch);



    $dom->clear();

    $dom->load($result);

    $link = $dom->find("#MBMenuList", 0);

    parse_str($link->href, $params);



    $jkt_time = time(); // + (3600 * 7);

    $dari_tgl = date('d-M-Y', $jkt_time - (3600 * 24));

    $ke_tgl = date('d-M-Y', $jkt_time);



    $postdata = 'Num_Field_Err=%22Please+enter+digits+only%21%22&Mand_Field_Err=%22Mandatory+field+is+empty%21%22&acc1=OPR%7C0000000' .

        $no_rek . '%7CBNI+TAPLUS&TxnPeriod=-1&Search_Option=Date&txnSrcFromDate=' . $dari_tgl .

        '&txnSrcToDate=' . $ke_tgl .

        '&FullStmtInqRq=Lanjut&MAIN_ACCOUNT_TYPE=OPR&mbparam=' . urlencode($params['mbparam']) .

        '&uniqueURLStatus=disabled&imc_service_page=AccountIDSelectRq&Alignment=LEFT&page=AccountIDSelectRq&locale=bh&PageName=AccountTypeSelectRq&formAction=' .

        urlencode($form_action) . '&mConnectUrl=FMB&serviceType=Dynamic';

    curl_setopt($ch, CURLOPT_URL, $form_action);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);

    curl_setopt($ch, CURLOPT_POST, 1);

    curl_setopt($ch, CURLOPT_REFERER, $form_action);

    $data = curl_exec($ch);



    if (
        stripos($data, 'telah ditentukan dan tanggal yang valid')

        !== false
    ) {

        $dari_tgl = date('d-m-Y', $jkt_time - (3600 * 24));

        $ke_tgl = date('d-m-Y', $jkt_time);

        $postdata = 'Num_Field_Err=%22Please+enter+digits+only%21%22&Mand_Field_Err=%22Mandatory+field+is+empty%21%22&acc1=OPR%7C0000000' .

            $no_rek . '%7CBNI+TAPLUS&TxnPeriod=-1&Search_Option=Date&txnSrcFromDate=' . $dari_tgl .

            '&txnSrcToDate=' . $ke_tgl .

            '&FullStmtInqRq=Lanjut&MAIN_ACCOUNT_TYPE=OPR&mbparam=' . urlencode($params['mbparam']) .

            '&uniqueURLStatus=disabled&imc_service_page=AccountIDSelectRq&Alignment=LEFT&page=AccountIDSelectRq&locale=bh&PageName=AccountTypeSelectRq&formAction=' .

            urlencode($form_action) . '&mConnectUrl=FMB&serviceType=Dynamic';

        curl_setopt($ch, CURLOPT_URL, $form_action);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);

        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_REFERER, $form_action);

        $data = curl_exec($ch);
    }



    $postdata = 'Num_Field_Err=%22Please+enter+digits+only%21%22&Mand_Field_Err=%22Mandatory+field+is+empty%21%22&__LOGOUT__=Keluar&mbparam=' .

        urlencode($params['mbparam']) .

        '&uniqueURLStatus=disabled&imc_service_page=SignOffUrlRq&Alignment=LEFT&page=SignOffUrlRq&locale=bh&PageName=LoginRs&formAction=' .

        urlencode($form_action) . '&mConnectUrl=FMB&serviceType=Dynamic';

    curl_setopt($ch, CURLOPT_URL, $form_action);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);

    curl_setopt($ch, CURLOPT_POST, 1);

    curl_setopt($ch, CURLOPT_REFERER, $form_action);

    $result = curl_exec($ch);

    curl_close($ch);
}
