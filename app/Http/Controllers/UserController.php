<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return response()->json(
            [
                'status' => 'success',
                'users' => $users,
            ]
        );
    }

    public function store(Request $request)
    {
        {
            try {
                DB::beginTransaction();
                $products = User::create([
                    'name' => $request->name,
                    'email' => $request->color,
                    'password' => $request->size,
                ]);
    
                DB::commit();
                return response()->json([
                    'status' => 'success',
                    'users' => $users,
                ]);
            } catch (\Throwable $th) {
                DB::rollBack();
                Log::error($th);
                return response()->json([
                    'status' => 'error',
                ], 500);
            }
        }
    }
}
