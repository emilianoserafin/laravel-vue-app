<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Property;

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
    }

    public function update(Request $request)
    {
        dd($request);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        Property::where('id', $id)->delete();
    }
}
