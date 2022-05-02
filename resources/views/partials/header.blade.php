<header class="main-header">
    <div class="logo">
        <span class="logo-mini">پنل</span>
        <span class="logo-lg"><b>سیستم مدیریت</b></span>
    </div>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

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
                        <img src="{{asset('assets/dist/img/User_Icon.png')}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">مدیریت</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{asset('assets/dist/img/User_Icon.png')}}" class="img-circle" alt="User Image">

                            <p>
                                مدیریت
                                <small>مدیریت کل سایت</small>
                            </p>
                        </li>
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="#">صفحه من</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">فروش</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">دوستان</a>
                                </div>
                            </div>
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
