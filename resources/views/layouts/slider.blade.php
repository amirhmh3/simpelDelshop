{{--    <div class="btn-dark"></div>--}}
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
{{--        <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
{{--             style="opacity: .8">--}}
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">حسام موسوی</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    @can('show customer')
                    <li class="nav-item">
                        <a href="customer" class="nav-link">
                            <i class="nav-icon fa fa-circle-o text-danger"></i>
                            <p class="text">لیست کاربران</p>
                        </a>
                    </li>
                    @endcan
                    @can('show colleague')
                    <li class="nav-item">
                        <a href="colleague" class="nav-link">
                            <i class="nav-icon fa fa-circle-o text-warning"></i>
                            <p>لیست همکاران</p>
                        </a>
                    </li>
                    @endcan
                    @can('show access')
                        <li class="nav-item">
                            <a href="permission" class="nav-link">
                                <i class="nav-icon fa fa-circle-o text-info"></i>
                                <p> دسترسی ها</p>
                            </a>
                        </li>
                    @endcan
                    @can('show wallet')
                    <li class="nav-item">
                        <a href="customer/wallet" class="nav-link">
                            <i class="nav-icon fa fa-circle-o text-info"></i>
                            <p>کیف پول</p>
                        </a>
                    </li>
                    @endcan
                    @can('showAllFile')
                    <li class="nav-item">
                        <a href="file" class="nav-link">
                            <i class="nav-icon fa fa-circle-o text-info"></i>
                            <p>فایل ها</p>
                        </a>
                    </li>
                    @endcan
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="d-inline-flex btn-block text-center">
                                <p>خروج</p>
                            </button>
                        </form>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>




