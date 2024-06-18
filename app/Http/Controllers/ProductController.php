<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Club;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use PhpParser\Node\Stmt\Return_;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        if($request->ajax()){
            $product = Product::orderBy('created_at', 'desc')->get();
            $productTable =  View::make('Product.productTable',compact('product'))->render();
            return response()->json($productTable);
        }
        $club = Club::all();
        return view('Product.productIndex',compact('club'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   

        $product = Product::create([
            'club_id'=>$request->club_id,
            'title'=>$request->title,
            'product_title'=>$request->product_title,
            'type'=>$request->type,
        ]);
        return response()->json([
            'status'=>true,
            'message'=>'Product Created SuccessFully'
        ]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json([
                'status' => 200,
                'product' => $product,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Product Found.',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->input());
        return response()->json([
            'success' => true,
            'message' => 'Data Updated SuccessFully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();
        
        return response()->json([
            'status' => true,
            'message' => 'Product Deleted SuccessFully...',
        ]);
    }
}
