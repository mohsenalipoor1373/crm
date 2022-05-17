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
            @can('کاربران','سمت سازمانی','دسترسی','محل خدمت','شیفت')
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
                        @can('شیفت')
                            <li id="basic_li_shift">
                                <a href="{{route('shift')}}"><i class="fa fa-circle-o"></i> شیفت </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('نوع محصول','شکل محصول','شاخص محصول','ابعاد محصول','محصول','قطعه مونتاژی','رنگ','مستربچ','رنگ و مستربچ','مواد','گرید مواد','پتروشیمی','درجه کیفی مواد','مواد اولیه','چاپخانه')
                <li class="treeview" id="basic_li">
                    <a href="#">
                        <i class="fa fa-star"></i>
                        <span>تعاریف پایه</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">

                        @can('نوع محصول','شکل محصول','شاخص محصول','ابعاد محصول','محصول','قطعه مونتاژی')
                            <li class="treeview" id="basic_li_product_all">
                                <a href="#"><i class="fa fa-circle-o"></i>تعاریف محصول
                                    <span class="pull-left-container">
                  <i class="fa fa-angle-right pull-left"></i>
                </span>
                                </a>
                                <ul class="treeview-menu">
                                    @can('نوع محصول')
                                        <li id="basic_li_product_type">
                                            <a href="{{route('product_type')}}"><i class="fa fa-circle-o"></i> نوع محصول
                                            </a>
                                        </li>
                                    @endcan
                                    @can('شکل محصول')
                                        <li id="basic_li_product_shape">
                                            <a href="{{route('product_shape')}}"><i class="fa fa-circle-o"></i> شکل
                                                محصول
                                            </a>
                                        </li>
                                    @endcan
                                    @can('شاخص محصول')
                                        <li id="basic_li_product_index">
                                            <a href="{{route('product_index')}}"><i class="fa fa-circle-o"></i> شاخص
                                                محصول
                                            </a>
                                        </li>
                                    @endcan
                                    @can('ابعاد محصول')
                                        <li id="basic_li_product_dim">
                                            <a href="{{route('product_dim')}}"><i class="fa fa-circle-o"></i> ابعاد
                                                محصول
                                            </a>
                                        </li>
                                    @endcan
                                    @can('محصول')
                                        <li id="basic_li_product">
                                            <a href="{{route('product')}}"><i class="fa fa-circle-o"></i> محصول </a>
                                        </li>
                                    @endcan
                                    @can('قطعه مونتاژی')
                                        <li id="basic_li_product_accessories">
                                            <a href="{{route('product_accessories')}}"><i class="fa fa-circle-o"></i>
                                                قطعه
                                                مونتاژی
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan


                        @can('رنگ','مستربچ','رنگ و مستربچ','مواد','گرید مواد','پتروشیمی','درجه کیفی مواد','مواد اولیه')
                            <li class="treeview" id="basic_li_material_all">
                                <a href="#"><i class="fa fa-circle-o"></i>تعاریف مواد
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
                                            <a href="{{route('color_masterbatch')}}"><i class="fa fa-circle-o"></i> رنگ
                                                و مستربچ</a>
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
                                            <a href="{{route('petrochemical')}}"><i class="fa fa-circle-o"></i> پتروشیمی
                                            </a>
                                        </li>
                                    @endcan
                                    @can('درجه کیفی مواد')
                                        <li id="basic_li_quality_materials">
                                            <a href="{{route('quality_materials')}}"><i class="fa fa-circle-o"></i> درجه
                                                کیفی مواد
                                            </a>
                                        </li>
                                    @endcan
                                    @can('مواد اولیه')
                                        <li id="basic_li_early_materials">
                                            <a href="{{route('early_materials')}}"><i class="fa fa-circle-o"></i> مواد
                                                اولیه
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan

                        @can('نوع ملزومات','ملزومات بسته بندی','تامیین کننده','بسته بندی محصولات')
                            <li class="treeview" id="basic_li_essentials_all">
                                <a href="#"><i class="fa fa-circle-o"></i>تعاریف ملزومات
                                    <span class="pull-left-container">
                  <i class="fa fa-angle-right pull-left"></i>
                </span>
                                </a>
                                <ul class="treeview-menu">
                                    @can('نوع ملزومات')
                                        <li id="basic_li_essentials_packing_type">
                                            <a href="{{route('essentials_packing_type')}}"><i
                                                    class="fa fa-circle-o"></i>
                                                نوع ملزومات</a>
                                        </li>
                                    @endcan
                                    @can('ملزومات بسته بندی')
                                        <li id="basic_li_essentials_packing">
                                            <a href="{{route('essentials_packing')}}"><i
                                                    class="fa fa-circle-o"></i>
                                                ملزومات بسته بندی</a>
                                        </li>
                                    @endcan
                                    @can('تامیین کننده')
                                        <li id="basic_li_essentials_dealers">
                                            <a href="{{route('essentials_dealers')}}"><i
                                                    class="fa fa-circle-o"></i>
                                                تامیین کننده</a>
                                        </li>
                                    @endcan

                                    @can('بسته بندی محصولات')
                                        <li id="basic_li_product_packing">
                                            <a href="{{route('product_packing')}}"><i
                                                    class="fa fa-circle-o"></i>
                                                بسته بندی محصولات</a>
                                        </li>
                                    @endcan

                                </ul>
                            </li>
                        @endcan

                        @can('صنایع','مناطق','مشتری','برند مشتریان','نماینده مشتری')
                            <li class="treeview" id="basic_li_customers_all">
                                <a href="#"><i class="fa fa-circle-o"></i>تعاریف مشتریان
                                    <span class="pull-left-container">
                  <i class="fa fa-angle-right pull-left"></i>
                </span>
                                </a>
                                <ul class="treeview-menu">

                                    @can('مشتری')
                                        <li id="basic_li_customers">
                                            <a href="{{route('customers')}}"><i
                                                    class="fa fa-circle-o"></i>
                                                مشتری</a>
                                        </li>
                                    @endcan

                                    @can('برند مشتریان')
                                        <li id="basic_li_customers_brands">
                                            <a href="{{route('customers_brands')}}"><i
                                                    class="fa fa-circle-o"></i>
                                                برند مشتریان</a>
                                        </li>
                                    @endcan

                                        @can('نماینده مشتری')
                                            <li id="basic_li_customers_agent">
                                                <a href="{{route('customers_agent')}}"><i
                                                        class="fa fa-circle-o"></i>
                                                    نماینده مشتری</a>
                                            </li>
                                        @endcan
                                    @can('صنایع')
                                        <li id="basic_li_industrial">
                                            <a href="{{route('industrial')}}"><i
                                                    class="fa fa-circle-o"></i>
                                                صنایع</a>
                                        </li>
                                    @endcan

                                    @can('مناطق')
                                        <li id="basic_li_state_city">
                                            <a href="{{route('state_city')}}"><i
                                                    class="fa fa-circle-o"></i>
                                                مناطق</a>
                                        </li>
                                    @endcan

                                </ul>
                            </li>
                        @endcan


                        @can('چاپخانه')
                            <li id="basic_li_printing_house">
                                <a href="{{route('printing_house')}}"><i class="fa fa-circle-o"></i> چاپخانه </a>
                            </li>
                        @endcan


                    </ul>
                </li>
            @endcan
        </ul>
    </section>
</aside>
