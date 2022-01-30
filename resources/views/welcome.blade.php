@extends('layouts.app')

@section('content')
    <div class="card text-left m-5">
        <div class="card-body">
            <h4 class="card-title">Livewire</h4>
            <p class="card-text"> <a href="{{ route('user.index') }}">
                    <h4>click for livewire datatable</h4>
                </a></p>
        </div>
    </div>
@endsection
