<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Paddle\Http\Controllers\WebhookController as CashierController;


class WebhookController extends CashierController
{
   
    public function handlePaymentSucceeded($payload)
    {
         // Your Paddle 'Public Key'
        $public_key_string =
        "-----BEGIN PUBLIC KEY-----
        MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEAuIjJceFCCvyltHjUGxUI
        NkYT1T9IGgd0E3o3a9b6+Zk9uAh3ziab6/0bETNB8hrV2CNRRI2pqap6EV4GhKhz
        qc2olZcUYXagrIq6FN3Ir/OBWw8oujoDw+nEVa+4QIwrWPTk1rSXIrD2scwwqIdj
        JrZsWHrQl7VQZFoNvgBoHwSLn7985YFJltSViKvcBmQOrs8XNWHARNKyiQwh1Uyq
        pT+oKOejLqYWm5De+OG9K+a+7V8JANAdadz5ItHvS66v3QE5T3VkB/cCz3LeZmmk
        emzy1EVPMEYn0f2nqVhFzKnDjyekgfSRx080E5fXRho5a9bCv4gNbESkzom3tGzh
        ObSnCF0pXNC/eJIEmybxc0ab5ISnyCrpljWG34o9QUGpU5dA4Hb8NdWoVESuVQLX
        AEQ1JXjrCOGHE0T20d0FE9KH5kIOQuVDO4OuMYfo5wUXdwVD5KoJcgiUPraakEig
        QGodB/dvPNVVsOvB5zrxi9DyNeDGj1IRyhNEiPtXdocyTarMt4sFHeK3QDQYMnjc
        iAQ8b7ftk0vG+CLU4ahXYoft4rq1p2IkjJjjNNs5kZ7JzAltHf/FjgnxqIDig/TO
        WA4Gqcfrmvaza4Fc03gEDeE3w8LsfLLiF97kA9PYNXFLzcya/gmN1Ad0oYhN304Z
        wtk8eLQGEcS+mB9ARP33MHkCAwEAAQ==
        -----END PUBLIC KEY-----";

        $public_key = openssl_get_publickey($public_key_string);
        
        // Get the p_signature parameter & base64 decode it.
        $signature = base64_decode($_POST['p_signature']);
        
        // Get the fields sent in the request, and remove the p_signature parameter
        $fields = $_POST;
        unset($fields['p_signature']);
        
        // ksort() and serialize the fields
        ksort($fields);
        foreach($fields as $k => $v) {
            if(!in_array(gettype($v), array('object', 'array'))) {
                $fields[$k] = "$v";
            }
        }
        $data = serialize($fields);
        
        // Verify the signature
        $verification = openssl_verify($data, $signature, $public_key, OPENSSL_ALGO_SHA1);
        
        if($verification == 1) {
            logger('Yay! Signature is valid!');
        } else {
             logger('The signature is invalid!');
        }
        
    }
}
