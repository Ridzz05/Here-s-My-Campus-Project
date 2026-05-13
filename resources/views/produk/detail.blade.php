@extends('layouts.app')

@section('title', 'Observation')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: baseline;">
        <h1>Observe Entity</h1>
        <a href="{{ route('produk.index') }}" class="btn-text">← Revert</a>
    </div>

    <div style="margin-top: 5rem;">
        <div style="margin-bottom: 6rem;">
            <div style="color: var(--gray-700); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.3em; margin-bottom: 1rem;">Designation</div>
            <div style="font-size: 4rem; font-weight: 300; letter-spacing: -0.05em; line-height: 1;">{{ $product->name }}</div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 8rem; max-width: 900px;">
            <div>
                <div class="form-group">
                    <label class="form-label">Valuation</label>
                    <div class="mono" style="font-size: 1.5rem;">IDR {{ number_format($product->price, 2, '.', ',') }}</div>
                </div>
                <div class="form-group">
                    <label class="form-label">Condition</label>
                    <div style="text-transform: uppercase; letter-spacing: 0.1em;">{{ $product->status }}</div>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label class="form-label">Origin Date</label>
                    <div class="mono">{{ $product->release_date ?? 'NONE' }}</div>
                </div>
                <div class="form-group">
                    <label class="form-label">Presence Status</label>
                    <div style="text-transform: uppercase; letter-spacing: 0.1em; color: {{ $product->is_active ? 'var(--white)' : 'var(--gray-800)' }};">
                        {{ $product->is_active ? 'Active Manifestation' : 'Void State' }}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group" style="max-width: 900px; margin-top: 4rem; padding-top: 4rem; border-top: 1px solid var(--border);">
            <label class="form-label">Internal Void / Description</label>
            <div style="font-size: 1.1rem; font-weight: 300; line-height: 1.8; color: var(--gray-400); white-space: pre-wrap;">{{ $product->description ?? 'No data found in this region.' }}</div>
        </div>

        <div style="margin-top: 8rem; display: flex; gap: 2rem; align-items: center;">
            <a href="{{ route('produk.edit', $product->id) }}" class="btn">Alter Entity</a>
            <form action="{{ route('produk.destroy', $product->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-text" style="cursor: pointer; background: none; border: none; font-family: inherit; font-size: inherit; text-transform: inherit; letter-spacing: inherit;" onclick="return confirm('Erase this manifestation?')">Erase Forever</button>
            </form>
        </div>
    </div>
@endsection
