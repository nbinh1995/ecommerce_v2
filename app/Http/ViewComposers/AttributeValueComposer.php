<?php

namespace App\Http\ViewComposers;

use App\Models\AttributeValue;
use Illuminate\View\View;

class AttributeValueComposer
{
    protected $attribute_values;

    public function __construct()
    {
        $this->attribute_values =
            AttributeValue::select('attribute_values.id', 'attributes.attr_name', 'attribute_values.attr_value')
            ->join('attributes', 'attribute_values.attribute_id', '=', 'attributes.id', 'left')
            ->get();
    }

    public function compose(View $view)
    {
        $view->with('attr_values', $this->attribute_values);
    }
}
