<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Shoes;
use Carbon\Carbon;

class ShoesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shoes/create_shoes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:60'],
            'description' => ['required', 'string', 'min:20'],
            'image' => ['required', 'image']
        ]);
        

        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $ext = $request->file('image')->getClientOriginalExtension();
        $storedFile = $fileName.'_'.time().'.'.$ext;
        $path = $request->file('image')->storeAs('public/images', $storedFile);
        $start =  Carbon::now();
        
        $end = Carbon::now();
        $end->addDays(1);
        $end->hour = 20;
        $end->minute = 0;
        $end->second = 0;

        $Shoe = new shoes;
        $Shoe->Shoe_name = $request->name;
        $Shoe->Shoe_description = $request->description;
        $Shoe->Shoe_image = '/storage/images/'.$storedFile;
        $Shoe->start = $start;
        $Shoe->end = $end;
        $Shoe->save();

        return redirect('/')->with('success', 'Shoes Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Shoe = Shoes::find($id);
        $end = Carbon::create($Shoe->end);
        $end->toObject();
        $start = Carbon::create($Shoe->start);
        $start->toObject();
        // $seconds = ((($end->day - $start->day)*86400) + (($end->hour - $start->hour)*3600) + (($end->minute - $start->minute)*60) + ($end->second - $start->second));
        // $daydif = floor($seconds / 86400);
        // $hourdif = floor(($seconds % 86400) / 3600);
        // $minutedif = floor((($seconds % 86400) % 3600) / 60);
        // $seconddif = floor(((($seconds % 86400) % 3600) % 60)); 
        // dd($minutedif);
        return view('shoes/shoes_show')->with('shoes', $Shoe)->with('start',$start)->with('end',$end);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Shoe = Shoes::find($id);
        return view('shoes/edit_shoes')->with('shoes', $Shoe);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        $Shoe = Shoes::find($id);
        if ($Shoe->shoe_bid >= $request->bid){
            return redirect("/shoeDetail/$id")->withErrors(['Bid must be higher than last bid!', 'Bid must be higher than last bid!']);
        }
        $Shoe->user_id = Auth::id();
        $Shoe->shoe_bid = $request->bid;       
        $Shoe->save();

        return redirect('/')->with('success', 'Bid success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Shoe = Shoes::find($id);
        $Shoe->delete();
        return redirect('/')->with('success', 'Shoes Removed Successfully');;
    }

    public function delete($id)
    {
        $Shoe = Shoes::find($id);
        return view('shoes/delete_shoes')->with('shoes', $Shoe);
    }

    public function indexbid(){
        $user_id = Auth::id();
        $Shoe = Shoes::where('user_id', $user_id)->get();
        return view('cart/view_cart')->with('shoes', $Shoe);
    }
}
