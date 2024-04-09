<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::all();
        return response()->json(
            [
                'status' => 'success',
                'products' => $products,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
            try {
                DB::beginTransaction();
                $products = Product::create([
                    'name' => $request->name,
                    'price' => $request->price,
    
                ]);
    
                DB::commit();
                return response()->json([
                    'status' => 'success',
                    'products' => $products,
                ]);
            } catch (\Throwable $th) {
                DB::rollBack();
                Log::error($th);
                return response()->json([
                    'status' => 'error',
                ], 500);
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
