@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Race Results</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Status</th>
                <th>Weight</th>
                <th>Race Time (seconds)</th>
                <th>Ability</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $key => $turkey)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $turkey->name }}</td>
                    <td>{{ ucfirst($turkey->status) }}</td>
                    <td>{{ $turkey->weight }} kg</td>
                    <td>{{ number_format($turkey->race_time, 2) }} seconds</td>
                    <td>{{ $turkey->ability->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('turkeys.index') }}" class="btn btn-secondary">Back to Turkeys</a>
</div>
@endsection
