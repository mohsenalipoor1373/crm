<header class="main-header">
    <div class="logo">
        <span class="logo-mini">سودی بسپار</span>
        <span class="logo-lg"><b>سیستم مدیریت</b></span>
    </div>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        &nbsp;&nbsp;
        <a href="#" id="search_customer" class="search_customer"
           style="font-family: Shabnam !important;" data-toggle="popover" data-content="CRM مشتری">
            <i class="fa fa-users fa-2x"
               style="color: white !important;margin-top: 10px"></i></a>


        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">1</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">1 اعلان جدید</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> ۵ کاربر جدید ثبت نام کردند
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="footer"><a href="#">نمایش همه</a></li>
                    </ul>
                </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset('/public/assets/dist/img/User_Icon.png')}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{auth()->user()->name}} {{auth()->user()->fname}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{asset('/public/assets/dist/img/User_Icon.png')}}" class="img-circle" alt="User Image">

                            <p>
                                {{auth()->user()->name}} {{auth()->user()->fname}}
                                <small>{{auth()->user()->role->name}}</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat">پروفایل</a>
                            </div>
                            <div class="pull-left">

                                <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    خروج
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>


                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>
