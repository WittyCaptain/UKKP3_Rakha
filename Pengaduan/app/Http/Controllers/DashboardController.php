<?php

namespace App\Http\Controllers;

use App\Models\role;
use App\Models\shift;
use App\Models\tb_transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function admin()
    {
        $a = role::where('role', 'admin')->count();
        $c = role::where('role', 'customer')->count();
        $user = User::all();

        return view('admin/index', compact('a', 'c', 'user'));
    }

    public function pembeli()
    {
        return view('customer/index');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
