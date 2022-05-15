<section class="contact">
    <section class="row ml-0 mr-0">
        <section class="col-10 offset-1">
            <h1 class="text-center text-capitalize">Contact Us</h1>
            <section class="borderContact mb-5"></section>
            <section class="row ml-0 mr-0">
                @if(session('conatct'))
                    <section class="col-8 offset-2 bg-success p-3">
                        <h4 class="text-center text-white">{{session('contact')}}</h4>
                    </section>
                @endif
                <section class="col-8 offset-2">
                    <form action="{{route('contact.data')}}" method="post">
                        @csrf
                        <section class="form-group">
                            <label for="fullname">fillname</label>
                            <input type="text" name="fullname" id="fullname" placeholder="please enter fullname?"
                                   class="form-control">
                            @error('fullname')
                            <h3 class="text-danger">{{$message}}</h3>
                            @enderror
                        </section>
                        <section class="form-group">
                            <label for="email">email</label>
                            <input type="text" name="email" id="email" placeholder="please enter email?"
                                   class="form-control">
                            @error('email')
                            <h3 class="text-danger">{{$message}}</h3>
                            @enderror
                        </section>
                        <section class="form-group">
                            <label for="comment">comment</label>
                            <textarea name="comment" id="comment" cols="30" rows="10" class="form-control"
                                      placeholder="please your comment?"></textarea>
                            @error('comment')
                            <h3 class="text-danger">{{$message}}</h3>
                            @enderror
                        </section>
                        <section class="form-group">
                            <input type="submit" value="submit" class="btn btn-success btn-block">
                        </section>
                    </form>
                </section>
            </section>
        </section>
    </section>
</section>
