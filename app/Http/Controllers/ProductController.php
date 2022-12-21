<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $products = Product::paginate(5); // SELECT * FROM category

        if ($req->keyword) {
            $products = Product::where('name','like','%'.$req->keyword.'%')
                    ->orderBy('id','DESC')
                    ->paginate(); // SELECT * FROM products
        }

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::orderBy('id','DESC')->get(); // SELECT * FROM category
        return view('admin.product.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric|min:10000',
            'sale_price' => 'required|numeric|lte:price',
            'upload' => 'required|mimes:jpeg,jpg,png,gif'
        ]);

        $form_data = $request->only('name','price','sale_price','status','content','category_id');
        $file_name = $request->upload->getClientOriginalName();
        $request->upload->move(public_path('uploads'), $file_name);
        $form_data['image'] = $file_name;
        Product::create($form_data);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cats = Category::orderBy('id','DESC')->get(); // SELECT * FROM category
        return view('admin.product.edit', compact('cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric|min:10000',
            'sale_price' => 'required|numeric|lte:price',
            'upload' => 'mimes:jpeg,jpg,png,gif'
        ]);

        $form_data = $request->only('name','price','sale_price','status','content','category_id');
        
        if ($request->has('upload')) {
            $file_name = $request->upload->getClientOriginalName();
            $request->upload->move(public_path('uploads'), $file_name);
            $form_data['image'] = $file_name;
        }
       
        $product->update($form_data);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
