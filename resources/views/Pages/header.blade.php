<div class="header_row">
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light header_nav">
            <a class="logo " href="{{route('Home.index')}}">
                <img class="logo_img" src="{{asset('storage\logo\MoblieShop.png')}}">
            </a>
            <div class="search_mobile">
                <form class="input-group" action="{{route('product', ['id'=>0])}}">
                    @csrf
                    <input class="sear" type="search" name="search" placeholder="Search......">
                </form>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse header_left" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto" id="myDIV">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('Home.index')}}">Home <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($category->where('id_parent', '0') as $categoryItem)
                            <a class="dropdown-item" href="{{route('product',['id'=>$categoryItem->id])}}">{{$categoryItem->name}}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('product', ['id'=>0])}}">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about_us')}}">About us</a>
                    </li>
                </ul>
                <div class="d-flex justify-content-center h-100">
                    <form class="searchbar search_web" action="{{route('product', ['id'=>0])}}">
                        @csrf
                        <input class="search_input" type="search" name="search" placeholder="Search...">
                        <a href="#" class="search_icon"><i class="fa fa-search" aria-hidden="true"></i></a>
                    </form>
                </div>
                <div class="Utilities">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <div class="cart col-md-12">
                                <a href="{{route('cart')}}" class="link-muted" role="button">
                                    <div class="icon-badge-container">
                                        <i class="fa fa-shopping-cart fa-2x number" aria-hidden="true"></i>
                                        <div class="icon-badge">
                                            @php
                                                $count = 0;
                                                $a = session()->get('cart');
                                                    if ($a == ''){
                                                        $count = 0;
                                                    }else{
                                                        foreach ($a as $item){
                                                         $count++;
                                                        }
                                                    }
                                                echo $count;
                                            @endphp
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            @guest()
                                <div class="user col-md-6">
                                    <a href="{{route('login')}}" class="link-muted" role="button"><i
                                            class="fa fa-user-circle fa-2x" aria-hidden="true"></i></a>
                                </div>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        <i class="nav-icon fa fa-address-card" aria-hidden="true"></i> Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="nav-icon fa fa-sign-out" aria-hidden="true"></i> Logout
                                    </a>
                                    @can('is_admin')
                                        <a class="dropdown-item" href="{{ route('AdminHome.index') }}">
                                            Admin
                                        </a>
                                    @endcan
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                            </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</div>
