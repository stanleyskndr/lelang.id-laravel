<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Shoes;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $shoe = DB::table('shoes')->paginate(16);
        return view('  home')->with('shoes', $shoe);
    }

    public function search(Request $request)
    {
        $shoe_name = $request->search_input;
        $shoes = DB::table('shoes')->where('shoe_name', 'like', '%'.$shoe_name.'%')->paginate(16);
        return view('home')->with('shoes', $shoes);
    }
}
