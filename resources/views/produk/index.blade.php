@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="flex-header">
    <h1>Products</h1>
    <a href="{{ route('produk.create') }}" class="btn btn-primary">Add Product</a>
</div>

<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Supplier</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produks as $produk)
            <tr>
                <td>{{ $produk->name }}</td>
                <td>IDR {{ number_format($produk->price, 0, ',', '.') }}</td>
                <td>{{ $produk->stock }}</td>
                <td style="color: var(--text-muted);">{{ $produk->supplier->name }}</td>
                <td>
                    <a href="{{ route('produk.edit', $produk->id) }}" class="btn">Edit</a>
                    <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn" style="color: #ff4444;" onclick="return confirm('Delete this product?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
