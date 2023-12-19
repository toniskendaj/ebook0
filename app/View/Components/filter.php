<?php

namespace App\View\Components;

use App\Models\itemchar;
use Illuminate\View\Component;

class filter extends Component
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
        $year=itemchar::select('year')->distinct()->get();
        $author=itemchar::select('author')->distinct()->get();
        $language=itemchar::select('language')->distinct()->get();
        $type=itemchar::select('type')->distinct()->get();
        return view('components.filter',compact('year','author','language','type'));
    }
}
