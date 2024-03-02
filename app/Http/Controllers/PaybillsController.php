<?php

namespace App\Http\Controllers;

use App\DataTables\PaybillsDataTable;
use App\Models\Paybill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaybillsController extends Controller
{
    public function index(PaybillsDataTable $dataTable)
    {
        // return $dataTable->render('paybills.index');
        $paybills = Paybill::all();
        return view('paybills.paybillList', ['paybills' => $paybills]);
    }
    public function generateAccessToken($consumer_key, $consumer_secret)
    {
        // *** Authorization Request in PHP ***|
        $mpesaUrl = env('MPESA_ENV') == 0 ? 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials' : 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $ch = curl_init($mpesaUrl);
        curl_setopt_array(
            $ch,
            array(
                CURLOPT_HTTPHEADER => array('Content-Type:application/json; charset=utf8'),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => false,
                CURLOPT_USERPWD => $consumer_key . ':' . $consumer_secret
            )
        );
        $response = json_decode(curl_exec($ch));
        curl_close($ch);
        Log::info($response->access_token);
        return $response->access_token;
    }

    public function transQuery(Request $request)
    {
        $paybill = Paybill::where("shortcode", $request->BusinessShortCode)->first();

        // Log::info($paybill);



        if (!$paybill) {
            return response()->json(['message' => 'Paybill not in db']);
        }
        // Log::alert($paybill->key);
        // Send the result data to the specified ResultURL
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->generateAccessToken($paybill->key, $paybill->secret),
            'Content-Type' => 'application/json',
        ])
            ->post('https://api.safaricom.co.ke/mpesa/transactionstatus/v1/query', [
                "Initiator" => $paybill->initiator,
                "SecurityCredential" => $paybill->SecurityCredential,
                "CommandID" => "TransactionStatusQuery",
                "TransactionID" => $request->TransID,
                "PartyA" => $request->BusinessShortCode,
                "IdentifierType" => "4",
                "ResultURL" => "https://0193-102-219-209-70.ngrok-free.app/api/v3/handleCallback",
                "QueueTimeOutURL" => "https://0193-102-219-209-70.ngrok-free.app/api/v3/handleCallback",
                "Remarks" => "Verify user transaction",
                "Occasion" => "verification",
            ]);

        // Access the response body as an array
        $responseArray = $response->json();



        return response()->json(['message' => 'Query Suucessfull', 'response' => $responseArray]);
    }
}
