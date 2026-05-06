@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
<div style="max-width: 500px;">
    <h1>Add Product</h1>

    <form action="{{ route('produk.store') }}" method="POST" style="margin-top: 4rem;">
        @csrf
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" name="name" id="name" class="form-control" required autocomplete="off">
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="supplier_id">Supplier</label>
            <select name="supplier_id" id="supplier_id" class="form-control" required>
                <option value=""></option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-top: 5rem;">
            <button type="submit" class="btn btn-primary" style="margin-right: 2rem;">Save</button>
            <a href="{{ route('produk.index') }}" class="btn">Cancel</a>
        </div>
    </form>
</div>
@endsection
