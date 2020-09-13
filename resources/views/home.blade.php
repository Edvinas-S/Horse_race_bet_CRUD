@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Where do you want to go...') }}</div>

                <div class="card-body">
                    <a href="{{ route('horses.index') }}" class="nav-link">Arkliai</a>
                    <a href="{{ route('betters.index') }}" class="nav-link">Lažybininkai</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
