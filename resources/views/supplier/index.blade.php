@extends('layouts.app')

@section('title', 'Origins')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: baseline;">
        <h1>Entity Origins</h1>
    </div>

    <div style="margin-top: -2rem; margin-bottom: 5rem; color: var(--gray-700); font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.3em;">
        Source: Suppliers Database
    </div>

    <table class="stark-table">
        <thead>
            <tr>
                <th>Identity</th>
                <th>Designation</th>
                <th>Communication</th>
                <th>Coordinates</th>
            </tr>
        </thead>
        <tbody>
            @forelse($suppliers as $supplier)
                <tr>
                    <td class="mono" style="color: var(--gray-700);">#{{ str_pad($supplier->id, 4, '0', STR_PAD_LEFT) }}</td>
                    <td style="font-weight: 400;">{{ $supplier->name }}</td>
                    <td class="mono" style="font-size: 0.8rem;">{{ $supplier->phone }}</td>
                    <td style="color: var(--gray-600); font-size: 0.8rem;">{{ $supplier->address ?? 'UNDEFINED' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center; padding: 5rem 0; color: var(--gray-800); text-transform: uppercase; letter-spacing: 0.5em;">
                        No origins found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
