<aside class="main-sidebar elevation-4 text-white bg-dark">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="" alt="" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="font-weight-bold text-center  text-white">Medicine</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar text-white">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            {{--            <div class="image">
                            <img src="" class="img-circle elevation-2" alt="User Image">
                        </div>--}}
            <div class="text-white">
                {{--                    <a href="#" class="d-block">{{Auth::user()->name}}</a>--}}
                <a href="{{route('dashboard')}}" class="d-block text-white">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2 text-white">
            <ul class="nav nav-pills nav-sidebar flex-column text-white" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="text-white">
                    <a href="" class="nav-link">
                        <i class='fas fa-briefcase-medical text-white'></i>
                        <p class="text-white">
                            Medicines
                        </p>
                    </a>
                    <ul class="">
                        <li class="nav-item ">
                            <a href="{{route('medicine')}}" class="nav-link">
                                <i class="fas fa-door-open text-white"></i>
                                <p  class="ml-3 text-white">Add Medicine</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('view-medicine')}}" class="nav-link">
                                <i class="fas fa-door-open text-white"></i>
                                <p class="ml-3 text-white">View Medicine</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('manufacturer-list')}}" class="nav-link">
                                <i class="fas fa-door-open text-white"></i>
                                <p class="ml-3 text-white"> Manufacturer List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('automate')}}" class="nav-link">
                                <i class="fas fa-door-open text-white"></i>
                                <p class="ml-3 text-white">Automate Medicine</p>
                            </a>
                        </li>
                    </ul>


                <li class="text-white">
                    <a href="" class="nav-link">
                        <i class="fa fa-users text-white" aria-hidden="true"></i>
                        <p class="text-white">
                       users
                        </p>
                    </a>
                    <ul class="">
                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-screwdriver ml-2"></i>
                                <p class="ml-4"> Setup settings </p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{route('register-user')}}" class="nav-link">
                                <i class="fa fa-user text-white" aria-hidden="true"></i>
                                <p class="ml-4 text-white"> register user </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('manage-user')}}" class="nav-link">
                                <i class="fa fa-user text-white" aria-hidden="true"></i>
                                <p class="ml-4 text-white"> Manage user </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="text-white">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p class="text-white">
                            <i class="fas fa-angle-left right text-white"></i>
                            Transactions
                        </p>
                    </a>
                    <ul class="">
                        <li class="nav-item">
                            <a href="{{route('invoice')}}" class="nav-link">
                                <i class="fas fa-plus-circle ml-2 text-white"></i>
                                <p class="ml-4 text-white"> Create Invoices </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('search')}}" class="nav-link">
                                <i class="fas fa-list-ul ml-2 text-white"></i>
                                <p class="ml-4 text-white">Search Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('stock')}}" class="nav-link">
                                <i class="fas fa-list-ul ml-2 text-white"></i>
                                <p class="ml-4 text-white">Check Stock</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('refund')}}" class="nav-link">
                                <i class="fas fa-list-ul ml-2 text-white"></i>
                                <p class="ml-4 text-white">Refund Invoice</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('viewTransaction')}}" class="nav-link">
                                <i class="fas fa-list-ul ml-2 text-white"></i>
                                <p class="ml-4 text-white">Monthly Sell</p>
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-check"></i>
                                Terminate Client
                            </a>
                        </li> --}}
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link">
                        <i class="fas fa-door-open "></i>
                        <p class="ml-3 text-white">logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
