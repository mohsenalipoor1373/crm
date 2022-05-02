<aside class="main-sidebar" style="position: fixed;top: 0;left: 0;right: 0;height: 50px">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li  class="" id="home_li">
                <a href="{{route('home')}}">
                    <i class="fa fa-home"></i>
                    <span>خانه</span>
                    <span class="pull-left-container">
            </span>
                </a>
            </li>
            <li class="treeview" id="users_li">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>مدیریت کاربران</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li id="users_li_index">
                        <a href="{{route('users_index')}}"><i class="fa fa-circle-o"></i>لیست کاربران</a>
                    </li>
                    <li id="roles_li_index">
                        <a href="{{route('roles')}}"><i class="fa fa-circle-o"></i>لیست نقش</a>
                    </li>
                    <li id="permissions_li_index">
                        <a href="{{route('permissions')}}"><i class="fa fa-circle-o"></i>لیست دسترسی</a>
                    </li>
                    <li id="grouping_li_index">
                        <a href="{{route('grouping')}}"><i class="fa fa-circle-o"></i>لیست گروه کاری</a>
                    </li>
                </ul>
            </li>
            <li class="treeview" id="basic_li">
                <a href="#">
                    <i class="fa fa-star"></i>
                    <span>تعاریف پایه</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li id="basic_li_masterbach">
                        <a href="{{route('masterbach')}}"><i class="fa fa-circle-o"></i>لیست مستربچ</a>
                    </li>
                    <li id="basic_li_color">
                        <a href="{{route('color')}}"><i class="fa fa-circle-o"></i>لیست رنگ</a>
                    </li>

                </ul>
            </li>
        </ul>
    </section>
</aside>
