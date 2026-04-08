<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $products = products::with('categories')->get();
        return view('dashboard', ['products' => $products]);
    }
}
