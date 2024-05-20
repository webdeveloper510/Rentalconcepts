<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Session;

use DB;
use Illuminate\Http\Request;
use App\Models\SiteUsers;
use Carbon\Carbon;

class VisitorController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function visitorslog()
    {
        if(Session::has('loginid')){
            $user=SiteUsers::select('*')->where('signedin','1')->get()->toArray();
            return view('visitors',compact('user'));
        }
        else{
            return redirect('/admin');
        }
      
    }
}