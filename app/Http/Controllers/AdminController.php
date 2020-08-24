<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        return view('admin.admin');

    }

    public function getUsers(){
        $draw = $_POST['draw'];
        $start = $_POST['start'];
        $length = $_POST['length'];
        $searchValue = $_POST['search'];

        $users = User::skip($start)->take($length)->get();
        $recordsTotal = User::count();


        error_log(serialize($searchValue));
        error_log(serialize($users));

        $returnObject = array(
            'draw' => $draw,
            'recordsFiltered' => $recordsTotal,
            'recordsTotal' => $recordsTotal,
            'data' => $users
        );

        return json_encode($returnObject);
    }

}
