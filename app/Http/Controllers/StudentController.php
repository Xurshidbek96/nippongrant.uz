<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = DB::table('students')->orderBy('id', 'desc')->paginate(10);

        return view('admin.students.index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.students.create');
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
            'name' => 'required',
            'edu' => 'required',
            'img' => 'required',
        ]);
        
        $obg = new Student();
        $destinationPath = 'images';
        $imageName = 'img_' . rand(1000000, 9999999) . rand(1000000, 9999999) . '.' . $request->img-> getClientOriginalExtension();
        $request->img->move($destinationPath, $imageName);
        $obg->img = '/' . $destinationPath . '/' . $imageName;
       

         DB::table('students')
             ->insert(array(
                'name' => $request->name,
                'edu' => $request->edu,
                'img' => $obg->img,
         ));

          return redirect()->route('students.index')
                                    ->with('success','Yangi talaba qo`shildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = DB::table('students')->where('id', $id)->get();

        return view('admin.students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        if($request->img) {
            $obg = new Student();
            $destinationPath = 'images';
            $imageName = 'img_' . rand(1000000, 9999999) . rand(1000000, 9999999) . '.' . $request->img->   getClientOriginalExtension();
            $request->img->move($destinationPath, $imageName);
            $obg->img = '/' . $destinationPath . '/' . $imageName;

            DB::table('students')->where('id', $id)->update(['img'=>$obg->img]);
        }

        $arrayName = array(
            'name' => $request->name,
            'edu' => $request->edu,
        );

        DB::table('students')->where('id', $id)->update($arrayName);
    

        return redirect()->route('students.index')
                            ->with('success','Yangilanish bajarildi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = DB::table('students')->where('id', $id)->delete();

        return redirect()->route('students.index')
                        ->with('success','Ma`lumot o`chirildi');
    }
}
