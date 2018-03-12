<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    public function getHome()
    {
    	$imgs = Image::where('imageable_id',0)->get();
        $cates = Category::where('parent_id',0)->get();
        $sub_cates = Category::where('parent_id','!=',0)->get();
        $p_products = Product::join('promotion_details','products.id','=','promotion_details.product_id')
        ->orderBy('promotion_details.percent', 'desc')->take(4)->get();
        $l_products = Product::orderBy('id', 'desc')->take(4)->get();
        $m_products = Product::join('order_details','products.id','=','order_details.product_id')
        ->orderBy('order_details.amount', 'desc')->take(4)->get();
        $promotion = Product::with('promotionDetail')->get();

        $avgVote = 0;
    	
        return view('user.layouts.index',['imgs' => $imgs,
                                          'cates' => $cates,
                                          'sub_cates' => $sub_cates,
                                          'l_products' => $l_products,
                                          'p_products' => $p_products,
                                          'm_products' => $m_products,
                                          'promotion' => $promotion,
                                          'avgVote' => $avgVote,
                                         ]);
    }

    public function getCate($type)
    {
        $cates = Category::where('parent_id',0)->get();
        $sub_cates = Category::where('parent_id','!=',0)->get();
        $product_in_cates = Product::where('category_id',$type)->get();
        return view('user.layouts.products',compact('product_in_cates','cates','sub_cates'));
    }

    public function getProd($id)
    {
        $cates = Category::where('parent_id',0)->get();
        $sub_cates = Category::where('parent_id','!=',0)->get();
        $prod_details = Product::where('id',$id)->get();

        $promotion = 0;
        if (Product::find($id)->promotionDetail) {
            $promotion = Product::find($id)->promotionDetail;
        }

        $reviews = Review::where('product_id', $id)->with('user')->orderBy('created_at')->get();
        $countVote = count($reviews);
        $totalVote = 0;
        $avgVote = 0;
        if (count($reviews) > 0) {
            $votes = $reviews->pluck('rate');
            foreach ($votes as $vote) {
                $totalVote += $vote;
            }
            $avgVote = round($totalVote / count($votes));
        }
        return view('user.layouts.product-details',compact('prod_details','cates','sub_cates','promotion','avgVote','countVote'));        
    }

}
