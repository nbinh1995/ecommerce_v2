<?php

namespace App\Http\ViewComposers;

use App\Models\Size;
use Illuminate\View\View;

class SizeComposer
{
    protected $sizes;

    public function __construct()
    {
        $this->sizes = Size::all();
    }

    public function compose(View $view)
    {
        $view->with('sizes', $this->sizes);
    }
}
