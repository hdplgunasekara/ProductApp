<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use domain\facade\ProductFacade;

class ProductController extends ParentController

{



    public function dashboard(){

        $result['products']= ProductFacade::all();

        return view('pages.product.dashboard')->with($result);

    }

    public function addproduct(){
        return view('pages.product.add');
    }

    public function store(Request $request){

        ProductFacade::store($request->all());

        return redirect()->route('product');
    }

    public function delete($product_id)
    {
       ProductFacade::delete($product_id);
       return redirect()->back()->with('success','User Deleted');;
    }

    public function setactive($product_id)
    {
        ProductFacade::setactive($product_id);
        return redirect()->back();
    }

    public function setinactive($product_id)
    {
        ProductFacade::setinactive($product_id);
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $response['product'] = ProductFacade::get($request['product_id']);
        return view(['pages.product.edit'])->with($response);
    }

    public function update(Request $request,$product_id)
    {
        ProductFacade::update($request->all(),$product_id);
        return redirect()->back();
    }
}
