<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = \App\Models\Produk::with('supplier')->get();
        return view('produk.index', compact('produks'));
    }

    public function create()
    {
        $suppliers = \App\Models\Supplier::all();
        return view('produk.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:150',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        \App\Models\Produk::create($validated);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $produk = \App\Models\Produk::findOrFail($id);
        $suppliers = \App\Models\Supplier::all();
        return view('produk.edit', compact('produk', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:150',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        $produk = \App\Models\Produk::findOrFail($id);
        $produk->update($validated);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy($id)
    {
        $produk = \App\Models\Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus');
    }
}
