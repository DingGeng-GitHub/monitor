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
    public function index()
    {
        // 所有服务器信息
        $data['ip'] = IpList::get();

        $data['item'] = DB::table('ip_list')->select('item')->distinct()->get();

        return view('home',$data);
    }
}

