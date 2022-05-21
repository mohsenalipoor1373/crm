<div class="modal fade" id="add-setting_company" aria-hidden="true">
    <div class="modal-dialog col-md-12">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ثبت اطلاعات تنظیمات شرکت</h7>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" role="form"
                              autocomplete="off" id="form_add_setting_company">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="username">نام شرکت</label>
                                        <input type="text" class="form-control"
                                               id="name" name="name" placeholder="نام شرکت">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="tel_central_office">تلفن دفتر مرکزی</label>
                                        <input type="text" class="form-control"
                                               id="tel_central_office" name="tel_central_office" placeholder="تلفن دفتر مرکزی">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="fax_central_office">فکس دفتر مرکزی</label>
                                        <input type="text" class="form-control"
                                               id="fax_central_office" name="fax_central_office"
                                               placeholder="فکس دفتر مرکزی">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="office_email">ایمیل دفتر مرکزی</label>
                                        <input type="text" class="form-control"
                                               id="office_email" name="office_email"
                                               placeholder="ایمیل دفتر مرکزی">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="address_central_office">آدرس دفتر مرکزی</label>
                                        <input type="text" class="form-control"
                                               id="address_central_office" name="address_central_office" placeholder="آدرس دفتر مرکزی">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="factory_main_phone">تلفن اصلی کارخانه</label>
                                        <input type="text" class="form-control"
                                               id="factory_main_phone" name="factory_main_phone"
                                               placeholder="تلفن اصلی کارخانه">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="factory_fox">فکس کارخانه</label>
                                        <input type="text" class="form-control"
                                               id="factory_fox" name="factory_fox"
                                               placeholder="فکس کارخانه">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="factory_email">ایمیل کارخانه</label>
                                        <input type="text" class="form-control"
                                               id="factory_email" name="factory_email"
                                               placeholder="ایمیل کارخانه">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="factory_address">آدرس کارخانه</label>
                                        <input type="text" class="form-control"
                                               id="factory_address" name="factory_address"
                                               placeholder="آدرس کارخانه">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="home_logo">لوگو صفحه اصلی</label>
                                        <input type="file" class="form-control"
                                               id="home_logo" name="home_logo"
                                               placeholder="لوگو صفحه اصلی">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="logo_reports">لوگو گزارشات</label>
                                        <input type="file" class="form-control"
                                               id="logo_reports" name="logo_reports"
                                               placeholder="لوگو گزارشات">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="other_office_phone">سایر تلفن های کارخانه</label>
                                        <input type="text" class="form-control"
                                               id="other_office_phone" name="other_office_phone"
                                               placeholder="سایر تلفن های کارخانه">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="other_factory_phone">سایر تلفن های کارخانه</label>
                                        <input type="text" class="form-control"
                                               id="other_factory_phone" name="other_factory_phone"
                                               placeholder="سایر تلفن های کارخانه">
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_add_setting_company" class="btn btn-primary btn_add_setting_company">ثبت</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="edit-setting_company" aria-hidden="true">
    <div class="modal-dialog col-md-12">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ویرایش اطلاعات تنظیمات شرکت</h7>
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
                              autocomplete="off" id="form_edit_setting_company">
                            @csrf
                            <input type="hidden" id="id" name="id">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="edit_username">نام شرکت</label>
                                        <input type="text" class="form-control"
                                               id="edit_name" name="edit_name" placeholder="نام شرکت">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_tel_central_office">تلفن دفتر مرکزی</label>
                                        <input type="text" class="form-control"
                                               id="edit_tel_central_office" name="edit_tel_central_office" placeholder="تلفن دفتر مرکزی">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_fax_central_office">فکس دفتر مرکزی</label>
                                        <input type="text" class="form-control"
                                               id="edit_fax_central_office" name="edit_fax_central_office"
                                               placeholder="فکس دفتر مرکزی">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_office_email">ایمیل دفتر مرکزی</label>
                                        <input type="text" class="form-control"
                                               id="edit_office_email" name="edit_office_email"
                                               placeholder="ایمیل دفتر مرکزی">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="edit_address_central_office">آدرس دفتر مرکزی</label>
                                        <input type="text" class="form-control"
                                               id="edit_address_central_office" name="edit_address_central_office" placeholder="آدرس دفتر مرکزی">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_factory_main_phone">تلفن اصلی کارخانه</label>
                                        <input type="text" class="form-control"
                                               id="edit_factory_main_phone" name="edit_factory_main_phone"
                                               placeholder="تلفن اصلی کارخانه">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_factory_fox">فکس کارخانه</label>
                                        <input type="text" class="form-control"
                                               id="edit_factory_fox" name="edit_factory_fox"
                                               placeholder="فکس کارخانه">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_factory_email">ایمیل کارخانه</label>
                                        <input type="text" class="form-control"
                                               id="edit_factory_email" name="edit_factory_email"
                                               placeholder="ایمیل کارخانه">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="edit_factory_address">آدرس کارخانه</label>
                                        <input type="text" class="form-control"
                                               id="edit_factory_address" name="edit_factory_address"
                                               placeholder="آدرس کارخانه">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_home_logo">لوگو صفحه اصلی</label>
                                        <input type="file" class="form-control"
                                               id="edit_home_logo" name="edit_home_logo"
                                               placeholder="لوگو صفحه اصلی">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_logo_reports">لوگو گزارشات</label>
                                        <input type="file" class="form-control"
                                               id="edit_logo_reports" name="edit_logo_reports"
                                               placeholder="لوگو گزارشات">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_other_office_phone">سایر تلفن های کارخانه</label>
                                        <input type="text" class="form-control"
                                               id="edit_other_office_phone" name="edit_other_office_phone"
                                               placeholder="سایر تلفن های کارخانه">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="edit_other_factory_phone">سایر تلفن های کارخانه</label>
                                        <input type="text" class="form-control"
                                               id="edit_other_factory_phone" name="edit_other_factory_phone"
                                               placeholder="سایر تلفن های کارخانه">
                                    </div>

                                </div>

                            </div>
                        </form>


                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_edit_setting_company" class="btn btn-primary btn_edit_setting_company">ثبت</a>
            </div>
        </div>
    </div>
</div>

