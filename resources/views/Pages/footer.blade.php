<section id="footer">
    <div class="container">
        <div class="row text-center text-xs-center text-sm-left text-md-left">
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h5>Location</h5>
                <ul class="list-unstyled quick-links">
                    <li><a href="{{route('Home.index')}}"><i class="fa fa-angle-double-right"></i>Home</a></li>
                    <li><a href="{{route('product', ['id'=>0])}}"><i class="fa fa-angle-double-right"></i>Product</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h5>Contact</h5>
                <ul class="list-unstyled quick-links">
                    @foreach($settings as $item)
                    <li><a><i class="fa fa-asterisk" aria-hidden="true"></i>{{$item->config_key}}: {{$item->config_value}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h5>Quick links</h5>
                <ul class="list-unstyled quick-links">
                    <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-google-plus"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02" target="_blank"><i class="fa fa-envelope"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                <p class="h6">© Mobile Shop by Group 1.</p>
            </div>
            <hr>
        </div>
    </div>
</section>
