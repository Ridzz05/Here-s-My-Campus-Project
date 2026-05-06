@extends('layouts.app')

@section('title', 'Suppliers')

@section('content')
<div class="flex-header">
    <h1>Suppliers</h1>
</div>

<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suppliers as $supplier)
            <tr>
                <td style="color: var(--text-muted);">#{{ $supplier->id }}</td>
                <td>{{ $supplier->name }}</td>
                <td>{{ $supplier->phone }}</td>
                <td style="color: var(--text-muted);">{{ $supplier->address ?? 'n/a' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
