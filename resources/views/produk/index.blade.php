@extends('layouts.app')

@section('title', 'Manifestations')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: baseline;">
        <h1>Current Manifestations</h1>
        <a href="{{ route('produk.create') }}" class="btn">Add New</a>
    </div>

    <div style="margin-top: -2rem; margin-bottom: 5rem; color: var(--gray-700); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.3em;">
        Total: {{ $products->total() }} units of data.
    </div>

    <table class="stark-table">
        <thead>
            <tr>
                <th>Identity</th>
                <th>Valuation</th>
                <th>Condition</th>
                <th>Presence</th>
                <th>Origin Date</th>
                <th style="text-align: right;">Operations</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td style="font-weight: 400;">{{ $product->name }}</td>
                    <td class="mono">IDR {{ number_format($product->price, 2, '.', ',') }}</td>
                    <td>
                        <span style="color: {{ $product->status == 'new' ? 'var(--white)' : 'var(--gray-600)' }}; text-transform: uppercase; font-size: 0.65rem; letter-spacing: 0.1em;">
                            {{ $product->status }}
                        </span>
                    </td>
                    <td>
                        <span style="color: {{ $product->is_active ? 'var(--white)' : 'var(--gray-800)' }}; font-size: 0.5rem;">
                            {{ $product->is_active ? '● ACTIVE' : '○ VOID' }}
                        </span>
                    </td>
                    <td class="mono" style="font-size: 0.75rem;">{{ $product->release_date ?? 'N/A' }}</td>
                    <td style="text-align: right;">
                        <a href="{{ route('produk.show', $product->id) }}" class="btn-text">Observe</a>
                        <a href="{{ route('produk.edit', $product->id) }}" class="btn-text">Alter</a>
                        <form action="{{ route('produk.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-text" style="cursor: pointer; background: none; border: none; font-family: inherit; font-size: inherit; text-transform: inherit; letter-spacing: inherit;" onclick="return confirm('Erase this manifestation?')">Erase</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 5rem 0; color: var(--gray-800); text-transform: uppercase; letter-spacing: 0.5em;">
                        The void is empty.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 5rem;">
        {{ $products->links() }}
    </div>
@endsection
