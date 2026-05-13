@extends('layouts.app')

@section('title', 'Suplier')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: baseline;">
        <h1>Daftar Suplier</h1>
    </div>

    <div style="margin-top: -2rem; margin-bottom: 5rem; color: rgba(255, 255, 255, 0.4); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.3em;">
        Data Pemasok Eksternal
    </div>

    <table class="stark-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Suplier</th>
                <th>Telepon</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($suppliers as $supplier)
                <tr>
                    <td class="mono" style="color: rgba(255, 255, 255, 0.2);">#{{ str_pad($supplier->id, 4, '0', STR_PAD_LEFT) }}</td>
                    <td style="font-weight: 400;">{{ $supplier->name }}</td>
                    <td class="mono" style="font-size: 0.8rem;">{{ $supplier->phone }}</td>
                    <td style="color: rgba(255, 255, 255, 0.4); font-size: 0.8rem;">{{ $supplier->address ?? 'TIDAK TERSEDIA' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center; padding: 5rem 0; color: rgba(255, 255, 255, 0.1); text-transform: uppercase; letter-spacing: 0.5em;">
                        Data suplier tidak ditemukan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
