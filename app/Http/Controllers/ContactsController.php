<?php

namespace App\Http\Controllers;

use App\DataTables\ContactsDataTable;
use App\Models\Contact;
use App\Models\Paybill;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Psy\Readline\Hoa\Console;

class ContactsController extends Controller
{
    public function index()
    {
        $from_date = Carbon::today();
        $to_date = Carbon::now()->endOfDay();
        if (auth()->user()->role == 1) { //if Admin return all records
            $contacts = Contact::where('created_at', '>=', $from_date)->orderBy('id', 'desc')->get();
        } else {

            $contacts = auth()->user()->channel->contacts()->where('created_at', '>=', $from_date)->orderBy('id', 'desc')->get();
        }


        return view('contacts.contactList', ['contacts' => $contacts, "fromDate" => $from_date, "toDate" => $to_date]);
    }

    public function filter(Request $request)
    {

        $from_date = Carbon::parse($request->from_date);
        $to_date = Carbon::parse($request->to_date);
        if (auth()->user()->role == 1) { //if Admin return all records
            $contacts = Contact::where('created_at', '>=', $from_date)->where('created_at', '<=', $to_date)->orderBy('id', 'desc')->get();
        } else {
            $contacts = auth()->user()->channel->contacts()->where('created_at', '>=', $from_date)->where('created_at', '<=', $to_date)->orderBy('id', 'desc')->get();
        }
        return view('contacts.contactList', ['contacts' => $contacts,  "fromDate" => $from_date, "toDate" => $to_date]);
    }



    //api functions starts here
    public function handleCallback(Request $request)
    {
        // Extract DebitPartyName from the callback data
        // Log::info("requets back");
        // Log::error($request);

        if ($request->json('Result.ResultCode') != 0) {
            // Log::info($request);
            return 'failed';
        }
        $debitPartyName = $request->json('Result.ResultParameters.ResultParameter.0.Value');


        $creditPartyName = $request->json('Result.ResultParameters.ResultParameter.1.Value');

        $TransID = $request->json('Result.ResultParameters.ResultParameter.12.Value');
        // Log::info($creditPartyName);


        list($BusinessShortCode, $BusinessName) = explode(' - ', $creditPartyName);


        $paybill = Paybill::where("shortcode", $BusinessShortCode)->first();


        // Log::info("names");
        // Split DebitPartyName into phone number and name
        list($phoneNumber, $fullName) = explode(' - ', $debitPartyName);
        // Split names into three names
        // Split full name into first, middle, and last names
        $names = explode(' ', $fullName);
        $firstname = $names[0];
        $middlename = (count($names) > 2) ? $names[1] : null;
        $lastname = end($names);
        // list($firstname, $middlename, $lastname) = explode('   ', $names);
        // Log::info([$firstname, $middlename, $lastname]);


        // ========== update player in ridhishajamii ==============
        $playerdata([
            'MSISDN' => $phoneNumber,
            'FirstName' => $fullName,
            'TransID' => $TransID
        ]);

        $response = Http::post('https://ridhishajamii.com/api/player/update', $playerdata);
        // ========== end update player in ridhishajamii ==============

        try {
            // Store the data in the database
            Contact::create([
                'phone_number' => $phoneNumber,
                'names' => $fullName,
                'first_name' => $firstname,
                'middle_name' => $middlename,
                'last_name' => $lastname,
                'paybill_id' => $paybill->id,
                'shortcode' => $BusinessShortCode
            ]);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Contact exists']);
            // throw $th;
        }


        return response()->json(['message' => 'Data stored successfully']);
    }
}
