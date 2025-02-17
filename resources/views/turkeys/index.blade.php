@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Turkeys</h1>

    <a href="{{ route('turkeys.create') }}" class="btn btn-outline-primary mb-3">Add Turkey</a>
    <a href="{{ route('turkeys.info') }}" class="btn btn-outline-secondary mb-3">Race Info</a>
    <a href="{{ route('turkeys.race') }}" class="btn btn-outline-success mb-3">Start Race!</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Weight</th>
                <th>Birthdate</th>
                <th>Special Ability</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($turkeys as $turkey)
                <tr>
                    <td>{{ $turkey->name }}</td>
                    <td>{{ $turkey->status }}</td>
                    <td>{{ $turkey->weight }}</td>
                    <td>{{ $turkey->birthdate }}</td>
                    <td>{{ $turkey->ability->name }}</td>
                    <td>
                        <a href="{{ route('turkeys.edit', $turkey->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('turkeys.destroy', $turkey->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('You sure you want to delete this turkey??')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">
                        No turkeys available. <br>
                        Please run: <b>php artisan db:seed</b>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
