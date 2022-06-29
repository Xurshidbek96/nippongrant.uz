<?php

namespace App\Http\Controllers;

use App\Models\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $number = DB::table('numbers')->get();
        $c = DB::table('numbers')->count();

        return view('admin.numbers.index', compact('number', 'c'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('numbers')
             ->insert(array(
            'n1' => $request->n1,
            'name1' => $request->name1,
            'n2' => $request->n2,
            'name2' => $request->name2,
            'n3' => $request->n3,
            'name3' => $request->name3,
            'n4' => $request->n4,
            'name4' => $request->name4,
        ));

          return redirect()->route('numbers.index')
                                    ->with('success','Yangilik bajarildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function show(Number $number)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function edit(Number $number)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $arrayName = array(
            'n1' => $request->n1,
            'name1' => $request->name1,
            'n2' => $request->n2,
            'name2' => $request->name2,
            'n3' => $request->n3,
            'name3' => $request->name3,
            'n4' => $request->n4,
            'name4' => $request->name4,            
        );

         $number = DB::table('numbers')->where('id', $id)->update($arrayName);
    

            return redirect()->route('numbers.index')
                            ->with('success','Yangilanish bajarildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function destroy(Number $number)
    {
        //
    }
}
