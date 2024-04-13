<?php

namespace App\Http\Controllers;

use App\Models\JsonData;
use Illuminate\Http\Request;

class JsonDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = JsonData::orderby('meta_data->name')->get();
        $data = JsonData::find(1);

        return $data->meta_data['address']['city'];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $data = JsonData::create([
        //     'meta_data' => [
        //         'name' => 'Talha Rahman',
        //         'age' => 10,
        //         'email' => 'talha@gmail.com',
        //         'address' => [
        //             'city' => 'comilla',
        //             'village' => 'south sortha',
        //             'division' => 'chittagong'
        //         ]
        //
        //     ]
        // ]);

        $data = JsonData::create([
            'meta_data' => [
                'name' => 'Arif',
                'age' => 12,
                'email' => 'arif@gmail.com',
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
