<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('main.index') }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->


                <li class="nav-item">
                    <a href="{{route('user.earnings.index')}}" class="nav-link">
                        <i class="nav-icon far fa-arrow-alt-circle-up pr-2"></i>
                        <p>
                            Earnings
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user.spendings.index')}}" class="nav-link">
                        <i class="nav-icon far fa-arrow-alt-circle-down pr-2"></i>
                        <p>
                            Spendings
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user.transfers.index')}}" class="nav-link">
                        <i class="nav-icon far fa-arrow-alt-circle-down pr-2"></i>
                        <p>
                            Transfers
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user.tags.index')}}" class="nav-link">
                        <i class="nav-icon fab fa-buffer pr-2"></i>
                        <p>
                            Tags
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user.types.index')}}" class="nav-link">
                        <i class="nav-icon fab fa-buffer pr-2"></i>
                        <p>
                            Types
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user.sources.index')}}" class="nav-link">
                        <i class="nav-icon fab fa-buffer pr-2"></i>
                        <p>
                            Sources
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user.categories.index')}}" class="nav-link">
                        <i class="nav-icon fab fa-buffer pr-2"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Charts
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
