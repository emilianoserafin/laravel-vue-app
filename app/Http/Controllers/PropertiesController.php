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

    public function create()
    {
    }

    public function store()
    {
    }
}
