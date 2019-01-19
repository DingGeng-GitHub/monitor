<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\IpList;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $data['ip'] = IpList::get();
        $data['item'] = DB::table('ip_list')->select('item')->distinct()->get();
        $data['currency'] = DB::table('ip_list')->select('currency')->distinct()->get();
        $data['system_type'] = DB::table('ip_list')->select('system_type')->distinct()->get();

        if($request->categroy == 'web服务器'){
            $categroy = 1;
        }else{
            $categroy = 0;
        }
        $item = $request->item;
        $currency = $request->currency;
        $system_type = $request->system_type;

        $data['ip'] = IpList::where(['categroy'=>$categroy, 'item'=>$item, 'currency'=>$currency, 'system_type'=>$system_type])->get();

        //dd($data['ip']);


        return view('home',$data);
    }



}

