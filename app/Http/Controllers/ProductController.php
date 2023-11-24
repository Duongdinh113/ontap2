<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    const PATH_VIEW = 'products.';
    const PATH_UPLOAD = 'product';
    public function index()
    {
        //
        $data = Product::query()->latest()->paginate(5);
        return view(self::PATH_VIEW.__FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW.__FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
           $request->validate([
        'name' =>'required|unique:products|max:50',
        'price' =>'required|numeric',
        'img' =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'price_sale' =>'required|numeric',
        'is_active' => [
            'required',
            Rule::in([
                Product::isactive,
                Product::is_active,
                ])
            ],


       ]);
    // dd($request->all());
        $data = $request->except('img');
        if ($request->hasFile('img')) {
            $data['img'] = Storage::put(self::PATH_UPLOAD,$request->file('img'));
        }
        Product::query()->create($data);
        return back()->with('msg','thêm thành công');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        return view(self::PATH_VIEW.__FUNCTION__, compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        return view(self::PATH_VIEW.__FUNCTION__, compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
        'name' =>'required|max:50',
        'price' =>'required',
        'img' =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'price_sale' =>'required',
        'is_active' => [
           'required',
            Rule::in([
                Product::isactive,
                Product::is_active,
                ])
            ],


       ]);

       $data = $request->except('img');
       if ($request->hasFile('img')) {
           $data['img'] = Storage::put(self::PATH_UPLOAD,$request->file('img'));
       }
       $product->update($data);

       $old = $product->img;

       if (Storage::exists('img')) {
           Storage::delete($old);
       }

       return back()->with('msg','sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        // Product::destroy($product->id);
        $product->delete();
        if(Storage::exists('img')){
            Storage::delete('img');
        }
        return back()->with('msg','xóa thành công');

    }
}
