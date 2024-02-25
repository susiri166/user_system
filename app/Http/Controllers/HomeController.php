<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $data;
    public function __construct()
    {
        $this->middleware('auth');
        $this->data=new User();
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showdata()
    {


    }
    public function adminhome()
    {
        $response['users']=$this->data->all();
        return view('pages.admin.adminHome')->with($response);
    }

    public function superadminHome()
    {
        $response['users']=$this->data->all();
        return view('pages.superadmin.superadminHome')->with($response);
    }

    public function editData(Request $request){


        $userId=$request->id;
        $response['user']=$this->data->find($userId);
        return response()->json($response);

    }


    public function updateData(Request $request){
        $userId=$request->user_id;
        $response['user']=$this->data->find($userId);

        if($response['user']->status==0){
            $response['user']->update(['status' => 1]);

        }else{
            $response['user']->update(['status' => 0]);

        }
        return response()->json($response);


    }


}
