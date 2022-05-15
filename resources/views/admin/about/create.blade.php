@extends('layouts.app')
@section('content')
    @if(session('store'))
        <section class="col-6 offset-3 alert bg-success">
            <h3 class="text-white text-center">{{session('store')}}</h3>
        </section>
    @endif
    <section class="col-6 offset-3 mt-5">
        <form action="{{route('about.store')}}" method="post">
            @csrf
            <section class="form-group">
                <input type="number" name="font" class="form-control mt-1"
                       placeholder="please enter number fontsize website" min="16" max="40" value="16">
                @error('font')
                <h5 class="text-danger">{{$message}}</h5>
                @enderror
            </section>
            <section class="form-group">
                <input type="color" name="color" class="form-control mt-1">
                @error('color')
                <h5 class="text-danger">{{$message}}</h5>
                @enderror
            </section>
            <section class="form-group">
                <textarea name="about" class="form-control mt-1"
                          placeholder="please enter about website"></textarea>
                @error('about')
                <h5 class="text-danger">{{$message}}</h5>
                @enderror
            </section>
            <section class="form-group">
                <input type="submit" value="submit" class="btn btn-success btn-block">
            </section>


        </form>
    </section>
    <section class="col-6 offset-3">
        <a href="{{route('about.index')}}" class="btn btn-info btn-block">show details</a>
    </section>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('cssAdmin/style.css')}}">
@endsection
