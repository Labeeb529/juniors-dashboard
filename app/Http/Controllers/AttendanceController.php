<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Services\CmsAttendanceService;


class AttendanceController extends Controller
{

    public function attendance(Request $request)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $cms = new CmsAttendanceService;
            $data = $cms->fetchAttendance($request);


            return view('attendance', ['attendance' => $data]);
        } else {
            return view('attendance-login');
        }


    }

}
