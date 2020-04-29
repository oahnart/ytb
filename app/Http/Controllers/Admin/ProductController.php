<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    //
    public function getProduct()
    {
        $data['productlist'] = DB::table('vp_products')
            ->join('vp_categories', 'vp_products.prod_cate', '=',
                'vp_categories.cate_id')->orderBy('prod_id', 'desc')->get();
        return view('backend.product',$data);
    }

    public function getAddProduct()
    {
        $data['catelist'] = Category::all();
        return view('backend.addproduct', $data);
    }

    public function postAddProduct(AddProductRequest $request)
    {
        $filename = $request->img->getClientOriginalName();
        $product = new Product();
        $product->prod_name = $request->name;
        $product->prod_slug = str_slug($request->name);
        $product->prod_img = $filename;
        $product->prod_price = $request->price;
        $product->prod_warranty = $request->warranty;
        $product->prod_accessories = $request->accessories;
        $product->prod_condition = $request->condition;
        $product->prod_promotion = $request->promotion;
        $product->prod_status = $request->status;
        $product->prod_description = $request->description;
        $product->prod_featured = $request->featured;
        $product->prod_cate = $request->cate;
        $product->save();
        $request->img->storeAs('avatar', $filename);


    }

    public function getEditProduct($id)
    {
        $data['product'] = Product::find($id);
        $data['listcate'] = Category::all();
        return view('backend.editproduct',$data);
    }

    public function postEditProduct(Request $request,$id)
    {
        $product = Product::find($id);
        $product->prod_name = $request->name;
        $product->prod_slug = str_slug($request->name);
        $product->prod_price = $request->price;
        $product->prod_warranty = $request->warranty;
        $product->prod_accessories = $request->accessories;
        $product->prod_condition = $request->condition;
        $product->prod_promotion = $request->promotion;
        $product->prod_status = $request->status;
        $product->prod_description = $request->description;
        $product->prod_featured = $request->featured;
        $product->prod_cate = $request->cate;
        if($request->hasFile('img')){
            $img = $request->img->getClientOriginalName();
            $product->prod_img = $img;
            $request->img->storeAs('avatar'.$img);
        }
        $product->save();
        return redirect('admin/product');

    }

    public function getDeleteProduct($id)
    {
        Product::destroy($id);
        $product= Product::find($id);
        return back();
    }
}
