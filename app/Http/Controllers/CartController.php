<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
	// public function buynow(Request $request){

	// 	if($request->variable_attribute){
	// 		$variation = json_encode($request->variable_attribute);
	// 	    $product = Product::where('parent_id',$request->product_id)->whereRaw("JSON_CONTAINS(variation, ?)", [$variation])->first();
	// 		if(!$product){
	// 			return back()->with('error','Sorry! This variation no longer available');
	// 		}
	// 	}else{
	// 		 $product = Product::find($request->product_id);
	// 	}
	// 	if($product->saleprice){
	// 		$price = $product->saleprice;
	// 	}else{
	// 		$price = $product->price;
	// 	}
	// 	// dd($product);
	// 	Cart::add($product->id, $product->name, $price,$request->quantity,['resturent'=>$request->res])->associate('App\Models\Product');
	// 	//session()->flash('errors', collect(['Please Check Length,Width,Height,Weight again of this product']));
	//     return redirect('/cart')->with('success_msg', 'Item has been added to cart!');
	// }
	public function add(Request $request)
	{

    //   dd()
		$product = Product::find($request->product_id);
		Cart::add($product->id, $product->name, $product->price, $request->quantity, ['resturent' => $request->restaurent_id])->associate('App\Models\Product');
		//session()->flash('errors', collect(['Please Check Length,Width,Height,Weight again of this product']));
		return back()->with('success_msg', 'Item has been added to cart!');
	}
	public function update(Request $request)
	{
		// dd($request->all());
		Cart::update($request->product_id, array(
			'quantity' => array(
				'relative' => false,
				'value' => $request->quantity
			),
		));
		return back()->with('success_msg', 'Item has been updated!');
	}
	public function destroy($id)
	{
		Cart::remove($id);
		return back()->with('success_msg', 'Item has been removed!');
	}
	public function updateVaritaiton(Request $request)
	{

		$variation = json_encode($request->variable_attribute);
		$product = Product::where('parent_id', $request->product_id)->whereRaw("JSON_CONTAINS(variation, ?)", [$variation])->first();
		// dd($product);
		if (!$product) {
			return back()->with('error', 'Sorry! This variation no longer available');
		}
		Cart::update($request->product_id, array(
			'id' => $product->id,
		));

		return back()->with('success_msg', 'Item has been Attribute add!');
	}
}
