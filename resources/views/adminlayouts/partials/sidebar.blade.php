<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile dropdown m-t-20">
                        <div class="user-pic">
                            <img src="{{asset('adminbite/assets/images/users/2.jpg')}}" alt="users" class="rounded-circle img-fluid" />
                        </div>
                        <div class="user-content hide-menu m-t-10">
                            <h5 class="m-b-10 user-name font-medium">{{auth()->user()->name}}</h5>
                            <a href="javascript:void(0)" class="btn btn-circle btn-sm m-r-5" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="ti-settings"></i>
                            </a>
                            <a href="{{route('admin.getLogout')}}" title="Logout" class="btn btn-circle btn-sm">
                                <i class="ti-power-off"></i>
                            </a>
                            <div class="dropdown-menu animated flipInY" aria-labelledby="Userdd">
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('admin.getLogout')}}">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                <!-- main-->
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Main</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="icon-Car-Wheel"></i>
                        <span class="hide-menu">Dashboards </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('admin.home')}}" class="sidebar-link">
                                <i class="icon-Record"></i>
                                <span class="hide-menu"> Dashboard</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="fab fa-product-hunt"></i>
                        <span class="hide-menu">Product</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('products.index')}}" class="sidebar-link">
                                <i class="icon-Record"></i>
                                <span class="hide-menu"> Product List </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('products.create')}}" class="sidebar-link">
                                <i class="icon-Record"></i>
                                <span class="hide-menu"> Product Add </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('categories.index', ['type' => 'product'])}}" class="sidebar-link">
                                <i class="icon-Record"></i>
                                <span class="hide-menu"> Product Category </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-thumbtack"></i>
                        <span class="hide-menu">Post</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('posts.index')}}" class="sidebar-link">
                                <i class="icon-Record"></i>
                                <span class="hide-menu"> Post List </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('posts.create')}}" class="sidebar-link">
                                <i class="icon-Record"></i>
                                <span class="hide-menu"> Post Add </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('categories.index', ['type' => 'post'])}}" class="sidebar-link">
                                <i class="icon-Record"></i>
                                <span class="hide-menu"> Post Category </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-ellipsis-h"></i>
                        <span class="hide-menu">Menu</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('menus.index')}}" class="sidebar-link">
                                <i class="icon-Record"></i>
                                <span class="hide-menu"> Menu List </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('menus.create')}}" class="sidebar-link">
                                <i class="icon-Record"></i>
                                <span class="hide-menu"> Menu Add </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-sliders-h"></i>
                        <span class="hide-menu">Slider</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('sliders.index')}}" class="sidebar-link">
                                <i class="icon-Record"></i>
                                <span class="hide-menu"> Slider List </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('sliders.create')}}" class="sidebar-link">
                                <i class="icon-Record"></i>
                                <span class="hide-menu"> Slider Add </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-cog"></i>
                        <span class="hide-menu">Setting</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('settings.index')}}" class="sidebar-link">
                                <i class="icon-Record"></i>
                                <span class="hide-menu"> Setting List </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('settings.create') . '?type=Text'}}" class="sidebar-link">
                                <i class="icon-Record"></i>
                                <span class="hide-menu"> Setting Add Text</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('settings.create') . '?type=Textarea'}}" class="sidebar-link">
                                <i class="icon-Record"></i>
                                <span class="hide-menu"> Setting Add TextArea</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">User - Permission</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        <span class="hide-menu">User</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('users.index')}}" class="sidebar-link">
                                <i class="icon-Record"></i>
                                <span class="hide-menu"> User List </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('users.create')}}" class="sidebar-link">
                                <i class="icon-Record"></i>
                                <span class="hide-menu"> User Add </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-cogs"></i>
                        <span class="hide-menu">Role</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('roles.index')}}" class="sidebar-link">
                                <i class="icon-Record"></i>
                                <span class="hide-menu"> Role List </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('roles.create')}}" class="sidebar-link">
                                <i class="icon-Record"></i>
                                <span class="hide-menu"> Role Add </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark sidebar-link" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-check"></i>
                        <span class="hide-menu">Permissions</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('permissions.index')}}" class="sidebar-link">
                                <i class="icon-Record"></i>
                                <span class="hide-menu"> Permission List </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('permissions.create')}}" class="sidebar-link">
                                <i class="icon-Record"></i>
                                <span class="hide-menu"> Permission Add </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Extra</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#
                                   " aria-expanded="false">
                        <i class="mdi mdi-content-paste"></i>
                        <span class="hide-menu">About</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.getLogout')}}
                                   " aria-expanded="false">
                        <i class="mdi mdi-directions"></i>
                        <span class="hide-menu">Log Out</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
