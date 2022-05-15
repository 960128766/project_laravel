<section class="slider">
    <section class="row ml-0 mr-0">
        <section class="col-12">
            <!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
            <div id="wowslider-container1">
                <div class="ws_images">
                    <ul>
                        @foreach($slider as $item)
                            <li><img src="{{asset('images/slider/'.$item->image)}}" alt="{{$item->alt}}"
                                     title="{{$item->caption}}"
                                     id="wows1_0"/></li>
                        @endforeach
                    </ul>
                </div>
                <div class="ws_bullets">
                    <div>
                        @foreach($slider as $item)
                            <a href="#" title="61724433"><span><img
                                        src="{{asset('images/slider/'.$item->image)}}"
                                        alt="{{$item->alt}}"/>1</span></a>
                        @endforeach
                    </div>
                </div>

                <div class="ws_shadow"></div>
            </div>
        </section>
    </section>

</section>
