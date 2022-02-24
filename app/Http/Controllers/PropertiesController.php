<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Property;
use Twilio\Rest\Client;

require_once '/Users/mil/DEV/Laravel-Inertia/vue-app/vendor/autoload.php';

class PropertiesController extends Controller
{
    public function index()
    {

        $user = auth()->user()->id;
        $properties = Property::where('user_id', '=', $user)
            ->select('user_id', 'street_address', 'city', 'province', 'postal_code', 'id')
            ->get();

        return Inertia::render('Properties')->with('properties', $properties);
    }

    public function create(Request $request)
    {
        if (auth()->user()->id === $request->user_id) {

            $newProperty = $request->validate([
                'user_id' => ['required'],
                'street_address' => 'required',
                'city' => 'required',
                'province' => 'required',
                'postal_code' => 'required',
            ]);
        }

        Property::create($newProperty);

        $phone = auth()->user()->phone;

        // $this->sendMessage("New Property Added!", $phone);
    }

    public function update(Request $request)
    {
        $property = Property::findOrFail($request->id);
        $property->update($request->all());

        $phone = auth()->user()->phone;

        //$this->sendMessage("Property Updated!", $phone);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        Property::where('id', $id)->delete();

        $phone = auth()->user()->phone;

        //$this->sendMessage("Property Deleted!",$phone);
    }

    private function sendMessage($message, $recipients)
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_msg_id = getenv("TWILIO_MSG_ID");
        $client = new Client($account_sid, $auth_token);
        $message = $client->messages->create($recipients, ['messagingServiceSid' => $twilio_msg_id, 'body' => $message]);
        print($message->sid);
    }
}
