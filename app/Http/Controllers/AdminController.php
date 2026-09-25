<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function datatransfer(Request $req){
    $name = $req->username;
    $email = $req->useremail;
    $pass = $req->userpass;
    $add = $req->useradd;
    return view ('User.form');

    }
    //
}
