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

        $data['item'] = DB::table('ip_list')->select('item')->distinct()->get();
        $data['currency'] = DB::table('ip_list')->select('currency')->distinct()->get();
        $data['system_type'] = DB::table('ip_list')->select('system_type')->distinct()->get();

        $categroy = $request->categroy;
        $item = $request->item;
        $currency = $request->currency;
        $system_type = $request->system_type;

        if(!is_null($categroy)){
            if($request->categroy == 'web服务器'){
                $categroy = 1;
            }else{
                $categroy = 0;
            }
        }


        $data['ip'] = IpList
            ::when(!is_null($categroy), function ($query) use ($categroy) {
                $query->where('categroy', $categroy);
            })
            ->when($item, function ($query) use ($item) {
                $query->where('item', $item);
            })
            ->when($currency, function ($query) use ($currency) {
                $query->where('currency', $currency);
            })
            -> when($system_type, function ($query) use ($system_type) {
                $query->where('system_type', $system_type);
            })
        ->get();


        return view('home',$data);
    }



}

