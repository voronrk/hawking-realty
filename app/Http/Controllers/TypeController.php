<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

use App\Models\Type;
use App\Events\BuildingPropertyAdded;

class TypeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Cache::store('memcached')->get('types', function () {
        return Cache::store('memcached')->tags(['permanent'])->get('types', function () {
            $data = Type::all();
            // Cache::store('memcached')->put('types', $data);
            Cache::store('memcached')->tags(['permanent'])->put('types', $data);
            return $data;
        });
    }

    /**
     * Undocumented function
     *
     * @param Type $type
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // return Cache::store('memcached')->get('types', function () {
            return Cache::store('memcached')->tags(['permanent'])->get('types', function () {
            $data = Type::all();
            // Cache::store('memcached')->put('types', $data);
            Cache::store('memcached')->tags(['permanent'])->put('types', $data);
            return $data;
        })->firstWhere('id', $request->id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $value = $request->value;
        $result = Type::create([
            'value' => $value,
        ]);
        BuildingPropertyAdded::dispatch($result);
        return ['result' => $result->id];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $value = $request->value;
        $result = Type::where('id', $id)
                        ->update(['value' => $value]);
        // if ($result) Cache::store('memcached')->forget('types');
        if ($result) Cache::store('memcached')->tags(['permanent'])->forget('types');
        return ['result' => $result];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
