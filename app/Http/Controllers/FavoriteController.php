<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Shop;
use App\Model\Like;
use App\User;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Shop $shop, Request $request)
    {
        $shop = Shop::find($request->id);
        $like = Like::create([
            'user_id' => auth()->user()->id,
            'shop_id' => $shop->id,
        ]);

        // dd($shop->id);

        return redirect('/shops/'.$shop->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like, Request $request)
    {
        // dd($like);
        $shop = Shop::find($request->id);
        $like = Like::where('user_id', auth()->user()->id)->where('shop_id', $shop->id)->first();
        $like->delete( );
        return redirect('/shops/'.$shop->id);
    }

    public function direct()
    {
        if(!auth()->check()) {
            return redirect('/login');
        }

        return redirect('/shops');
    }
}
