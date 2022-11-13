<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Http\Request;

class SearchController
{
    // search : live search promotion
    public function search(Request $request){

        if($request->ajax()){
            $input = $request->key;
            $output="";
            $Promotion=Promotion::where('Name_promotion','like',$input."%")
            ->orWhere('id','like','%'.$input."%")
        ->get();
        if($Promotion)
        {
        foreach ($Promotion as $promotion) {
            $output.='<tr>

              <td>'.$promotion->id.'</td>
              <td><a href="'.route('promotion.edit',$promotion->id).'">'.$promotion->Name_promotion.'</a></td>
              <td class="td-btn" >

              <form action="'.route('promotion.destroy',$promotion->id).'" method="POST">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="mbwRek5RvSWri9jAlOBQGv7ev7YyyUaKpf07ioez">
              <button class="delete" style="all: unset;cursor: pointer;color:red" title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></button>

              </form>

              </td>
              </tr>';
            }

            return Response($output);
        }
    }
}


// search : live search students
    public function searchStudent(Request $request,$id){
        if($request->ajax()){

            $input = $request->key;
            $output="";
            $Student=Student::
            where(
                ['id', '=', $input],
                )
        ->orWhere([
            ["promotion_id", '=', $id],
            ['First_name','like','%'.$input."%"]
            ])
            ->orWhere([
                ["promotion_id", '=', $id],
                ['Last_name','like','%'.$input."%"]
                ])
                ->orWhere([
                    ["promotion_id", '=', $id],
                    ['Email','like','%'.$input."%"]
                    ])


        // ->join("promotions","students.promotion_id","=","promotion.id")
        ->get();
        if($Student)
        {

            foreach ($Student as $student) {
            $editURL = "../student/Edit/$student->id";
            $deleteURL = "../student/Delete/$student->id/$student->promotion_id";
        $output.='<tr>
        <td>'.$student->id.'</td>
        <td>'.$student->First_name.'</td>
        <td>'.$student->Last_name.'</td>
        <td>'.$student->Email.'</td>
                <td class="td-btn" >
                    <a href="'.route('student.edit',$student->id).'" class="" style="color: green" title="Edit"><i class="fa-regular fa-pen-to-square"></i></a>

                    <form action="'.route('student.destroy',$student->id).'" method="POST">
                        @method("DELETE")
                        @csrf
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