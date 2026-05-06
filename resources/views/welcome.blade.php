@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div style="margin-top: 10vh;">
    <h1>Management System</h1>
    <p style="color: var(--text-muted); max-width: 400px; font-size: 0.9rem; margin-bottom: 4rem;">
        a minimalist interface for managing your suppliers and products. clean, efficient, and direct.
    </p>
    
    <div style="display: flex; gap: 3rem;">
        <a href="{{ route('supplier.index') }}" class="btn btn-primary">View Suppliers</a>
        <a href="{{ route('produk.index') }}" class="btn btn-primary">Manage Products</a>
    </div>
</div>
@endsection
