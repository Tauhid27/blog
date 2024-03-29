<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitorModel;
use App\Models\ServicesModel;
use App\Models\CourseModel;
use App\Models\projectsModel;
use App\Models\ContactModel;
use App\Models\ReviewModel;

class HomeControll extends Controller
{
    function HomeIndex()
    {

        $UserIP = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Dhaka");
        $timeDate = date("Y-m-d h:i:sa");
        VisitorModel::insert(['ip_address' => $UserIP, 'visit_time' => $timeDate]);

        $ServicesData = json_decode(ServicesModel::limit(4)->get());
        $courseData = json_decode(CourseModel::orderBy('id', 'desc')->limit(6)->get());
        $ProjectData = json_decode(projectsModel::orderBy('id','desc')->limit(10)->get());
        $ReviewData = json_decode(ReviewModel::get());
        return view(
            'home',
            [
                'ServicesData' => $ServicesData,
                'courseData' => $courseData,
                'ProjectData' =>$ProjectData,
                'ReviewData' =>$ReviewData
            ]
        );
    }
    
    function ContactSend(Request $request){
        $contact_name=$request->input('contact_name');
        $contact_mobile= $request->input('contact_mobile');
        $contact_email=$request->input('contact_email');
        $contact_msg=$request->input('contact_msg');
        $result= ContactModel::insert([
            'contact_name'=> $contact_name,
            'contact_mobile'=> $contact_mobile,
            'contact_email'=>$contact_email,
            'contact_msg'=>$contact_msg
        ]);

       if($result==true){

            return 1;
       }
       else{

           return 0;
       }

    }

}
