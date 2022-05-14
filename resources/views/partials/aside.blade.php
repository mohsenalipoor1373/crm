<aside class="main-sidebar" style="position: fixed;top: 0;left: 0;right: 0;height: 50px">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="" id="home_li">
                <a href="{{route('home')}}">
                    <i class="fa fa-home"></i>
                    <span>خانه</span>
                    <span class="pull-left-container">
            </span>
                </a>
            </li>
            @can('کاربران','سمت سازمانی','دسترسی','محل خدمت')
                <li class="treeview" id="users_li">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>مدیریت کاربران</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('کاربران')
                            <li id="users_li_index">
                                <a href="{{route('users_index')}}"><i class="fa fa-circle-o"></i> کاربران</a>
                            </li>
                        @endcan
                        @can('سمت سازمانی')
                            <li id="roles_li_index">
                                <a href="{{route('roles')}}"><i class="fa fa-circle-o"></i> سمت سازمانی</a>
                            </li>
                        @endcan
                        @can('دسترسی')
                            <li id="permissions_li_index">
                                <a href="{{route('permissions')}}"><i class="fa fa-circle-o"></i> دسترسی</a>
                            </li>
                        @endcan
                        @can('محل خدمت')
                            <li id="grouping_li_index">
                                <a href="{{route('grouping')}}"><i class="fa fa-circle-o"></i> محل خدمت</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('رنگ','مستربچ','رنگ و مستربچ','شیفت','چاپخانه','مواد','گرید مواد','پتروشیمی','درجه کیفی مواد','مواد اولیه')
                <li class="treeview" id="basic_li">
                    <a href="#">
                        <i class="fa fa-star"></i>
                        <span>تعاریف پایه</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('رنگ')
                            <li id="basic_li_color">
                                <a href="{{route('color')}}"><i class="fa fa-circle-o"></i> رنگ</a>
                            </li>
                        @endcan
                        @can('مستربچ')
                            <li id="basic_li_masterbach">
                                <a href="{{route('masterbach')}}"><i class="fa fa-circle-o"></i> مستربچ</a>
                            </li>
                        @endcan
                        @can('رنگ و مستربچ')
                            <li id="basic_li_color_masterbatch">
                                <a href="{{route('color_masterbatch')}}"><i class="fa fa-circle-o"></i> رنگ و مستربچ</a>
                            </li>
                        @endcan
                        @can('شیفت')
                            <li id="basic_li_shift">
                                <a href="{{route('shift')}}"><i class="fa fa-circle-o"></i> شیفت </a>
                            </li>
                        @endcan
                        @can('چاپخانه')
                            <li id="basic_li_printing_house">
                                <a href="{{route('printing_house')}}"><i class="fa fa-circle-o"></i> چاپخانه </a>
                            </li>
                        @endcan
                        @can('مواد')
                            <li id="basic_li_material">
                                <a href="{{route('material')}}"><i class="fa fa-circle-o"></i> مواد </a>
                            </li>
                        @endcan
                        @can('گرید مواد')
                            <li id="basic_li_grade">
                                <a href="{{route('grade')}}"><i class="fa fa-circle-o"></i> گرید مواد </a>
                            </li>
                        @endcan
                        @can('پتروشیمی')
                            <li id="basic_li_petrochemical">
                                <a href="{{route('petrochemical')}}"><i class="fa fa-circle-o"></i> پتروشیمی </a>
                            </li>
                        @endcan
                        @can('درجه کیفی مواد')
                            <li id="basic_li_quality_materials">
                                <a href="{{route('quality_materials')}}"><i class="fa fa-circle-o"></i> درجه کیفی مواد
                                </a>
                            </li>
                        @endcan
                        @can('مواد اولیه')
                            <li id="basic_li_early_materials">
                                <a href="{{route('early_materials')}}"><i class="fa fa-circle-o"></i> مواد اولیه </a>
                            </li>
                        @endcan
                        @can('نوع محصول')
                            <li id="basic_li_early_materials">
                                <a href="{{route('product_type')}}"><i class="fa fa-circle-o"></i> نوع محصول </a>
                            </li>
                        @endcan
                        @can('شکل محصول')
                            <li id="basic_li_early_materials">
                                <a href="{{route('product_shape')}}"><i class="fa fa-circle-o"></i> شکل محصول </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
        </ul>
    </section>
</aside>
