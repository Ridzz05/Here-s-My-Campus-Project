@extends('layouts.app')

@section('title', 'Produk')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: baseline;">
        <h1>Daftar Produk</h1>
        <a href="{{ route('produk.create') }}" class="btn">Tambah Baru</a>
    </div>

    <div style="margin-top: -2rem; margin-bottom: 5rem; color: rgba(255, 255, 255, 0.4); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.3em;">
        Total: {{ $products->total() }} unit data.
    </div>

    <table class="stark-table">
        <thead>
            <tr>
                <th>Identitas</th>
                <th>Valuasi</th>
                <th>Kondisi</th>
                <th>Kehadiran</th>
                <th>Tanggal Rilis</th>
                <th style="text-align: right;">Operasi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td style="font-weight: 400;">{{ $product->name }}</td>
                    <td class="mono">IDR {{ number_format($product->price, 2, '.', ',') }}</td>
                    <td>
                        <span style="color: {{ $product->status == 'new' ? 'var(--white)' : 'rgba(255, 255, 255, 0.4)' }}; text-transform: uppercase; font-size: 0.65rem; letter-spacing: 0.1em;">
                            {{ $product->status == 'new' ? 'BARU' : 'BEKAS' }}
                        </span>
                    </td>
                    <td>
                        <span style="color: {{ $product->is_active ? 'var(--white)' : 'rgba(255, 255, 255, 0.1)' }}; font-size: 0.5rem;">
                            {{ $product->is_active ? '● AKTIF' : '○ HAMPA' }}
                        </span>
                    </td>
                    <td class="mono" style="font-size: 0.75rem;">{{ $product->release_date ?? '-' }}</td>
                    <td style="text-align: right;">
                        <a href="{{ route('produk.show', $product->id) }}" class="btn-text">Amati</a>
                        <a href="{{ route('produk.edit', $product->id) }}" class="btn-text">Ubah</a>
                        <form action="{{ route('produk.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-text" style="cursor: pointer; background: none; border: none; font-family: inherit; font-size: inherit; text-transform: inherit; letter-spacing: inherit;" onclick="return confirm('Hapus produk ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 5rem 0; color: rgba(255, 255, 255, 0.1); text-transform: uppercase; letter-spacing: 0.5em;">
                        Data produk kosong.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 5rem;">
        {{ $products->links() }}
    </div>
@endsection
