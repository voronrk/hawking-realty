<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Condition;

class ConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cache::store('file')->get('conditions', function () {
            $data = Condition::all();
            Cache::store('file')->put('conditions', $data);
            return $data;
        });
    }

    /**
     * Undocumented function
     *
     * @param Condition $wallmaterial
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return Cache::store('file')->get('conditions', function () {
            $data = Condition::all();
            Cache::store('file')->put('conditions', $data);
            return $data;
        })->firstWhere('id', $request->id);
        // return ['value' => $condition->value];
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
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $value = $request->value;
        $result = Condition::where('id', $id)
                        ->update(['value' => $value]);
        if ($result) Cache::forget('conditions');
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
