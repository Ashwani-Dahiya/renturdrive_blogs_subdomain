<?php

namespace App\Http\Controllers;

use App\Models\BrandFaqModel;
use App\Models\BrandModel;
use Illuminate\Http\Request;

class BrandFaqController extends Controller
{
    public function brand_faq_page($brand)
    {
        $brand = BrandModel::where('name', $brand)->first();

        if (!$brand) {
            abort(404);
        }

        $faqs = BrandFaqModel::with('brand')->where('brand_id', $brand->id)->get();

        return view('brand_faq', compact('brand', 'faqs'));
    }
}
