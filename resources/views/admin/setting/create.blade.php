@extends('layouts.app')
@section('content')
    <section class="col-6 offset-3 mt-5">
        <form action="{{route('setting.store')}}" method="post">
            @csrf
            <section class="form-group">
                <input type="text" name="title" class="form-control mt-1" placeholder="please enter title website">
                @error('title')
                <h5 class="text-danger">{{$message}}</h5>
                @enderror
            </section>
            <section class="form-group">
                <input type="text" name="author" class="form-control mt-1" placeholder="please enter author website">
                @error('author')
                <h5 class="text-danger">{{$message}}</h5>
                @enderror
            </section>
            <section class="form-group">
                <textarea name="keywords" class="form-control mt-1"
                          placeholder="please enter keywords website"></textarea>
                @error('keywords')
                <h5 class="text-danger">{{$message}}</h5>
                @enderror
            </section>
            <section class="form-group">
                <textarea name="description" class="form-control mt-1"
                          placeholder="please enter description website"></textarea>
                @error('description')
                <h5 class="text-danger">{{$message}}</h5>
                @enderror
            </section>
            <section class="form-group">
                <input type="submit" value="submit" class="btn btn-success btn-block">
            </section>


        </form>
    </section>
    <section class="col-6 offset-3">
        <a href="{{route('setting.index')}}" class="btn btn-info btn-block">show details</a>
    </section>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('cssAdmin/style.css')}}">
@endsection
