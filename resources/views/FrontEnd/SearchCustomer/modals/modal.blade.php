<div class="modal fade" id="add-events_customer" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog col-md-12">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ثبت اطلاعات رویداد</h7>
            </div>
            <div class='nav-tabs-custom'>
                <ul class='nav nav-tabs'>
                    <li class='active'><a href='#events' data-toggle='tab'>مشخصات رویداد</a></li>
                    <li><a href='#events_detail_table' data-toggle='tab'>جزییات رویداد</a></li>
                </ul>
                <div class='tab-content'>
                    <div class='active tab-pane' id='events'>
                        <div style="margin-top: -20px">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form method="POST" enctype="multipart/form-data" role="form"
                                              autocomplete="off" id="form_add_events_customer">
                                            @csrf
                                            <input type="hidden" id="customer_id" name="customer_id" value="{{$id}}">
                                            <div class="box-body">
                                                <div class="form-group">

                                                    <div class="col-md-3">
                                                        <label for="date">تاریخ</label>
                                                        <input type="text"
                                                               class="form-control"
                                                               id="date" name="date" placeholder="تاریخ">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="events_type_id">نوع رویداد</label>
                                                        <br/>
                                                        <select style="width: 100%" dir="rtl"
                                                                class="form-control events_type_id"
                                                                id="events_type_id" name="events_type_id">
                                                            <option value="">انتخاب کنید</option>
                                                            @foreach($events_types as $events_type)
                                                                <option
                                                                    value="{{$events_type->id}}">{{$events_type->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="events_subject_id">موضوع رویداد</label>
                                                        <br/>
                                                        <select style="width: 100%" dir="rtl"
                                                                class="form-control events_subject_id"
                                                                id="events_subject_id" name="events_subject_id">
                                                            <option value="">انتخاب کنید</option>
                                                            @foreach($events_subjects as $events_subject)
                                                                <option
                                                                    value="{{$events_subject->id}}">{{$events_subject->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label for="events_result_id">نتیجه رویداد</label>
                                                        <br/>
                                                        <select style="width: 100%" dir="rtl"
                                                                class="form-control events_result_id"
                                                                id="events_result_id" name="events_result_id">
                                                            <option value="">انتخاب کنید</option>
                                                            @foreach($events_results as $events_result)
                                                                <option
                                                                    value="{{$events_result->id}}">{{$events_result->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>


                                                <div class="form-group">

                                                    <div class="col-md-3">
                                                        <label for="events_result_reason_id">دلیل رویداد</label>
                                                        <br/>
                                                        <select style="width: 100%" dir="rtl"
                                                                class="form-control events_result_reason_id"
                                                                id="events_result_reason_id"
                                                                name="events_result_reason_id">
                                                            <option value="">انتخاب کنید</option>
                                                            @foreach($events_result_reasons as $events_result_reason)
                                                                <option
                                                                    value="{{$events_result_reason->id}}">{{$events_result_reason->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label for="negotiator_id">مذاکره کننده</label>
                                                        <br/>
                                                        <select style="width: 100%" dir="rtl"
                                                                class="form-control negotiator_id"
                                                                id="negotiator_id" name="negotiator_id">
                                                            <option value="">انتخاب کنید</option>
                                                            @foreach($users as $user)
                                                                <option
                                                                    value="{{$user->id}}">{{$user->name}} {{$user->fname}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label for="negotiator_name">نام طرف مذاکره کننده</label>
                                                        <input type="text" class="form-control"
                                                               id="negotiator_name" name="negotiator_name"
                                                               placeholder="نام طرف مذاکره کننده">
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label for="negotiator_phone">تلفن طرف مذاکره کننده</label>
                                                        <input type="text" class="form-control"
                                                               id="negotiator_phone" name="negotiator_phone"
                                                               placeholder="تلفن طرف مذاکره کننده">
                                                    </div>


                                                </div>


                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label for="order_number">شماره سفارش مرتبط</label>
                                                        <input type="text" class="form-control"
                                                               id="order_number" name="order_number"
                                                               placeholder="شماره سفارش مرتبط">
                                                    </div>


                                                </div>


                                                <div class="form-group">

                                                    <div class="col-md-12">
                                                        <label for="negotiator_text">شرح مذاکره</label>

                                                        <textarea class="form-control" name="negotiator_text"
                                                                  id="negotiator_text"
                                                                  rows="3"></textarea>
                                                    </div>


                                                </div>


                                                <div class="form-group">


                                                    <div class="col-md-12">
                                                        <label for="events_file">فایل پیوست</label>

                                                        <div class="dropzone" name="events_file" id="events_file"></div>


                                                    </div>


                                                </div>


                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف
                                </button>
                                <a id="btn_add_events_customer" class="btn btn-primary btn_add_events_customer">ثبت</a>
                            </div>
                        </div>

                    </div>
                    <div class='tab-pane' id='events_detail_table'>
                        <table id='data-table' class='table table-bordered table-striped text-center data-tablee'
                               style='width:100%'>
                            <thead>
                            <tr>
                                <th class='text-center' colspan='20' style='background-color: #cddbf6'>جزییات رویداد
                                </th>
                            </tr>
                            <tr style='background-color: #e5e5e5'>
                                <th>ردیف</th>
                                <th>شرح</th>
                                <th>پیوست</th>
                                <th>ابزار</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <a class='btn btn-primary add_events_customer_attach' id='add_events_customer_attach'
                        >افزودن</a>
                    </div>
                </div>

            </div>


        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="edit-events_customer" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog col-md-12">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ویرایش اطلاعات رویداد</h7>
            </div>
            <div id="load_modal_events_customer" style="
                         position: fixed;
                         opacity: 0.95;
                         left: 0px;
                         top: 0px;
                         width: 100%;
                         height: 100%;
                         z-index: 999999;
                         background: url({{asset('/public/assets/dist/img/ajax-loader.gif')}}) 50% 50% no-repeat #f5f5f5">
            </div>
            <div class='nav-tabs-custom'>
                <ul class='nav nav-tabs'>
                    <li class='active'><a href='#edit_events' data-toggle='tab'>مشخصات رویداد</a></li>
                    <li><a href='#edit_events_detail_table' data-toggle='tab'>جزییات رویداد</a></li>
                </ul>
                <div class='tab-content'>
                    <div class='active tab-pane' id='edit_events'>
                        <div style="margin-top: -20px">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form method="POST" enctype="multipart/form-data" role="form"
                                              autocomplete="off" id="form_edit_events_customer">
                                            @csrf
                                            <input type="hidden" id="customer_id" name="customer_id" value="{{$id}}">
                                            <input type="hidden" id="edit_id_events_customer"
                                                   name="edit_id_events_customer">
                                            <div class="box-body">
                                                <div class="form-group">

                                                    <div class="col-md-3">
                                                        <label for="edit_date">تاریخ</label>
                                                        <input type="text"
                                                               class="form-control"
                                                               id="edit_date" name="edit_date" placeholder="تاریخ">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="edit_events_type_id">نوع رویداد</label>
                                                        <br/>
                                                        <select style="width: 100%" dir="rtl"
                                                                class="form-control edit_events_type_id"
                                                                id="edit_events_type_id" name="edit_events_type_id">

                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="edit_events_subject_id">موضوع رویداد</label>
                                                        <br/>
                                                        <select style="width: 100%" dir="rtl"
                                                                class="form-control edit_events_subject_id"
                                                                id="edit_events_subject_id"
                                                                name="edit_events_subject_id">

                                                        </select>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label for="edit_events_result_id">نتیجه رویداد</label>
                                                        <br/>
                                                        <select style="width: 100%" dir="rtl"
                                                                class="form-control edit_events_result_id"
                                                                id="edit_events_result_id" name="edit_events_result_id">

                                                        </select>
                                                    </div>

                                                </div>


                                                <div class="form-group">

                                                    <div class="col-md-3">
                                                        <label for="edit_events_result_reason_id">دلیل رویداد</label>
                                                        <br/>
                                                        <select style="width: 100%" dir="rtl"
                                                                class="form-control edit_events_result_reason_id"
                                                                id="edit_events_result_reason_id"
                                                                name="edit_events_result_reason_id">

                                                        </select>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label for="edit_negotiator_id">مذاکره کننده</label>
                                                        <br/>
                                                        <select style="width: 100%" dir="rtl"
                                                                class="form-control edit_negotiator_id"
                                                                id="edit_negotiator_id" name="edit_negotiator_id">

                                                        </select>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label for="edit_negotiator_name">نام طرف مذاکره کننده</label>
                                                        <input type="text" class="form-control"
                                                               id="edit_negotiator_name" name="edit_negotiator_name"
                                                               placeholder="نام طرف مذاکره کننده">
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label for="edit_negotiator_phone">تلفن طرف مذاکره کننده</label>
                                                        <input type="text" class="form-control"
                                                               id="edit_negotiator_phone" name="edit_negotiator_phone"
                                                               placeholder="تلفن طرف مذاکره کننده">
                                                    </div>
                                                </div>


                                                <div class="form-group">


                                                    <div class="col-md-3">
                                                        <label for="edit_order_number">شماره سفارش مرتبط</label>
                                                        <input type="text" class="form-control"
                                                               id="edit_order_number" name="edit_order_number"
                                                               placeholder="شماره سفارش مرتبط">
                                                    </div>


                                                </div>
                                                <div class="form-group">

                                                    <div class="col-md-12">
                                                        <label for="edit_negotiator_text">شرح مذاکره</label>
                                                        <input type="text" class="form-control"
                                                               id="edit_negotiator_text" name="edit_negotiator_text"
                                                               placeholder="شرح مذاکره">
                                                    </div>


                                                </div>

                                                <div class="form-group">


                                                    <div class="col-md-12">
                                                        <label for="edit_events_file">فایل پیوست</label>

                                                        <div class="dropzone" name="edit_events_file"
                                                             id="edit_events_file"></div>


                                                    </div>


                                                </div>


                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف
                                </button>
                                <a id="btn_edit_events_customer"
                                   class="btn btn-primary btn_edit_events_customer">ثبت</a>
                            </div>
                        </div>

                    </div>
                    <div class='tab-pane' id='edit_events_detail_table'>

                    </div>
                </div>

            </div>


        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="edit-customers" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog col-md-12">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ویرایش اطلاعات مشتری</h7>
            </div>
            <div class="modal-body">
                <div class="load_modal" id="load_modal" style="
                         position: fixed;
                         opacity: 0.95;
                         left: 0px;
                         top: 0px;
                         width: 100%;
                         height: 100%;
                         z-index: 999999;
                         background: url({{asset('/public/assets/dist/img/ajax-loader.gif')}}) 50% 50% no-repeat #f5f5f5">
                </div>
                <div id="ajaxContentDemo" class="row d-none">
                    <div class="col-md-12">

                        <form method="POST" enctype="multipart/form-data" role="form"
                              autocomplete="off" id="form_edit_customers">
                            @csrf
                            <input type="hidden" id="id" name="id">
                            <div class="box-body">


                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="edit_code">کد</label>
                                        <input type="text"
                                               class="form-control" id="edit_code"
                                               name="edit_code" placeholder="کد">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="edit_name">نام</label>
                                        <input type="text"
                                               class="form-control" id="edit_name"
                                               name="edit_name" placeholder="نام">
                                    </div>


                                    <div class="col-md-3">
                                        <label for="edit_seller_id">فروشنده</label>
                                        <br/>
                                        <select style="width: 100%" dir="rtl" class="form-control edit_seller_id"
                                                id="edit_seller_id" name="edit_seller_id">
                                            <option value="">انتخاب کنید</option>

                                        </select>
                                    </div>


                                    <div class="col-md-3">
                                        <label for="edit_designer_id">طراح لیبل</label>
                                        <br/>
                                        <select style="width: 100%" dir="rtl" class="form-control edit_designer_id"
                                                id="edit_designer_id" name="edit_designer_id">
                                            <option value="">انتخاب کنید</option>

                                        </select>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="edit_industrial_id">صنعت</label>
                                        <br/>
                                        <select style="width: 100%" dir="rtl" class="form-control edit_industrial_id"
                                                id="edit_industrial_id" name="edit_industrial_id">
                                            <option value="">انتخاب کنید</option>

                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="edit_state_city_id">منطقه</label>
                                        <br/>
                                        <select style="width: 100%" dir="rtl" class="form-control edit_state_city_id"
                                                id="edit_state_city_id" name="edit_state_city_id">
                                            <option value="">انتخاب کنید</option>

                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="edit_national_code">کد ملی</label>
                                        <input type="text"
                                               class="form-control" id="edit_national_code"
                                               name="edit_national_code" placeholder="کد ملی">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="edit_economic_code">کد اقتصادی</label>
                                        <input type="text"
                                               class="form-control" id="edit_economic_code"
                                               name="edit_economic_code" placeholder="کد اقتصادی">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="edit_tel_central_office">تلفن دفتر مرکزی</label>
                                        <input type="text"
                                               class="form-control" id="edit_tel_central_office"
                                               name="edit_tel_central_office" placeholder="تلفن دفتر مرکزی">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="edit_tel_factory">تلفن کارخانه</label>
                                        <input type="text"
                                               class="form-control" id="edit_tel_factory"
                                               name="edit_tel_factory" placeholder="تلفن کارخانه">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="edit_fax_central_office">فکس دفتر مرکزی</label>
                                        <input type="text"
                                               class="form-control" id="edit_fax_central_office"
                                               name="edit_fax_central_office" placeholder="فکس دفتر مرکزی">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="edit_fax_factory">فکس کارخانه</label>
                                        <input type="text"
                                               class="form-control" id="edit_fax_factory"
                                               name="edit_fax_factory" placeholder="فکس کارخانه">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="edit_address_central_office">آدرس دفتر مرکزی</label>
                                        <input type="text"
                                               class="form-control" id="edit_address_central_office"
                                               name="edit_address_central_office" placeholder="آدرس دفتر مرکزی">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="edit_address_factory">آدرس کارخانه</label>
                                        <input type="text"
                                               class="form-control" id="edit_address_factory"
                                               name="edit_address_factory" placeholder="آدرس کارخانه">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="edit_other_tel_central_office">سایر تلفن های دفتر مرکزی</label>
                                        <input type="text"
                                               class="form-control" id="edit_other_tel_central_office"
                                               name="edit_other_tel_central_office"
                                               placeholder="سایر تلفن های دفتر مرکزی">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="edit_other_tel_factory">سایر تلفن های کارخانه</label>
                                        <input type="text"
                                               class="form-control" id="edit_other_tel_factory"
                                               name="edit_other_tel_factory" placeholder="سایر تلفن های کارخانه">
                                    </div>


                                </div>

                                <div class="form-group">

                                    <div class="col-md-3">
                                        <label for="edit_credit_limit">سقف اعتبار</label>
                                        <input type="text"
                                               class="form-control" id="edit_credit_limit"
                                               onkeyup="this.value=separate(this.value);"
                                               name="edit_credit_limit" placeholder="سقف اعتبار">
                                    </div>


                                    <div class="col-md-3">
                                        <label for="edit_open_account_ceiling">سقف حساب باز</label>
                                        <input type="text" onkeyup="this.value=separate(this.value);"
                                               class="form-control" id="edit_open_account_ceiling"
                                               name="edit_open_account_ceiling" placeholder="سقف حساب باز">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="edit_maximum_allowed_order_check_mode">حداکثر سفارش مجاز در حالت
                                            چک</label>
                                        <input type="text" onkeyup="this.value=separate(this.value);"
                                               class="form-control" id="edit_maximum_allowed_order_check_mode"
                                               name="edit_maximum_allowed_order_check_mode"
                                               placeholder="حداکثر سفارش مجاز در حالت چک">
                                    </div>


                                </div>


                            </div>
                        </form>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_edit_customers" class="btn btn-primary btn_edit_customers">ثبت</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-customers_brands" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ثبت اطلاعات برند مشتری</h7>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" role="form"
                              autocomplete="off" id="form_add_customers_brands">
                            @csrf
                            <div class="box-body">


                                <div class="form-group">
                                    <label for="code">کد</label>
                                    <input type="text"
                                           class="form-control" id="code" name="code" placeholder="کد">
                                </div>

                                <div class="form-group">
                                    <label for="customer_id">مشتری</label>
                                    <br/>
                                    <select style="width: 100%" dir="rtl"
                                            class="form-control customer_id_brands"
                                            id="customer_id" name="customer_id">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($customer_all as $customer_item)
                                            <option value="{{$customer_item->id}}">{{$customer_item->name}}
                                                _{{$customer_item->code}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="name">نام برند</label>
                                    <input type="text"
                                           class="form-control" id="name" name="name" placeholder="نام برند">
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_add_customers_brands" class="btn btn-primary btn_add_customers_brands">ثبت</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="edit-customers_brands" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ویرایش اطلاعات برند مشتری</h7>
            </div>
            <div class="modal-body">
                <div id="load_modal_brands" style="
                         position: fixed;
                         opacity: 0.95;
                         left: 0px;
                         top: 0px;
                         width: 100%;
                         height: 100%;
                         z-index: 999999;
                         background: url({{asset('/public/assets/dist/img/ajax-loader.gif')}}) 50% 50% no-repeat #f5f5f5">
                </div>
                <div id="ajaxContentDemo" class="row d-none">
                    <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" role="form"
                              autocomplete="off" id="form_edit_customers_brands">
                            @csrf
                            <input type="hidden" class="id_brands" id="id" name="id">
                            <div class="box-body">


                                <div class="form-group">
                                    <label for="edit_code">کد</label>
                                    <input type="text"
                                           class="form-control edit_code_brands" id="edit_code"
                                           name="edit_code" placeholder="کد">
                                </div>

                                <div class="form-group">
                                    <label for="edit_customer_id">مشتری</label>
                                    <br/>
                                    <select style="width: 100%" dir="rtl"
                                            class="form-control edit_customer_id_brands"
                                            id="edit_customer_id" name="edit_customer_id">
                                        <option value="">انتخاب کنید</option>

                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="edit_name">نام برند</label>
                                    <input type="text"
                                           class="form-control edit_name_brands" id="edit_name"
                                           name="edit_name" placeholder="نام برند">
                                </div>


                            </div>
                        </form>


                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_edit_customers_brands" class="btn btn-primary btn_edit_customers_brands">ثبت</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-customers_agent" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ثبت اطلاعات نماینده مشتری</h7>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" role="form"
                              autocomplete="off" id="form_add_customers_agent">
                            @csrf
                            <div class="box-body">


                                <div class="form-group">
                                    <label for="code">کد</label>
                                    <input type="text"
                                           class="form-control" id="code" name="code" placeholder="کد">
                                </div>

                                <div class="form-group">
                                    <label for="customer_id">مشتری</label>
                                    <br/>
                                    <select style="width: 100%" dir="rtl"
                                            class="form-control customer_id_agents"
                                            id="customer_id" name="customer_id">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($customer_all as $customer_item)
                                            <option value="{{$customer_item->id}}">{{$customer_item->name}}
                                                _{{$customer_item->code}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="name">نام نماینده</label>
                                    <input type="text"
                                           class="form-control" id="name" name="name" placeholder="نام نماینده">
                                </div>

                                <div class="form-group">
                                    <label for="side">سمت</label>
                                    <input type="text"
                                           class="form-control" id="side" name="side" placeholder="سمت">
                                </div>

                                <div class="form-group">
                                    <label for="phone">شماره تماس</label>
                                    <input type="text"
                                           class="form-control" id="phone" name="phone" placeholder="شماره تماس">
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_add_customers_agent" class="btn btn-primary btn_add_customers_agent">ثبت</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="edit-customers_agent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ویرایش اطلاعات نماینده مشتری</h7>
            </div>
            <div class="modal-body">
                <div id="load_modal_agents" style="
                         position: fixed;
                         opacity: 0.95;
                         left: 0px;
                         top: 0px;
                         width: 100%;
                         height: 100%;
                         z-index: 999999;
                         background: url({{asset('/public/assets/dist/img/ajax-loader.gif')}}) 50% 50% no-repeat #f5f5f5">
                </div>
                <div id="ajaxContentDemo" class="row d-none">
                    <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" role="form"
                              autocomplete="off" id="form_edit_customers_agent">
                            @csrf
                            <input type="hidden" class="id_agents" id="id" name="id">
                            <div class="box-body">


                                <div class="form-group">
                                    <label for="edit_code">کد</label>
                                    <input type="text"
                                           class="form-control edit_code_agents" id="edit_code" name="edit_code"
                                           placeholder="کد">
                                </div>

                                <div class="form-group">
                                    <label for="edit_customer_id">مشتری</label>
                                    <br/>
                                    <select style="width: 100%" dir="rtl"
                                            class="form-control edit_customer_id_agents"
                                            id="edit_customer_id" name="edit_customer_id">
                                        <option value="">انتخاب کنید</option>

                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="edit_name">نام نماینده</label>
                                    <input type="text"
                                           class="form-control edit_name_agents" id="edit_name"
                                           name="edit_name" placeholder="نام نماینده">
                                </div>

                                <div class="form-group">
                                    <label for="edit_side">سمت</label>
                                    <input type="text"
                                           class="form-control edit_side_agents" id="edit_side" name="edit_side"
                                           placeholder="سمت">
                                </div>

                                <div class="form-group">
                                    <label for="edit_phone">شماره تماس</label>
                                    <input type="text"
                                           class="form-control edit_phone_agents" id="edit_phone" name="edit_phone"
                                           placeholder="شماره تماس">
                                </div>


                            </div>
                        </form>


                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_edit_customers_agent" class="btn btn-primary btn_edit_customers_agent">ثبت</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-events_customer_attach" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ثبت جزییات رویداد</h7>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" role="form"
                              autocomplete="off" id="form_add_events_customer_attach">
                            @csrf
                            <input type="hidden" id="id_events_customers" name="id_events_customers">
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="text">شرح</label>
                                    <input type="text"
                                           class="form-control" id="text" name="text" placeholder="شرح">
                                </div>
                                <div class="form-group">


                                    <label for="events_file">فایل پیوست</label>

                                    <div class="dropzone" name="events_file_detail" id="events_file_detail"></div>


                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_add_events_customer_attach" class="btn btn-primary btn_add_events_customer_attach">ثبت</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="edit-events_customer_attach" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ویرایش جزییات رویداد</h7>
            </div>
            <div class="modal-body">
                <div id="load_modal_edit_events_customer_attach" style="
                         position: fixed;
                         opacity: 0.95;
                         left: 0px;
                         top: 0px;
                         width: 100%;
                         height: 100%;
                         z-index: 999999;
                         background: url({{asset('/public/assets/dist/img/ajax-loader.gif')}}) 50% 50% no-repeat #f5f5f5">
                </div>
                <div id="ajaxContentDemo" class="row d-none">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" enctype="multipart/form-data" role="form"
                                  autocomplete="off" id="form_edit_events_customer_attach">
                                @csrf
                                <input type="hidden" id="id_events_customers" name="id_events_customers">
                                <input type="hidden" id="edit_id_events_customers" name="edit_id_events_customers">
                                <div class="box-body">

                                    <div class="form-group">
                                        <label for="edit_text">شرح</label>
                                        <input type="text"
                                               class="form-control" id="edit_text" name="edit_text" placeholder="شرح">
                                    </div>
                                    <div class="form-group">


                                        <label for="events_file">فایل پیوست</label>

                                        <div class="dropzone" name="edit_events_file_detail"
                                             id="edit_events_file_detail"></div>


                                    </div>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_edit_events_customer_attach" class="btn btn-primary btn_edit_events_customer_attach">ثبت</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="see_customers_events_detail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">فایلهای پیوست جزییات رویداد</h7>
            </div>
            <div class="modal-body">
                <div id="load_modal_see_customers_events_detail" style="
                         position: fixed;
                         opacity: 0.95;
                         left: 0px;
                         top: 0px;
                         width: 100%;
                         height: 100%;
                         z-index: 999999;
                         background: url({{asset('/public/assets/dist/img/ajax-loader.gif')}}) 50% 50% no-repeat #f5f5f5">
                </div>
                <div id="ajaxContentDemo" class="row d-none">
                    <div id="table_see_customers_events_detail">
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="add-reminder" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog col-md-12">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">اعلانهای مشتری</h7>
            </div>
            <div class="modal-body">
                <div id="load_modal_add_reminder" style="
                         position: fixed;
                         opacity: 0.95;
                         left: 0px;
                         top: 0px;
                         width: 100%;
                         height: 100%;
                         z-index: 999999;
                         background: url({{asset('/public/assets/dist/img/ajax-loader.gif')}}) 50% 50% no-repeat #f5f5f5">
                </div>
                <div id="ajaxContentDemo" class="row d-none">
                    <div class="col-md-12">

                        <div class="box-body" id="table_reminder">

                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_add_reminder" class="btn btn-primary btn_add_reminder">ثبت اعلان جدید</a>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="add-reminder_form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog col-md-12">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ثبت اطلاعات اعلان</h7>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" role="form"
                              autocomplete="off" id="form_add_reminder">
                            @csrf
                            <input type="hidden" id="id_customer_reminder" name="id_customer_reminder" value="{{$id}}">
                            <div class="box-body">


                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="date_in">از تاریخ</label>
                                        <input type="text"
                                               class="form-control" id="date_in" name="date_in" placeholder="از تاریخ">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="time_in">از ساعت</label>
                                        <input type="text"
                                               class="form-control" id="time_in" name="time_in" placeholder="از ساعت">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="date_to">تا تاریخ</label>
                                        <input type="text"
                                               class="form-control" id="date_to" name="date_to" placeholder="تا تاریخ">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="time_to">تا ساعت</label>
                                        <input type="text"
                                               class="form-control" id="time_to" name="time_to" placeholder="تا ساعت">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="title">عنوان</label>
                                        <input type="text"
                                               class="form-control" id="title" name="title" placeholder="عنوان">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="repeat">نوع تکرار</label>
                                        <select style="width: 100%" dir="rtl"
                                                class="form-control repeat"
                                                id="repeat" name="repeat">
                                            <option value="">انتخاب کنید</option>
                                            <option value="1">یکبار</option>
                                            <option value="2">روزانه</option>
                                            <option value="3">هفتگی</option>
                                            <option value="4">ماهانه</option>
                                        </select>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="latest_show">زمان نمایش مانده به پایان(دقیقه)</label>
                                        <input type="number"
                                               class="form-control" id="latest_show" name="latest_show"
                                               placeholder="زمان نمایش مانده به پایان(دقیقه)">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="show_time_day">ساعت نمایش</label>
                                        <input type="text"
                                               class="form-control" id="show_time_day" name="show_time_day"
                                               placeholder="ساعت نمایش">
                                    </div>


                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="show_day">روز نمایش</label>
                                        <select style="width: 100%" dir="rtl"
                                                class="form-control show_day"
                                                id="show_day" name="show_day">
                                            <option value="">انتخاب کنید</option>
                                            <option value="1">شنبه</option>
                                            <option value="2">یکشنبه</option>
                                            <option value="3">دوشنبه</option>
                                            <option value="4">سه شنبه</option>
                                            <option value="5">چهارشنبه</option>
                                            <option value="6">پنچشنبه</option>
                                            <option value="7">جمعه</option>
                                        </select>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="daily_reminder">یاداور روزانه</label>
                                        <input type="number"
                                               class="form-control" id="daily_reminder" name="daily_reminder"
                                               placeholder="یاداور روزانه">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="hourly_reminder">یاداور ساعتی</label>
                                        <input type="number"
                                               class="form-control" id="hourly_reminder" name="hourly_reminder"
                                               placeholder="یاداور ساعتی">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="link">لینک</label>
                                        <input type="text"
                                               class="form-control" id="link" name="link"
                                               placeholder="لینک">
                                    </div>


                                </div>

                                <div class="form-group">

                                    <div class="col-md-12">
                                        <label for="text">متن</label>
                                        <textarea class="form-control" name="text"
                                                  id="text"
                                                  rows="3"></textarea>
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_post_reminder" class="btn btn-primary btn_post_reminder">ثبت</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="edit-reminder_form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog col-md-12">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ثبت اطلاعات اعلان</h7>
            </div>
            <div class="modal-body">
                <div id="load_modal_edit_reminder_form" style="
                         position: fixed;
                         opacity: 0.95;
                         left: 0px;
                         top: 0px;
                         width: 100%;
                         height: 100%;
                         z-index: 999999;
                         background: url({{asset('/public/assets/dist/img/ajax-loader.gif')}}) 50% 50% no-repeat #f5f5f5">
                </div>
                <div id="ajaxContentDemo" class="row d-none">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" role="form"
                              autocomplete="off" id="form_edit_reminder">
                            @csrf
                            <input type="hidden" id="id_customer_reminder" name="id_customer_reminder" value="{{$id}}">
                            <input type="hidden" id="id_edit_reminder" name="id_edit_reminder">
                            <div class="box-body">


                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="edit_date_in">از تاریخ</label>
                                        <input type="text"
                                               class="form-control" id="edit_date_in" name="edit_date_in" placeholder="از تاریخ">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_time_in">از ساعت</label>
                                        <input type="text"
                                               class="form-control" id="edit_time_in" name="edit_time_in" placeholder="از ساعت">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_date_to">تا تاریخ</label>
                                        <input type="text"
                                               class="form-control" id="edit_date_to" name="edit_date_to" placeholder="تا تاریخ">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_time_to">تا ساعت</label>
                                        <input type="text"
                                               class="form-control" id="edit_time_to" name="edit_time_to" placeholder="تا ساعت">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="edit_title">عنوان</label>
                                        <input type="text"
                                               class="form-control" id="edit_title" name="edit_title" placeholder="عنوان">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="repeat">نوع تکرار</label>
                                        <select style="width: 100%" dir="rtl"
                                                class="form-control edit_repeat"
                                                id="edit_repeat" name="edit_repeat">
                                            <option value="">انتخاب کنید</option>
                                            <option value="1">یکبار</option>
                                            <option value="2">روزانه</option>
                                            <option value="3">هفتگی</option>
                                            <option value="4">ماهانه</option>
                                        </select>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_latest_show">زمان نمایش مانده به پایان(دقیقه)</label>
                                        <input type="number"
                                               class="form-control" id="edit_latest_show" name="edit_latest_show"
                                               placeholder="زمان نمایش مانده به پایان(دقیقه)">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_show_time_day">ساعت نمایش</label>
                                        <input type="text"
                                               class="form-control" id="edit_show_time_day" name="edit_show_time_day"
                                               placeholder="ساعت نمایش">
                                    </div>


                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="edit_show_day">روز نمایش</label>
                                        <select style="width: 100%" dir="rtl"
                                                class="form-control edit_show_day"
                                                id="edit_show_day" name="edit_show_day">
                                            <option value="">انتخاب کنید</option>
                                            <option value="1">شنبه</option>
                                            <option value="2">یکشنبه</option>
                                            <option value="3">دوشنبه</option>
                                            <option value="4">سه شنبه</option>
                                            <option value="5">چهارشنبه</option>
                                            <option value="6">پنچشنبه</option>
                                            <option value="7">جمعه</option>
                                        </select>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_daily_reminder">یاداور روزانه</label>
                                        <input type="number"
                                               class="form-control" id="edit_daily_reminder" name="edit_daily_reminder"
                                               placeholder="یاداور روزانه">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_hourly_reminder">یاداور ساعتی</label>
                                        <input type="number"
                                               class="form-control" id="edit_hourly_reminder" name="edit_hourly_reminder"
                                               placeholder="یاداور ساعتی">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_link">لینک</label>
                                        <input type="text"
                                               class="form-control" id="edit_link" name="edit_link"
                                               placeholder="لینک">
                                    </div>


                                </div>

                                <div class="form-group">

                                    <div class="col-md-12">
                                        <label for="edit_text_d">متن</label>
                                        <textarea class="form-control" name="edit_text_d"
                                                  id="edit_text_d"
                                                  rows="3"></textarea>
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_edit_post_reminder" class="btn btn-primary btn_edit_post_reminder">ثبت</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>
