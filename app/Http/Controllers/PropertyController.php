<?php

namespace App\Http\Controllers;

use App\Models\Property;

class PropertyController extends Controller
{
    public function index()
    {
        return view('properties.index');
    }

    public function show(Property $property)
    {
        $property->load(['images', 'city:id,name', 'country:id,name,code', 'category:id,name', 'documents']);
        $property->loadCount(['videos']);
        $data = [];

        return view('properties.show', compact('property', 'data'));
    }

    public function files(Property $property)
    {
        $property->load(['images', 'videos']);

        return view('properties.files', compact('property',));
    }
}
