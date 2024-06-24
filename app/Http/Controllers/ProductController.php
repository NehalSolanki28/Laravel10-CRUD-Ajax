<?php

namespace App\Http\Controllers;

use App\Jobs\ApplyDiscount;
use App\Models\Club;
use App\Models\Discount;
use App\Models\Product;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $product = Product::orderBy('created_at', 'desc')->paginate(2);
            $productTable = View::make('Product.productTable', compact('product'))->render();
            return response()->json(['product'=>$productTable,'link'=>$product->links('pagination::bootstrap-5  ')->render()]);
        }
        $club = Club::all();
        return view('Product.productIndex', compact('club'));
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
            'club_id' => $request->club_id,
            'title' => $request->title,
            'product_title' => $request->product_title,
            'type' => $request->type,
        ]);

        if ($product) {
            $date = new DateTime('now');
            $discount1 = ['product_id' => $product->id, 'code' => Str::random(6), 'percentage' => 10, 'min_amount' => 100, 'expiry_date' => $date->modify('+3 month')->format('Y-m-d h:i:s')];
            $discount2 = ['product_id' => $product->id, 'code' => Str::random(6), 'percentage' => 15, 'min_amount' => 200, 'expiry_date' => $date->modify('+2 month')->format('Y-m-d h:i:s')];
            $discount3 = ['product_id' => $product->id, 'code' => Str::random(6), 'percentage' => 20, 'min_amount' => 500, 'expiry_date' => $date->modify('+1 month')->format('Y-m-d h:i:s') ];
            
            ApplyDiscount::dispatch($discount1,$discount2,$discount3);
        }

        return response()->json([
            'status' => true,
            'message' => 'Product Created SuccessFully',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        $discount = $product->discounts;
        
        return response()->json([
            'status'=>true,
            'product'=>$product,
            'discount'=>$discount,
        ]);
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
        $discount = Discount::where('product_id',$id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Product Deleted SuccessFully...',
        ]);
    }
}
