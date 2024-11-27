<?php
namespace App\Services;

class PayWayService {
    public function getApiURL() {
        return config('mypayway.my_api_url');
    }

    public function getHash($str) {
        $key = config('mypayway.my_api_key');
        return base64_encode(hash_hmac('sha512', $str, $key, true));
    }
}