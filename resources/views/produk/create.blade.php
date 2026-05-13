@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: baseline;">
        <h1>Tambah Produk Baru</h1>
        <a href="{{ route('produk.index') }}" class="btn-text">← Kembali</a>
    </div>

    <form action="{{ route('produk.store') }}" method="POST" style="margin-top: 2rem;">
        @csrf
        
        <div class="form-group">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Masukkan nama..." required autofocus>
            @error('name')
                <div style="color: var(--white); font-size: 0.6rem; margin-top: 0.5rem; letter-spacing: 0.1em;">KESALAHAN: {{ strtoupper($message) }}</div>
            @enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; max-width: 600px;">
            <div class="form-group">
                <label class="form-label">Harga (IDR)</label>
                <input type="number" name="price" class="form-control mono" value="{{ old('price') }}" step="0.01" required>
                @error('price')
                    <div style="color: var(--white); font-size: 0.6rem; margin-top: 0.5rem; letter-spacing: 0.1em;">KESALAHAN: {{ strtoupper($message) }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Kondisi</label>
                <select name="status" class="form-control" required>
                    <option value="new" {{ old('status') == 'new' ? 'selected' : '' }}>BARU</option>
                    <option value="used" {{ old('status') == 'used' ? 'selected' : '' }}>BEKAS</option>
                </select>
                @error('status')
                    <div style="color: var(--white); font-size: 0.6rem; margin-top: 0.5rem; letter-spacing: 0.1em;">KESALAHAN: {{ strtoupper($message) }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Tanggal Rilis</label>
            <input type="date" name="release_date" class="form-control mono" value="{{ old('release_date') }}">
            @error('release_date')
                <div style="color: var(--white); font-size: 0.6rem; margin-top: 0.5rem; letter-spacing: 0.1em;">KESALAHAN: {{ strtoupper($message) }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Deskripsi Produk</label>
            <textarea name="description" rows="5" class="form-control" placeholder="Tuliskan detail produk...">{{ old('description') }}</textarea>
            @error('description')
                <div style="color: var(--white); font-size: 0.6rem; margin-top: 0.5rem; letter-spacing: 0.1em;">KESALAHAN: {{ strtoupper($message) }}</div>
            @enderror
        </div>

        <div class="form-group" style="display: flex; align-items: center; gap: 1.5rem;">
            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} style="width: 20px; height: 20px; accent-color: var(--white); cursor: pointer;">
            <label for="is_active" class="form-label" style="margin-bottom: 0; cursor: pointer;">Produk Aktif</label>
        </div>

        <div style="margin-top: 5rem;">
            <button type="submit" class="btn">Simpan Produk</button>
        </div>
    </form>
@endsection
