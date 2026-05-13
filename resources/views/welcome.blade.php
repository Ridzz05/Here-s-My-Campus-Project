@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div style="margin-top: 10vh;">
    <h1>Sistem Manajemen</h1>
    <p style="color: rgba(255, 255, 255, 0.4); max-width: 500px; font-size: 0.9rem; margin-bottom: 4rem; line-height: 1.8;">
        Antarmuka minimalis untuk mengelola data suplier dan produk Anda. Bersih, efisien, dan langsung pada intinya.
    </p>
    
    <div style="display: flex; gap: 3rem;">
        <a href="{{ route('supplier.index') }}" class="btn">Lihat Suplier</a>
        <a href="{{ route('produk.index') }}" class="btn">Kelola Produk</a>
    </div>
</div>
@endsection
