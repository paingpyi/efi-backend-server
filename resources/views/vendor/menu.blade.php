<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
        @if (!is_null(json_decode($checkPermission->permissions)))
            {{-- Admin Dashboard --}}
            @if (in_array('admin#dashboard', json_decode($checkPermission->permissions)))
                <li class="nav-item">
                    <a href="{{ route('admin#dashboard') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
            @endif
            {{-- /. Admin Dashboard --}}

            {{-- Content --}}
            @if (in_array('product#list', json_decode($checkPermission->permissions)))
                <li class="nav-item">
                    <a href="{{ route('product#list') }}" class="nav-link">
                        <i class="nav-icon fas fa-pen-nib"></i>
                        <p>
                            Content
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (in_array('blog#list', json_decode($checkPermission->permissions)))
                            <li class="nav-item">
                                <a href="{{ route('blog#list') }}" class="nav-link">
                                    <i class="fas fa-blog nav-icon"></i>
                                    <p>Blogs</p>
                                    <i class="fas fa-angle-left right"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    @if (in_array('blog#list', json_decode($checkPermission->permissions)))
                                        <li class="nav-item">
                                            <a href="{{ route('blog#list') }}" class="nav-link">
                                                <i class="fas fa-blog nav-icon"></i>
                                                <p>Blog List</p>
                                            </a>
                                        </li>
                                    @endif

                                    @if (in_array('new#blog', json_decode($checkPermission->permissions)))
                                        <li class="nav-item">
                                            <a href="{{ route('new#blog') }}" class="nav-link">
                                                <i class="fas fa-blog nav-icon"></i>
                                                <p>New Blog</p>
                                            </a>
                                        </li>
                                    @endif

                                </ul>
                            </li>
                        @endif
                        @if (in_array('product#list', json_decode($checkPermission->permissions)))
                            <li class="nav-item">
                                <a href="{{ route('product#list') }}" class="nav-link">
                                    <i class="fas fa-box nav-icon"></i>
                                    <p>Products</p>
                                    <i class="fas fa-angle-left right"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    @if (in_array('product#list', json_decode($checkPermission->permissions)))
                                        <li class="nav-item">
                                            <a href="{{ route('product#list') }}" class="nav-link">
                                                <i class="fas fa-box nav-icon"></i>
                                                <p>Product List</p>
                                            </a>
                                        </li>
                                    @endif

                                    @if (in_array('deactivated#product#list', json_decode($checkPermission->permissions)))
                                        <li class="nav-item">
                                            <a href="{{ route('deactivated#product#list') }}" class="nav-link">
                                                <i class="fas fa-box nav-icon"></i>
                                                <p>Deactivated Product List</p>
                                            </a>
                                        </li>
                                    @endif

                                    @if (in_array('new#product', json_decode($checkPermission->permissions)))
                                        <li class="nav-item">
                                            <a href="{{ route('new#product') }}" class="nav-link">
                                                <i class="fas fa-box-open nav-icon"></i>
                                                <p>New Product</p>
                                            </a>
                                        </li>
                                    @endif

                                </ul>
                            </li>
                        @endif
                        @if (in_array('job#list', json_decode($checkPermission->permissions)))
                            <li class="nav-item">
                                <a href="{{ route('job#list') }}" class="nav-link">
                                    <i class="fa fa-address-card nav-icon"></i>
                                    <p>Job Vacancy</p>
                                    <i class="fas fa-angle-left right"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    @if (in_array('job#list', json_decode($checkPermission->permissions)))
                                        <li class="nav-item">
                                            <a href="{{ route('job#list') }}" class="nav-link">
                                                <i class="fa fa-address-card nav-icon"></i>
                                                <p>Job Vacancy List</p>
                                            </a>
                                        </li>
                                    @endif

                                    @if (in_array('new#job', json_decode($checkPermission->permissions)))
                                        <li class="nav-item">
                                            <a href="{{ route('new#job') }}" class="nav-link">
                                                <i class="fa fa-address-card nav-icon"></i>
                                                <p>New Job Vacancy</p>
                                            </a>
                                        </li>
                                    @endif

                                </ul>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            {{-- /. Content --}}

            {{-- Management --}}
            @if (in_array('user#list', json_decode($checkPermission->permissions)))
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>
                            Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (in_array('user#list', json_decode($checkPermission->permissions)))
                            <li class="nav-item">
                                <a href="{{ route('user#list') }}" class="nav-link">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>Users</p>
                                    <i class="fas fa-angle-left right"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    @if (in_array('user#list', json_decode($checkPermission->permissions)))
                                        <li class="nav-item">
                                            <a href="{{ route('user#list') }}" class="nav-link">
                                                <i class="fas fa-users nav-icon"></i>
                                                <p>User List</p>
                                            </a>
                                        </li>
                                    @endif

                                    @if (in_array('deactivated#user#list', json_decode($checkPermission->permissions)))
                                        <li class="nav-item">
                                            <a href="{{ route('deactivated#user#list') }}" class="nav-link">
                                                <i class="fas fa-users nav-icon"></i>
                                                <p>Deactivated User List</p>
                                            </a>
                                        </li>
                                    @endif

                                    @if (in_array('new#user', json_decode($checkPermission->permissions)))
                                        <li class="nav-item">
                                            <a href="{{ route('new#user') }}" class="nav-link">
                                                <i class="fas fa-user-plus nav-icon"></i>
                                                <p>New User</p>
                                            </a>
                                        </li>
                                    @endif

                                </ul>
                            </li>
                        @endif

                        @if (in_array('team#list', json_decode($checkPermission->permissions)))
                            <li class="nav-item">
                                <a href="{{ route('team#list') }}" class="nav-link">
                                    <i class="fa fa-sitemap nav-icon"></i>
                                    <p>Teams</p>
                                    <i class="fas fa-angle-left right"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    @if (in_array('team#list', json_decode($checkPermission->permissions)))
                                        <li class="nav-item">
                                            <a href="{{ route('team#list') }}" class="nav-link">
                                                <i class="fas fa-sitemap nav-icon"></i>
                                                <p>Team List</p>
                                            </a>
                                        </li>
                                    @endif

                                    @if (in_array('deactivated#team#list', json_decode($checkPermission->permissions)))
                                        <li class="nav-item">
                                            <a href="{{ route('deactivated#team#list') }}" class="nav-link">
                                                <i class="fas fa-sitemap nav-icon"></i>
                                                <p>Deactivated Team List</p>
                                            </a>
                                        </li>
                                    @endif

                                    @if (in_array('deactivated#team#list', json_decode($checkPermission->permissions)))
                                        <li class="nav-item">
                                            <a href="{{ route('new#team') }}" class="nav-link">
                                                <i class="fas fa-sitemap nav-icon"></i>
                                                <p>New Team</p>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif

                        @if (in_array('category#list', json_decode($checkPermission->permissions)))
                            <li class="nav-item">
                                <a href="{{ route('category#list') }}" class="nav-link">
                                    <i class="fa fa-suitcase nav-icon"></i>
                                    <p>Categories</p>
                                    <i class="fas fa-angle-left right"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    @if (in_array('category#list', json_decode($checkPermission->permissions)))
                                        <li class="nav-item">
                                            <a href="{{ route('category#list') }}" class="nav-link">
                                                <i class="fas fa-suitcase nav-icon"></i>
                                                <p>Category List</p>
                                            </a>
                                        </li>
                                    @endif

                                    @if (in_array('deactivated#category#list', json_decode($checkPermission->permissions)))
                                        <li class="nav-item">
                                            <a href="{{ route('deactivated#category#list') }}" class="nav-link">
                                                <i class="fas fa-suitcase nav-icon"></i>
                                                <p>Deactivated Category List</p>
                                            </a>
                                        </li>
                                    @endif

                                    @if (in_array('new#category', json_decode($checkPermission->permissions)))
                                        <li class="nav-item">
                                            <a href="{{ route('new#category') }}" class="nav-link">
                                                <i class="fas fa-suitcase nav-icon"></i>
                                                <p>New Category</p>
                                            </a>
                                        </li>
                                    @endif

                                </ul>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-th-large nav-icon"></i>
                                <p>Blocks</p>
                                <i class="fas fa-angle-left right"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                @if (in_array('slider#list', json_decode($checkPermission->permissions)))
                                    <li class="nav-item">
                                        <a href="{{ route('slider#list') }}" class="nav-link">
                                            <i class="fab fa-slideshare nav-icon"></i>
                                            <p>Slider Block</p>
                                            <i class="fas fa-angle-left right"></i>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            @if (in_array('slider#list', json_decode($checkPermission->permissions)))
                                                <li class="nav-item">
                                                    <a href="{{ route('slider#list') }}" class="nav-link">
                                                        <i class="fab fa-slideshare nav-icon"></i>
                                                        <p>Slide List</p>
                                                    </a>
                                                </li>
                                            @endif

                                            @if (in_array('new#slider', json_decode($checkPermission->permissions)))
                                                <li class="nav-item">
                                                    <a href="{{ route('new#slider') }}" class="nav-link">
                                                        <i class="fab fa-slideshare nav-icon"></i>
                                                        <p>New Slide</p>
                                                    </a>
                                                </li>
                                            @endif

                                        </ul>
                                    </li>
                                @endif

                                @if (in_array('promotion#block', json_decode($checkPermission->permissions)))
                                    <li class="nav-item">
                                        <a href="{{ route('promotion#block') }}" class="nav-link">
                                            <i class="fa fa-tasks nav-icon"></i>
                                            <p>Promotion Block</p>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>

                    </ul>
                </li>
            @endif
            {{-- Management --}}
        @endif

        <li class="nav-item">
            <form id="frmLogout" action="{{ route('logout') }}" method="post">
                @csrf
                <a href="#" id="logout" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>Log out</p>
                </a>
            </form>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
