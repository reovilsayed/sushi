<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Generic;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $minutes = 5;
        $products = Product::with(['category', 'generic', 'supplier'])->filter()->latest()->paginate(30)->withQueryString();
        $categories = Cache::remember('categories', $minutes, function () {
            return Category::all()->pluck('name', 'id')->toArray();
        });

        // Cache the generics
        $generics = Cache::remember('generics', $minutes, function () {
            return Generic::all()->pluck('name', 'id')->toArray();
        });

        // Cache the suppliers
        $suppliers = Cache::remember('suppliers', $minutes, function () {
            return Supplier::all()->pluck('name', 'id')->toArray();
        });
        $allProductCount = Cache::remember('allProductCount', $minutes, function () {
            return Product::count();
        });

        $activeProductCount = Cache::remember('activeProductCount', $minutes, function () {
            return Product::where('status', 1)->count();
        });
        return view('pages.products.list', compact('products', 'categories', 'generics', 'suppliers', 'allProductCount', 'activeProductCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $product =  new Product();
    //     return view('pages.products.create', compact('product'));
    // }
    // public function edit(Product $product)
    // {

    //     return view('pages.products.edit', compact('product'));
    // }
    public function createOrEdit(Request $request, Product $product = null)
    {
        $variations = $request->session()->get('variation_array') ?? [];

        $generics = Generic::all()->pluck('name', 'id')->toArray();
        $categories = Category::all()->pluck('name', 'id')->toArray();
        $suppliers = Supplier::all()->pluck('name', 'id')->toArray();
        $units = Unit::all()->pluck('name', 'id')->toArray();

        return view('pages.products.create', compact(
            'variations',
            'generics',
            'categories',
            'suppliers',
            'units',
            'product'
        ));
    }
    public function save(Request $request, Product $product = null)
    {
       
        $validated = $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image|max:1024',
            'unit' => 'nullable|string',
            'price' => 'required|min:1',
            'strip_price' => 'nullable|min:1',
            'box_price' => 'nullable|min:1',
            'status' => 'nullable',
            'featured' => 'nullable',
            'category' => 'nullable|exists:categories,id',
            'generic' => 'nullable|exists:generics,id',
            'supplier' => 'nullable|exists:suppliers,id',
            'description' => 'nullable',
            'trade_price' => 'nullable',
            'is_bonus' => 'nullable',
            'box_size' => 'nullable',
            'strength' => 'nullable',
            'type' => 'nullable',
        ]);

        if (!$product) {
            $product = new Product();
        }

        $product->name = $request->name;
        $product->unit = $request->unit;
        $product->price = $request->price;
        $product->strip_price = $request->strip_price;
        $product->box_price = $request->box_price;
        $product->status = $request->status;
        $product->featured = $request->featured;
        $product->category_id = $request->category;
        $product->generic_id = $request->generic;
        $product->supplier_id = $request->supplier;
        $product->description = $request->description;
        $product->trade_price = $request->price * 0.88;
        $product->is_bonus = $request->is_bonus;
        $product->box_size = $request->box_size;
        $product->strength = $request->strength;
        $product->type = $request->type;

        if ($request->hasFile('image')) {
            if ($product->image && Storage::exists($product->image)) {
                Storage::delete($product->image);
            }
            $product->image = $request->file('image')->store('product');
        }

        $product->save();

        return redirect(route('products.createOrEdit',$product->id))->with('success','Product Created Successfully');
  
    }
    public function duplicateProduct(Request $request)
    {

        $request->validate([
            'productId' => 'required|exists:products,id',
        ]);

        $originalProduct = Product::findOrFail($request->productId);

        $newProduct = $originalProduct->replicate();
        $newProduct->name = $originalProduct->name . ' - Duplicate';
        $newProduct->save();

        flash()->addSuccess("{$originalProduct->name} has been duplicated!");
        return response()->json(['newProductId' => $newProduct->id]);
    }

    /**
     * Show the form for editing the specified resource.
     */



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image && Storage::exists($product->image)) {
            Storage::delete($product->image);
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted');
    }
}
