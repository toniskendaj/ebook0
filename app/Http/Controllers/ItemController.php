<?php

namespace App\Http\Controllers;

use App\Models\item;
use App\Models\itemchar;
use App\Models\itemquantity;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    
    public function index(){
        
        $items = DB::table('items')->join('itemchars', 'items.ISBN', '=', 'itemchars.ISBN')
        ->join('itemquantities', 'items.ISBN', '=', 'itemquantities.ISBN')->select('items.*','itemchars.*','itemquantities.*')
        ->paginate(12);
        return view('welcome',compact('items'));
    }

    public function show(item $item)
    {   
        $itemsearched = DB::table('items')->join('itemchars', 'items.ISBN', '=', 'itemchars.ISBN')
        ->join('itemquantities', 'items.ISBN', '=', 'itemquantities.ISBN')->select('items.*','itemchars.*','itemquantities.*')
        ->where('items.ISBN','=',$item->ISBN)->get();
            
        return view ('show',["data"=>$item])->with('itemsearched',$itemsearched);
    }

    public function create(){
        return view('create');
    }

    public function store(){
        $infoitem=request()->validate([
            'ISBN'=>'required',
            'id'=>'required',
            'title'=>'required',
            'image'=>'required',
            'description'=>'required',
            'price'=>'required',
            'pages'=>'required',
            'link'=>'required',
        ]);
        $infoquantity=request()->validate([
            'ISBN'=>'required',
            'availability'=>'required',
            'returnable'=>'required',
            'quantity'=>'required'
        ]);
        $infochar=request()->validate([
            'ISBN'=>'required',
            'language'=>'required',
            'year'=>'required',
            'author'=>'required',
            'type'=>'required'
        ]);

        item::create($infoitem);
        itemquantity::create($infoquantity);
        itemchar::create($infochar);
        return redirect('/');
    }
    public function destroy(item $item)
    {
        $item->delete();
        return redirect('/');
    }

    public function filtering(Request $request){
        
        if(isset($_GET['ath']))
        $author_pm=$_GET['ath'];
        else
        $author_pm=itemchar::select('author')->distinct()->get();
        if(isset($_GET['lng']))
        $language_pm=$_GET['lng'];
        else
        $language_pm=itemchar::select('language')->distinct()->get();
        if(isset($_GET['yr']))
        $year_pm=$_GET['yr'];
        else
        $year_pm=itemchar::select('year')->distinct()->get();
        if(isset($_GET['tp']))
        $type_pm=$_GET['tp'];
        else
        $type_pm=itemchar::select('type')->distinct()->get();

        if($request->get('ath') || $request->get('tp') || $request->get('lng') || $request->get('yr')){
            $items = item::join('itemchars', 'items.ISBN', '=', 'itemchars.ISBN')
            ->join('itemquantities', 'items.ISBN', '=', 'itemquantities.ISBN')
            ->select('items.*','itemchars.*','itemquantities.*')
            ->whereIn('itemchars.author',$author_pm)
            ->whereIn('itemchars.year',$year_pm)
            ->whereIn('itemchars.type',$type_pm)
            ->whereIn('itemchars.language',$language_pm)
            ->paginate(12)
            ->withQueryString();
        }
        else
        if(request('search'))
        $items = item::join('itemchars', 'items.ISBN', '=', 'itemchars.ISBN')
        ->join('itemquantities', 'items.ISBN', '=', 'itemquantities.ISBN')->select('items.*','itemchars.*','itemquantities.*')
        ->where('title', 'like', '%' . request('search') . '%')->paginate(12)->withQueryString();
        else 
        $items = DB::table('items')->join('itemchars', 'items.ISBN', '=', 'itemchars.ISBN')
        ->join('itemquantities', 'items.ISBN', '=', 'itemquantities.ISBN')->select('items.*','itemchars.*','itemquantities.*')
        ->paginate(12);
        
    return view('welcome',compact('items'));
    }
    public function addBooktoCart($id)
    {
        $book = item::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $book->title,
                "quantity" => 1,
                "price" => $book->price,
                "image" => $book->image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Book has been added to cart!');
    }
     
    public function bookCart()
    {
        return view('component.cart');
    }

    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Book added to cart.');
        }
    }
   
    public function deleteProduct(Request $request)
{
    $response = ['success' => false, 'message' => 'Book not found.'];
    if ($request->id) {
        $cart = session()->get('cart');

        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
            $response = ['success' => true, 'message' => 'Book successfully deleted.'];
        }
    }

    return response()->json($response);
}
}
