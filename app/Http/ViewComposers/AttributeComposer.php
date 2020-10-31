<?php

namespace App\Http\ViewComposers;

use App\Models\Attribute;
use Illuminate\View\View;

class AttributeComposer
{
    protected $attributes;

    public function __construct()
    {
        $this->attributes = Attribute::all();
    }

    public function compose(View $view)
    {
        $view->with('attributes', $this->attributes);
    }
}
