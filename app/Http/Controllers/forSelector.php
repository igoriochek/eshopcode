<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Promotion;

trait forSelector
{
    protected $visible_list = ['invisible', 'visible'];

    public function categoriesForSelector()
    {
        $c = array();
        Category::all()->map(function ($item) use (&$c) {
            $c[$item->id] = $item->name;
        });
        return $c;
    }

    public function discountForSelector()
    {
        $c = array();
        Discount::all()->map(function ($item) use (&$c) {
            $c[$item->id] = $item->name;
        });
        return $c;
    }

    public function promotionForSelector()
    {
        $c = array();
        Promotion::all()->map(function ($item) use (&$c) {
            $c[$item->id] = $item->name;
        });
        return $c;
    }


}
