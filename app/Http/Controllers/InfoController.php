<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = DB::table('infos')->orderBy('id', 'desc')->paginate(10);

        return view('admin.infos.index', compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.infos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('infos')
             ->insert(array(
                 'question' => $request->question,
                 'answer' => $request->answer,
         ));

          return redirect()->route('infos.index')
                                    ->with('success','Yangi Savol-javob qo`shildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function show(Info $info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = DB::table('infos')->where('id', $id)->get();

        return view('admin.infos.edit', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $arrayName = array(
            'question' => $request->question,
            'answer' => $request->answer,
        );

        DB::table('infos')->where('id', $id)->update($arrayName);
    

        return redirect()->route('infos.index')
                            ->with('success','Yangilanish bajarildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('infos')->where('id', $id)->delete();

        return redirect()->route('infos.index')
                        ->with('success','Ma`lumot o`chirildi');
    }
}
