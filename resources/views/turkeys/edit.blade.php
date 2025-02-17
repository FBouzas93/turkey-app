@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Turkey</h1>

    <form action="{{ route('turkeys.update', $turkey->id) }}" method="POST">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $turkey->name) }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="healthy" {{ old('status', $turkey->status) == 'healthy' ? 'selected' : '' }}>Healthy</option>
                <option value="injured" {{ old('status', $turkey->status) == 'injured' ? 'selected' : '' }}>Injured</option>
                <option value="dead" {{ old('status', $turkey->status) == 'dead' ? 'selected' : '' }}>Dead</option>
            </select>
        </div>

        <div class="form-group">
            <label for="weight">Weight</label>
            <input type="number" step="0.1" class="form-control" id="weight" name="weight" value="{{ old('weight', $turkey->weight) }}" required>
        </div>

        <div class="form-group">
            <label for="birthdate">Birthdate</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ old('birthdate', $turkey->birthdate) }}" required>
        </div>

        <div class="form-group">
            <label for="ability">Ability</label>
            <select class="form-control" id="ability" name="ability_id" required>
                <option value="">Select Ability</option>
                @foreach($abilities as $ability)
                    <option value="{{ $ability->id }}" 
                        {{ old('ability_id', $turkey->ability_id) == $ability->id ? 'selected' : '' }}>
                        {{ $ability->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" style="margin-top: 10px" class="btn btn-primary">Update Turkey</button>
    </form>
</div>
@endsection
