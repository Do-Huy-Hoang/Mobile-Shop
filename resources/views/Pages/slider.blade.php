<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($slider as $item)
        <li data-target="#carouselExampleIndicators" data-slide-to="{{$count++}}" class="@if($slider[0] == $item) active @endif"></li>
        @endforeach
    </ol>
    <div class="carousel-inner">

        @foreach($slider as $item)
        <div class="carousel-item @if($slider[0] == $item) active @endif">
            <img class="d-block w-100 slider_a" src="{{substr($item->image_path,1)}}" alt="First slide">
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><br>

