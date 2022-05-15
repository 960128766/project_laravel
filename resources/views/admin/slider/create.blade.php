@extends('layouts.app')
@section('content')
    <section class="col-6 offset-3 mt-3">
        <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <section class="form-group">
                <input type="file" name="image" class="form-control">
                @error('image')
                <h5 class="text-danger">{{$message}}</h5>
                @enderror
            </section>
            <section class="form-group">
                <input type="text" name="alt" class="form-control" placeholder="please enter alt image?">
                @error('alt')
                <h5 class="text-danger">{{$message}}</h5>
                @enderror
            </section>
            <section class="form-group">
                <input type="text" name="caption" class="form-control" placeholder="please enter caption?">
                @error('caption')
                <h5 class="text-danger">{{$message}}</h5>
                @enderror
            </section>
            <section class="form-group">
                <input type="submit" value="submit" class="btn btn-success btn-block">
            </section>
        </form>
        <a href="{{route('slider.index')}}" class="text-white btn btn-info btn-block">show details</a>
    </section>
@endsection
