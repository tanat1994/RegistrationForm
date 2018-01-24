<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;

class Excelcontroller extends Controller
{
    public function getFormat(){
        // Excel::create('Export Data', function($excel){
        //     $excel->sheet('excelformat', function($sheet){
        //         $sheet->fromArray(array(
        //            array('data1', 'data2'),
        //            array('data3', 'data4')
        //         ));
        //     });
        // })->download('xlsx');

        $data = array('cardUID','memberId','titleId','positionId','firstname','lastname','facultyId','majorId','degreeId','expire_date','note');
        Excel::create('importformat', function($excel) use($data){
            $excel->sheet('importformat', function($sheet) use($data){
                $sheet->fromArray($data);
            });
        })->export('xls');

    }
}
