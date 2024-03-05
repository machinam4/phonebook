<?php

namespace App\Http\Controllers;

use App\DataTables\ContactsDataTable;
use App\Models\Contact;
use App\Models\Paybill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Psy\Readline\Hoa\Console;

class ContactsController extends Controller
{
    public function index(ContactsDataTable $dataTable)
    {
        // return $dataTable->render('contacts.index');
        $contacts = Contact::all()->paginate(100);
        return view('contacts.contactList', ['contacts' => $contacts]);
    }



    public function handleCallback(Request $request)
    {
        // Extract DebitPartyName from the callback data
        Log::info("requets back");
        // Log::info($request);
        $debitPartyName = $request->json('Result.ResultParameters.ResultParameter.0.Value');


        $creditPartyName = $request->json('Result.ResultParameters.ResultParameter.1.Value');

        list($BusinessShortCode, $BusinessName) = explode(' - ', $creditPartyName);
        $paybill = Paybill::where("shortcode", $BusinessShortCode)->first();


        Log::info("names");
        // Split DebitPartyName into phone number and name
        list($phoneNumber, $fullName) = explode(' - ', $debitPartyName);

        // Split names into three names
        // Split full name into first, middle, and last names
        $names = explode(' ', $fullName);
        $firstname = $names[0];
        $middlename = (count($names) > 2) ? $names[1] : null;
        $lastname = end($names);
        // list($firstname, $middlename, $lastname) = explode('   ', $names);
        Log::info([$firstname, $middlename, $lastname]);

        Log::info([
            'phone_number' => $phoneNumber,
            'names' => $fullName,
            'first_name' => $firstname,
            'middle_name' => $middlename,
            'last_name' => $lastname,
            'paybill_id' => $paybill->id,
            'shortcode' => $BusinessShortCode
        ]);

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

        return response()->json(['message' => 'Data stored successfully']);
    }
}
