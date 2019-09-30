<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\storeProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product;
        $categories = Category::all();
        return view('product.create', compact(['product', 'categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\storeProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeProductRequest $request)
    {
        $product = Product::create($request->all());

        if($request->has('image')) {
            $this->storeImage($product);
        }

        return redirect('product');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
         $categories = Category::all();
         return view('product.edit', compact(['product','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\storeProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(storeProductRequest $request, Product $product)
    {
        $product->update(collect($request)->except('image')->toArray());

        if($request->has('image')) {
            $this->deleteImage($product);
            $this->storeImage($product);
        }

        return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return void
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $this->deleteImage($product);
        $product->delete();
    }

    /**
     * Process image upload
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    private function storeImage(Product $product)
    {
        $product->update([
            'image' => request()->image->store('uploads', 'public'),
        ]);

        $image = Image::make(public_path('storage/' . $product->image))->fit(500,500);
        $image->save();
    }

    /**
     * Delete image if exists
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    private function deleteImage(Product $product)
    {
        $image_path = public_path('storage/' . $product->image);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
    }
}
