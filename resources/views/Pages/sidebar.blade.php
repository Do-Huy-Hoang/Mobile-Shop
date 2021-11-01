<div class="nav-side-menu">
    <div class="brand">Option</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

    <div class="menu-list">

        <ul id="menu-content" class="menu-content collapse out">
            <a  class="badge-dark" href="{{route('product', ['id'=>0])}}"><li>All</li></a>
            @foreach($category->where('id_parent', '0') as $categoryItem)
                <li data-toggle="collapse" data-target="#{{'a'.$categoryItem->id}}" class="collapsed">
                    <a href="#"><span class="arrow">{{$categoryItem->name}}</span></a>
                    <ul class="sub-menu collapse" id="{{'a'.$categoryItem->id}}">
                        <a href="{{route('product', ['id'=>$categoryItem->id])}}"><li>All {{$categoryItem->name}}</li></a>
                        @foreach($category->where('id_parent',$categoryItem->id) as $categoryListItem)
                            <a href="{{route('product', ['id'=>$categoryListItem->id])}}"><li>{{$categoryListItem->name}}</li></a>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
</div>
