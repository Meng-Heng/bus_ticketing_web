<?php
namespace App\Services;

class PayWayService{
    public function getApiURL() {
        return config('payway.api_url');
    }

    public function getHash($str) {
        $key = config('payway.api_key');
        return base64_encode(hash_hmac('sha512', $str, $key, true));
    }
}