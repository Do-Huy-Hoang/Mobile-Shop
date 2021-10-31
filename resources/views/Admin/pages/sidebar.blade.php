<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('storage\logo\MoblieShop.png')}}" alt="Mobile Shop" class="brand-image img-circle elevation-3" style="opacity: .8; background-color: white">
        <span class="brand-text font-weight-light">Mobile Shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('storage\logo\MoblieShop.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Category -->
                @can('category-list')
                    <li class="nav-item">
                        <a href="{{ route('category.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-list-alt " aria-hidden="true"></i>
                            <p>
                                Category
                            </p>
                        </a>
                    </li>
                @endcan

                <!-- Product -->
                @can('product-list')
                    <li class="nav-item">
                        <a href="{{ route('product.index') }}" class="nav-link">
                            <i class="nav-icon fab fa-product-hunt" aria-hidden="true"></i>
                            <p>
                                Product
                            </p>
                        </a>
                    </li>
                @endcan
            <!-- order -->
                @can('orders-list')
                    <li class="nav-item">
                        <a href="{{ route('order_index') }}" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Order list
                            </p>
                        </a>
                    </li>
                @endcan
                <!-- Sliders -->
                @can('slider-list')
                    <li class="nav-item">
                        <a href="{{ route('slider.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-sliders-h" aria-hidden="true"></i>
                            <p>
                                Slider
                            </p>
                        </a>
                    </li>
                @endcan

                <!-- Settingd -->
                @can('settings-list')
                    <li class="nav-item">
                        <a href="{{ route('setting.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-cogs" aria-hidden="true"></i>
                            <p>
                                Settings
                            </p>
                        </a>
                    </li>
                 @endcan

                <!-- user -->
                @can('user-list')
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user" aria-hidden="true"></i>
                            <p>
                                User list
                            </p>
                        </a>
                    </li>
                @endcan

            <!-- customer -->
                @can('customer-list')
                    <li class="nav-item">
                        <a href="{{ route('customer.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user" aria-hidden="true"></i>
                            <p>
                                Customer list
                            </p>
                        </a>
                    </li>
                @endcan

                <!-- List of roles -->
                @can('role-list')
                    <li class="nav-item">
                        <a href="{{ route('roles.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-cog" aria-hidden="true"></i>
                            <p>
                                List of roles
                            </p>
                        </a>
                    </li>
                @endcan
                <!-- data permission -->
                @can('permission-add')
                    <li class="nav-item">
                        <a href="{{ route('permission.create') }}" class="nav-link">
                            <i class="nav-icon fa fa-plus-square" aria-hidden="true"></i>
                            <p>
                                Add data permission
                            </p>
                        </a>
                    </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

