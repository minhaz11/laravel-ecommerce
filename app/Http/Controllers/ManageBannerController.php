<?php

namespace App\Http\Controllers;

use App\Product;
use App\SlideShow;
use App\FeaturedProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageBannerController extends Controller
{
    public function manageSlider()
    {
        $products = Product::where('publication_status', 1)->get();
        return view('adminDashboard.Banner.manageSlider',['products'=>$products]);
    }

    public function submittedSlider(Request $request)
    {


        if(SlideShow::all()){

            SlideShow::truncate();
        }

        if(count($request->get('ids'))>5){
            return back()->with('message','You can not select more than five');
        } else{

        $ids = $request->get('ids');

        foreach($ids as $item => $id){
            $data = [
                'product_id'=> $request->ids[$item]
            ];
            SlideShow::insert($data);
          }

          return back()->with('message','Banner Slider has been updated');
        }
    }

    public function manageFeatured()
    {
        $products = Product::where('publication_status', 1)->get();
        return view('adminDashboard.Banner.featuredProduct',['products'=>$products]);
    }
    public function submittedFeatured(Request $request)
    {
        if(FeaturedProduct::all()){

            FeaturedProduct::truncate();
        }

        if(count($request->get('ids'))>8){
            return back()->with('message','You can not select more than eight');
        } else{

        $ids = $request->get('ids');

        foreach($ids as $item => $id){
            $data = [
                'product_id'=> $request->ids[$item]
            ];
            FeaturedProduct::insert($data);
          }

          return back()->with('message','Featured Product has been updated');
        }
    }
}
