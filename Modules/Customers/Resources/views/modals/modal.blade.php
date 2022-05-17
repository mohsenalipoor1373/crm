<div class="modal fade" id="add-customers" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog col-md-12">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ثبت اطلاعات مشتری</h7>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" role="form"
                              autocomplete="off" id="form_add_customers">
                            @csrf
                            <div class="box-body">


                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="code">کد</label>
                                        <input type="text"
                                               class="form-control" id="code"
                                               name="code" placeholder="کد">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="name">نام</label>
                                        <input type="text"
                                               class="form-control" id="name"
                                               name="name" placeholder="نام">
                                    </div>


                                    <div class="col-md-3">
                                        <label for="seller_id">فروشنده</label>
                                        <br/>
                                        <select style="width: 100%" dir="rtl" class="form-control seller_id"
                                                id="seller_id" name="seller_id">
                                            <option value="">انتخاب کنید</option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}} {{$user->fname}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col-md-3">
                                        <label for="designer_id">طراح لیبل</label>
                                        <br/>
                                        <select style="width: 100%" dir="rtl" class="form-control designer_id"
                                                id="designer_id" name="designer_id">
                                            <option value="">انتخاب کنید</option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}} {{$user->fname}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="designer_id">صنعت</label>
                                        <br/>
                                        <select style="width: 100%" dir="rtl" class="form-control industrial_id"
                                                id="industrial_id" name="industrial_id">
                                            <option value="">انتخاب کنید</option>
                                            @foreach($industrials as $industrial)
                                                <option value="{{$industrial->id}}">{{$industrial->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="state_city_id">منطقه</label>
                                        <br/>
                                        <select style="width: 100%" dir="rtl" class="form-control state_city_id"
                                                id="state_city_id" name="state_city_id">
                                            <option value="">انتخاب کنید</option>
                                            @foreach($state_citys as $state_city)
                                                <option value="{{$state_city->id}}">{{$state_city->country}}
                                                    _{{$state_city->state}}_{{$state_city->city}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="national_code">کد ملی</label>
                                        <input type="text"
                                               class="form-control" id="national_code"
                                               name="national_code" placeholder="کد ملی">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="economic_code">کد اقتصادی</label>
                                        <input type="text"
                                               class="form-control" id="economic_code"
                                               name="economic_code" placeholder="کد اقتصادی">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="tel_central_office">تلفن دفتر مرکزی</label>
                                        <input type="text"
                                               class="form-control" id="tel_central_office"
                                               name="tel_central_office" placeholder="تلفن دفتر مرکزی">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="tel_factory">تلفن کارخانه</label>
                                        <input type="text"
                                               class="form-control" id="tel_factory"
                                               name="tel_factory" placeholder="تلفن کارخانه">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="fax_central_office">فکس دفتر مرکزی</label>
                                        <input type="text"
                                               class="form-control" id="fax_central_office"
                                               name="fax_central_office" placeholder="فکس دفتر مرکزی">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="fax_factory">فکس کارخانه</label>
                                        <input type="text"
                                               class="form-control" id="fax_factory"
                                               name="fax_factory" placeholder="فکس کارخانه">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="address_central_office">آدرس دفتر مرکزی</label>
                                        <input type="text"
                                               class="form-control" id="address_central_office"
                                               name="address_central_office" placeholder="آدرس دفتر مرکزی">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="address_factory">آدرس کارخانه</label>
                                        <input type="text"
                                               class="form-control" id="address_factory"
                                               name="address_factory" placeholder="آدرس کارخانه">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="other_tel_central_office">سایر تلفن های دفتر مرکزی</label>
                                        <input type="text"
                                               class="form-control" id="other_tel_central_office"
                                               name="other_tel_central_office" placeholder="سایر تلفن های دفتر مرکزی">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="other_tel_factory">سایر تلفن های کارخانه</label>
                                        <input type="text"
                                               class="form-control" id="other_tel_factory"
                                               name="other_tel_factory" placeholder="سایر تلفن های کارخانه">
                                    </div>


                                </div>

                                <div class="form-group">


                                    <div class="col-md-3">
                                        <label for="credit_limit">سقف اعتبار</label>
                                        <input type="text"
                                               class="form-control" id="credit_limit"
                                               onkeyup="this.value=separate(this.value);"
                                               name="credit_limit" placeholder="سقف اعتبار">
                                    </div>


                                    <div class="col-md-3">
                                        <label for="open_account_ceiling">سقف حساب باز</label>
                                        <input type="text" onkeyup="this.value=separate(this.value);"
                                               class="form-control" id="open_account_ceiling"
                                               name="open_account_ceiling" placeholder="سقف حساب باز">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="maximum_allowed_order_check_mode">حداکثر سفارش مجاز در حالت چک</label>
                                        <input type="text" onkeyup="this.value=separate(this.value);"
                                               class="form-control" id="maximum_allowed_order_check_mode"
                                               name="maximum_allowed_order_check_mode"
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
                <a id="btn_add_customers" class="btn btn-primary btn_add_customers">ثبت</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="edit-customers" aria-hidden="true">
    <div class="modal-dialog col-md-12">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ویرایش اطلاعات مشتری</h7>
            </div>
            <div class="modal-body">
                <div id="load_modal" style="
                         position: fixed;
                         opacity: 0.95;
                         left: 0px;
                         top: 0px;
                         width: 100%;
                         height: 100%;
                         z-index: 999999;
                         background: url({{asset('assets/dist/img/ajax-loader.gif')}}) 50% 50% no-repeat #f5f5f5">
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
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}} {{$user->fname}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col-md-3">
                                        <label for="edit_designer_id">طراح لیبل</label>
                                        <br/>
                                        <select style="width: 100%" dir="rtl" class="form-control edit_designer_id"
                                                id="edit_designer_id" name="edit_designer_id">
                                            <option value="">انتخاب کنید</option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}} {{$user->fname}}</option>
                                            @endforeach
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
                                            @foreach($industrials as $industrial)
                                                <option value="{{$industrial->id}}">{{$industrial->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="edit_state_city_id">منطقه</label>
                                        <br/>
                                        <select style="width: 100%" dir="rtl" class="form-control edit_state_city_id"
                                                id="edit_state_city_id" name="edit_state_city_id">
                                            <option value="">انتخاب کنید</option>
                                            @foreach($state_citys as $state_city)
                                                <option value="{{$state_city->id}}">{{$state_city->country}}
                                                    _{{$state_city->state}}_{{$state_city->city}}</option>
                                            @endforeach
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
                                               name="edit_other_tel_central_office" placeholder="سایر تلفن های دفتر مرکزی">
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
                                        <label for="edit_maximum_allowed_order_check_mode">حداکثر سفارش مجاز در حالت چک</label>
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

