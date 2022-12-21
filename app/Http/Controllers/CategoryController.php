<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        if (Gate::any(['admin','category'], Auth::user())) {
            $cats = Category::paginate(6); // SELECT * FROM category
        
            if ($req->keyword){
                $cats = Category::where('name','like','%'.$req->keyword.'%')->paginate(3);
            }
            return view('admin.category.index', compact('cats'));
        } else {
            return abort(403);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
            return view('admin.category.create');
        }
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
            'id' => 'required',
            'name' => 'required|unique:categories',
            'upload' => 'required|mimes:jpeg,jpg,png,gif'
        ], [
            'id.required' => 'Id không để trống',
            'name.required' => 'Tên danh mục không để trống',
            'name.unique' => 'Tên danh mục đã được sử dụng'
        ]);
        $form_data = $request->only('id','name','status');
        $file_name = $request->upload->getClientOriginalName();
        $request->upload->move(public_path('uploads'), $file_name);
        $form_data['image'] = $file_name; 
        // $form_data = $req->all('id','name','image','status');
        Category::create($form_data); // INSERT INTO category.....
        return redirect()->route('category.index');
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
        {
            return view('admin.category.create');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required|unique:categories',
            'upload' => 'required|mimes:jpeg,jpg,png,gif'
        ], [
            'id.required' => 'Id không để trống',
            'name.required' => 'Tên danh mục không để trống',
            'name.unique' => 'Tên danh mục đã được sử dụng'
        ]);

        $form_data = $request->only('id','name','status');
        
        if ($request->has('upload')) {
            $file_name = $request->upload->getClientOriginalName();
            $request->upload->move(public_path('uploads'), $file_name);
            $form_data['image'] = $file_name;
        }
       
        $category->update($form_data);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $category)
    {
        if ($category->products->count() > 0) {
            return redirect()->back()->with('no', 'Xóa không thành công, danh mục đang có sản phẩm');
        } else {
            try {
                $category->delete();
                return redirect()->route('category.index')->with('yes', 'Xóa thành công');
            } catch (\Throwable $th) {
                return redirect()->back()->with('no', 'Xóa không thành công');
            } 
        }
    }
}
