<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use App\Models\User;
use Validator,Response,DB;

class HomeController extends Controller
{
    
    public function login(Request $request){
        
        $data['title'] = 'SD';
        
        $data['user_info'] = DB::table('users')
                 ->select('name', DB::raw('count(name) as total'))
                 ->groupBy('name')
                 ->get();




        // $data['data'] = DB::raw("SELECT COUNT(name),name FROM 'users' GROUP BY name HAVING COUNT('name') > 0");

        // echo "<pre>"; print_r($user_info);die;

        return view('dashboard',$data);

    }

/*    public function setTypea(Request $request){

        Session::put('usertype', 'a');
        
        $data['title'] = 'Api';

        return view('api',$data);
    }

    public function setTypeb(Request $request){

        Session::put('usertype', 'b');
        
        $data['title'] = 'Api';

        return view('api',$data);
    }*/


 /*   public function callApi(Request $request){

        $client = new Client();
        
        $url = url('api/count');

        $res = $client->request('get', $url);
        print_r($res);die('--------');
    }*/


    public function register(Request $request){

        $res['status']  = false;
        $res['msg']     = 'Something went wrong';
        $res['error']   = [];
        $res['code']    = 400;

        $validator = Validator::make($request->all(), [

            'name' => 'required|string|max:255',

        ]);
        
        if($validator->fails()){

            
            $res['msg']     = 'validation fails';
            $res['error'] = $validator->errors();

        } else {

            $name = $request->name;
            $ins =  User::insertGetId(['name'=> $name]);

            if (!empty($ins)) {
                
                $res['status'] = true;
                $res['code']    = 200;
                $res['msg']     = 'Thanks For Api Called.';

            }else{

                $res['msg']     = 'Something went to wrong.';
            }


        }
        return Response::json($res);
    }
}
