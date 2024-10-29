<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function index() {
        $qr = '';
        $appIconUrl = "https://bakong.nbc.gov.kh/images/logo.svg";
        $appName = "Bakong";
        $appDeepLinkCallback = "https://bakong.nbc.gov.kh/";

        // Prepare payload
        $payload = [
            'qr' => $qr,
            'sourceInfo' => [
                'appIconUrl' => $appIconUrl,
                'appName' => $appName,
                'appDeepLinkCallback' => $appDeepLinkCallback,
            ],
        ];

        // Make the HTTP POST request
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post('{{baseUrl}}/v1/generate_deeplink_by_qr', $payload);

        // Handle the response
        if ($response->successful()) {
            $data = $response->json();
            return response()->json([
                'success' => true,
                'data' => $data['data'],
                'message' => $data['responseMessage'],
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => $response->json('errorCode'),
                'message' => $response->json('responseMessage'),
            ], $response->status());
        }
    }
    public function QRGenerator() {
        // Run the Node.js script and capture its output
        $output = shell_exec('node ' . base_path('node_scripts/payment.js'));

        // Parse the output to extract QR and MD5 data
        preg_match('/qr: (.*)/', $output, $qrMatch);
        preg_match('/md5: (.*)/', $output, $md5Match);
        
        $qr = $qrMatch[1] ?? null;
        $md5 = $md5Match[1] ?? null;
        dd($md5);
        // Return or use the QR and MD5 as needed
        return response()->json([
            'qr' => $qr,
            'md5' => $md5,
        ]);
    }
    public function generateKhQR() {
        $user_id = Auth::user()->id;
        
        $userInfo = User::find($user_id);
        $current = Carbon::now()->format('l, F-d-Y');
        $data = [
            'departure_data' =>  session()->get('departure_data'),
            'departure_seat' =>  session()->get('departure_seat'),
            'return_data' =>  session()->get('return_data'),
            'return_seat' =>  session()->get('return_seat'),
            'users' => $userInfo,
            'current_time' => $current
        ];

        return view('web.frontend.page.payment.index', $data);
    }
}
