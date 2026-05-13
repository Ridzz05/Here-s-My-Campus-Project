@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: baseline;">
        <h1>Detail Produk</h1>
        <a href="{{ route('produk.index') }}" class="btn-text">← Kembali</a>
    </div>

    <div style="margin-top: 5rem;">
        <div style="margin-bottom: 6rem;">
            <div style="color: rgba(255, 255, 255, 0.4); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.3em; margin-bottom: 1rem;">Nama Produk</div>
            <div style="font-size: 4rem; font-weight: 300; letter-spacing: -0.05em; line-height: 1;">{{ $product->name }}</div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 8rem; max-width: 900px;">
            <div>
                <div class="form-group">
                    <label class="form-label">Harga Jual</label>
                    <div class="mono" style="font-size: 1.5rem;">IDR {{ number_format($product->price, 2, '.', ',') }}</div>
                </div>
                <div class="form-group">
                    <label class="form-label">Kondisi</label>
                    <div style="text-transform: uppercase; letter-spacing: 0.1em;">{{ $product->status == 'new' ? 'BARU' : 'BEKAS' }}</div>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label class="form-label">Tanggal Rilis</label>
                    <div class="mono">{{ $product->release_date ?? 'TIDAK ADA' }}</div>
                </div>
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <div style="text-transform: uppercase; letter-spacing: 0.1em; color: {{ $product->is_active ? 'var(--white)' : 'rgba(255, 255, 255, 0.1)' }};">
                        {{ $product->is_active ? 'Produk Tersedia' : 'Produk Tidak Tersedia' }}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group" style="max-width: 900px; margin-top: 4rem; padding-top: 4rem; border-top: 1px solid var(--border);">
            <label class="form-label">Deskripsi Lengkap</label>
            <div style="font-size: 1.1rem; font-weight: 300; line-height: 1.8; color: rgba(255, 255, 255, 0.6); white-space: pre-wrap;">{{ $product->description ?? 'Tidak ada deskripsi yang tersedia.' }}</div>
        </div>

        <div style="margin-top: 8rem; display: flex; gap: 2rem; align-items: center;">
            <a href="{{ route('produk.edit', $product->id) }}" class="btn">Ubah Produk</a>
            <form action="{{ route('produk.destroy', $product->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-text" style="cursor: pointer; background: none; border: none; font-family: inherit; font-size: inherit; text-transform: inherit; letter-spacing: inherit;" onclick="return confirm('Hapus produk ini secara permanen?')">Hapus Permanen</button>
            </form>
        </div>
    </div>
@endsection
