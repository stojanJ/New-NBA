@extends('layouts.master')

@section('title', 'Login')

@section('content')
    @if (session('message'))
    <div class="alert alert-success">
        <h4>{{ session('message') }} </h4>    
    </div>
    @endif

    <form method="POST" action="/login">
        @csrf
        
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="email" class="form-control"/>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" />
        </div>

        @error('message')
            @include('partials.error')
        @enderror

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
@endsection