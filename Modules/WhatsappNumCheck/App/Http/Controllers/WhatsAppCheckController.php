<?php

namespace Modules\WhatsappNumCheck\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\WhatsappNumCheck\App\Models\Csv;


class WhatsAppCheckController extends Controller
{
    public function showForm()
    {
        $csvPhoneNumbers = Csv::pluck('phone')->toArray();
        return view('whatsappnumcheck::csv.whatsapp_check', compact('csvPhoneNumbers'));
    }
    
    public function checkWhatsApp(Request $request)
{
    $phoneNumbers = Csv::pluck('phone')->toArray();

    // You can also validate the request if needed
    // $request->validate([
    //     'phone_numbers' => 'required|array',
    // ]);

    $result = $this->validateWhatsAppNumbers($phoneNumbers);

    return view('whatsappnumcheck::csv.whatsapp_check', compact('phoneNumbers', 'result'));
}

    /**
     * Validate WhatsApp numbers using the provided API.
     */
    private function validateWhatsAppNumbers(array $numbers): array
{
    $result = [];

    foreach ($numbers as $phoneNumber) {
        $url = "https://api.whatsapp.com/send/?phone=" . $phoneNumber . "&text&type=phone_number&app_absent=0";

        $headers = [
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36",
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_HTTPHEADER => $headers,
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $result[$phoneNumber] = "cURL Error: " . $err;
        } else {
            // Check if the response contains the phrase indicating an invalid phone number
            if (strpos($response, 'phone number shared via url is invalid') !== false) {
                $result[$phoneNumber] = "Not in WhatsApp";
            } else {
                $result[$phoneNumber] = "In WhatsApp";
            }
        }
    }

    return $result;
}

}
