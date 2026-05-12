<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\brand;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Tampilkan daftar produk (semua user yang sudah login bisa akses)
     */
    public function index()
    {
        $categories = category::all();
        $brands = brand::all();
        $products = product::with('category', 'brand')->get();

        return view('products.index', compact('products', 'categories', 'brands'));
    }

    /**
     * Form tambah produk (admin only)
     */
    public function create()
    {
        $categories = category::all();
        $brands = brand::all();
        return view('products.create', compact('categories', 'brands'));
    }

    /**
     * Simpan produk baru ke database (admin only)
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name'  => 'required|string|max:255',
            'category_id'   => 'required|exists:categories,category_id',
            'brand_id'      => 'required|exists:brands,brand_id',
            'product_price' => 'required|numeric|min:0',
            'product_stock' => 'required|integer|min:0',
            'product_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('product_image')) {
            $imagePath = $request->file('product_image')->store('products', 'public');
        }

        product::create([
            'product_name'  => $request->product_name,
            'category_id'   => $request->category_id,
            'brand_id'      => $request->brand_id,
            'product_price' => $request->product_price,
            'product_stock' => $request->product_stock,
            'product_image' => $imagePath,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Form edit produk (admin only)
     */
    public function edit(string $id)
    {
        $product    = product::findOrFail($id);
        $categories = category::all();
        $brands     = brand::all();

        return view('products.edit', compact('product', 'categories', 'brands'));
    }

    /**
     * Update produk di database (admin only)
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_name'  => 'required|string|max:255',
            'category_id'   => 'required|exists:categories,category_id',
            'brand_id'      => 'required|exists:brands,brand_id',
            'product_price' => 'required|numeric|min:0',
            'product_stock' => 'required|integer|min:0',
            'product_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $product = product::findOrFail($id);

        $imagePath = $product->product_image;
        if ($request->hasFile('product_image')) {
            // Hapus gambar lama jika ada
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('product_image')->store('products', 'public');
        }

        $product->update([
            'product_name'  => $request->product_name,
            'category_id'   => $request->category_id,
            'brand_id'      => $request->brand_id,
            'product_price' => $request->product_price,
            'product_stock' => $request->product_stock,
            'product_image' => $imagePath,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Hapus produk dari database (admin only)
     */
    public function destroy(string $id)
    {
        $product = product::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($product->product_image && Storage::disk('public')->exists($product->product_image)) {
            Storage::disk('public')->delete($product->product_image);
        }

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil dihapus!');
    }
}
