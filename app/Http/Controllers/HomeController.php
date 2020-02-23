<?php

namespace App\Http\Controllers;

use App\Record;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function save(Request $request)
    {
        $name = $request->input('name');
        $semester = $request->input('semester');
        $gpa = $request->input('gpa');

        $record = new Record();

        $record->name = $name;
        $record->semester = $semester;
        $record->gpa = $gpa;

        if ($record->save()){
            return [
                'status' => 200,
                'message' => 'Record has been saved successfully'
            ];
        } else {
            return [
                'status' => 500,
                'message' => 'Record has not been saved!'
            ];
        }
    }
}
