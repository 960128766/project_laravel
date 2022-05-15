@extends('layouts.app')
@section('content')


    <section class="col-6 offset-3 mt-5">
        <form action="{{route('gallery.update',$gallery->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <section class="form-group">
                <input type="file" name="image" class="form-control" placeholder="please enter image website">
                <img src="{{asset('images/gallery/'.$gallery->image)}}" width="50px" height="50px">
                @error('image')
                <h5 class="text-danger">{{$message}}</h5>
                @enderror
            </section>
            <section class="form-group">
                <input type="submit" value="submit" class="btn btn-success btn-block">
            </section>
        </form>
    </section>
    <section class="col-6 offset-3">
        <a href="{{route('gallery.index')}}" class="btn btn-info btn-block">show details</a>
    </section>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('cssAdmin/style.css')}}">
@endsection
