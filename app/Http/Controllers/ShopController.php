<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Shop;
use App\Model\Like;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ShopRequest;
use App\Http\Requests\StoreRequest;


class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->check()) {
            return redirect('/login');
        }

        $shops = Shop::all();
        return view('shops.index', ['shops' => $shops]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->check()) {
            return redirect('/login');
        }

        return view('shops.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        if(!auth()->check()) {
            return redirect('/login');
        }

        if ($request->file('image_url')->isValid()) {
            $shop = new Shop;
            
            $shop->name = $request->name;
            $shop->location = $request->location;
            $shop->price = $request->price;
            $shop->user_id = auth()->user()->id;
            $shop->body = $request->body;
            $filename = $request->file('image_url')->store('public/image');
            $shop->image_url = basename($filename);
        }
        $shop->save();
        return redirect('/form-complete');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!auth()->check()) {
            return redirect('/login');
        }

        $post = Shop::findOrFail($id); // findOrFail 見つからなかった時の例外処理

        $like = $post->likes()->where('user_id', Auth::user()->id)->first();
        
        $shop = Shop::find($id);
        $likeCount = Like::where('shop_id', $id)->get()->count();
        // dd($likeCount);
        return view('shops.show', ['shop' => $shop, 'like' => $like, 'count' => $likeCount]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!auth()->check()) {
            return redirect('/login');
        }

        $shop = Shop::find($id);

        // dd(auth()->user()->id);

        if($shop->user_id == auth()->user()->id) {
            return view('shops.edit', ['shop' => $shop]);
        }
          else{
            return redirect('/shops');
          }


        return view('shops.edit', ['shop' => $shop]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, $id)
    {
        if(!auth()->check()) {
            return redirect('/login');
        }


        if ($request->file('image_url')->isValid()) {
            $shop = new Shop;
            
            $shop->name = $request->name;
            $shop->id = $request->id;
            $shop->location = $request->location;
            $shop->price = $request->price;
            $shop->user_id = auth()->user()->id;
            $shop->body = $request->body;
            $filename = $request->file('image_url')->store('public/image');
            $shop->image_url = basename($filename);
            $find = Shop::find($shop->id);
            $find->fill([
                'name' => $shop->name,
                'location' => $shop->location,
                'image_url' => $shop->image_url,
                'price' => $shop->price,
                'body' => $shop->body,
            ]);
            $find->save();
        }
        return redirect('/update-complete');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->check()) {
            return redirect('/login');
        }


        Shop::destroy($id);
        return redirect('/delete-complete');
    }

    public function direct()
    {
        if(!auth()->check()) {
            return redirect('/login');
        }

        return redirect('/shops');
    }

    // マイページ
    public function mypage($id)
    {
        if(!auth()->check()) {
            return redirect('/login');
        }

        $myshops = Shop::where('user_id', $id)->get();

        $name = User::find($id)->name;

        $likes = Like::where('user_id', $id)->get();

        $likeshops= [];
       
        foreach ($likes as $like) {
            $shop = Shop::find($like->shop_id);
            $likeshops[] = $shop;
        };


        return view('shops.mypage', ['myshops' => $myshops, 'name' => $name, 'likeshops' => $likeshops]);

    }

    // 完了ページ
    public function FormComplete()
    {
        if(!auth()->check()) {
            return redirect('/login');
        }

        return view('shops.form-complete');
    }

    public function UpdateComplete()
    {
        if(!auth()->check()) {
            return redirect('/login');
        }

        return view('shops.update-complete');
    }

    public function DeleteComplete()
    {
        if(!auth()->check()) {
            return redirect('/login');
        }

        return view('shops.delete-complete');
    }

}
