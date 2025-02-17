@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Race Details</h1>

    <div class="alert alert-info">
        <h3>Race Rules</h3>
        <ul>
            <li><strong>Dead Turkeys:</strong> Dead turkeys cannot race :(</li>
            <li><strong>Injured Turkeys:</strong> Injured turkeys race 10% slower</li>
            <li><strong>Healthy Turkeys:</strong> Healthy turkeys race at normal speed</li>
            <li><strong>Big Turkeys:</strong> Turkeys with more than 5kg starts to run slower at each kg</li>
            <li><strong>Boost Speed:</strong> The turkey is 20% faster</li>
            <li><strong>Mecha Accessories:</strong> The turkey is 30% faster but weighs 30% more</li>
            <li><strong>Mutated Turkeys:</strong> Mutated turkeys race 50% faster, but they may go crazy and not race at all</li>
            <li><strong>Zombie Turkeys:</strong> Zombie turkeys race at a random speed (50%-150% of normal speed)</li>
        </ul>

    </div>

    <div class="text-center">
        <a href="{{ route('turkeys.race') }}" class="btn btn-primary">Start the Race!</a>
        <a href="{{ route('turkeys.index') }}" class="btn btn-secondary">Go back</a>
    </div>
</div>
@endsection
