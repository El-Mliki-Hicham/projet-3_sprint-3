<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all();
        return view("Student.index",compact("student"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view("Student.create",compact("id"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $promotion_id= $request->promotion_id;
        $student = new Student();
        $student->First_name = $request->First_name;
        $student->Last_name = $request->Last_name;
        $student->Email = $request->Email;
        $student->promotion_id = $promotion_id;
        $student->save();
        return redirect('promotion/'.$promotion_id.'/edit');

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


        $student = Student::find($id);
        return view("Student.edit",compact("student"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $student =Student::find($id);
        $student->First_name = $request->First_name;
        $student->Last_name = $request->Last_name;
        $student->Email = $request->Email;

        $student->save();
        return redirect('promotion/'.$request->promotion_id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student =Student::find($id)->delete();
        return back();
    }
    // search : live search students
    public function searchStudent(Request $request,$id){



        if($request->ajax()){

            $input = $request->key;
            $output="";
            $Student= Student::select('*','students.id as student_id')->
            where([
                ["promotion_id", '=', $id],
                ['students.id', '=', $input],
            ])
        ->orWhere([
            ["promotion_id", '=', $id],
            ['First_name','like','%'.$input]
            ])
        ->orWhere([
            ["promotion_id", '=', $id],
            ['Last_name','like','%'.$input]
            ])
        ->orWhere([
            ["promotion_id", '=', $id],
            ['Email','like','%'.$input]
            ])
            ->join("promotions","students.promotion_id","=","promotions.id")->get();

        if($Student)
        {

            foreach ($Student as $student) {

        $output.='<tr>
        <td>'.$student->student_id.'</td>
        <td>'.$student->First_name.'</td>
        <td>'.$student->Last_name.'</td>
        <td>'.$student->Email.'</td>
                <td class="td-btn" >
                    <a href="'.route('student.edit',$student->student_id).'" class="" style="color: green" title="Edit"><i class="fa-regular fa-pen-to-square"></i></a>

                    <form action="'.route('student.destroy',$student->student_id).'" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="EQ7pLZVXDJBbNdK8oUPrNYA5wRaIu467Y2c0c4Yn">
                        <button class="delete" style="all: unset;cursor: pointer;color:red" title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></button>

                    </form>

                </td>

        </tr>';
        }
        return Response($output);
           }
           }
    }
}
