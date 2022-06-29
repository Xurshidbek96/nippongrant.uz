<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::table('results')->orderBy('ball', 'desc')->paginate(10);

        return view('admin.results.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.results.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'task1' => 'required',
            'task2' => 'required',
            'task3' => 'required',
            // 'img' => 'required',
        ]);
        
        if ($request->img) {
            $obg = new Result();
            $destinationPath = 'images';
            $imageName = 'img_' . rand(1000000, 9999999) . rand(1000000, 9999999) . '.' . $request->img-> getClientOriginalExtension();
            $request->img->move($destinationPath, $imageName);
            $obg->img = '/' . $destinationPath . '/' . $imageName;

            $image = $obg->img;
        }
        else
            $image = '';
       
       

        $bal = ($request->task1 + $request->task2 + $request->task3)/3 ;

         DB::table('results')
             ->insert(array(
                'task1' => $request->task1,
                'task2' => $request->task2,
                'task3' => $request->task3,
                'ball' => $bal,
                'img' => $image,
         ));

          return redirect()->route('results.index')
                                    ->with('success','Yangi natija qo`shildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = DB::table('results')->where('id', $id)->get();

        return view('admin.results.edit', compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        if($request->img) {
            $obg = new Result();
            $destinationPath = 'images';
            $imageName = 'img_' . rand(1000000, 9999999) . rand(1000000, 9999999) . '.' . $request->img->getClientOriginalExtension();
            $request->img->move($destinationPath, $imageName);
            $obg->img = '/' . $destinationPath . '/' . $imageName;

            DB::table('results')->where('id', $id)->update(['img'=>$obg->img]);
        }

        $bal = ($request->task1 + $request->task2 + $request->task3)/3 ;

        $arrayName = array(
            'task1' => $request->task1,
            'task2' => $request->task2,
            'task3' => $request->task3,
            'ball' => $bal,
        );

        DB::table('results')->where('id', $id)->update($arrayName);
    

        return redirect()->route('results.index')
                            ->with('success','Yangilanish bajarildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = DB::table('results')->where('id', $id)->delete();

        return redirect()->route('results.index')
                        ->with('success','Ma`lumot o`chirildi');
    }
}
