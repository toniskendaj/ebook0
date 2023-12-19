<?php

namespace App\View\Components;

use App\Models\item;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class showitems extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $items = DB::table('items')->join('itemchars', 'items.ISBN', '=', 'itemchars.ISBN')
        ->join('itemquantities', 'items.ISBN', '=', 'itemquantities.ISBN')->select('items.*','itemchars.*','itemquantities.*')
        ->paginate(12);
        return view('components.showitems',compact('items'));
    }
}
