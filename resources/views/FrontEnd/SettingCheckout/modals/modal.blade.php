<div class="modal fade" id="add-setting_checkout" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ثبت اطلاعات تنظیمات تسویه حساب</h7>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" role="form"
                              autocomplete="off" id="form_add_setting_checkout">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="type">نوع</label>
                                    <input type="text" class="form-control"
                                           id="type" name="type" placeholder="نوع">
                                </div>

                                <div class="form-group">
                                    <label for="status">تسویه قبل از تولید</label>
                                    <select style="width: 100%" dir="rtl" class="form-control status" id="status"
                                            name="status">
                                        <option value="">انتخاب کنید</option>
                                        <option value="0">اختیاری</option>
                                        <option value="1">الزامی</option>
                                    </select>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_add_setting_checkout" class="btn btn-primary btn_add_setting_checkout">ثبت</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="edit-setting_checkout" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ویرایش اطلاعات تنظیمات تسویه حساب</h7>
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
                         background: url({{asset('/public/assets/dist/img/ajax-loader.gif')}}) 50% 50% no-repeat #f5f5f5">
                </div>
                <div id="ajaxContentDemo" class="row d-none">
                    <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" role="form"
                              autocomplete="off" id="form_edit_setting_checkout">
                            @csrf
                            <input type="hidden" id="id" name="id">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="edit_type">نوع</label>
                                    <input type="text" class="form-control"
                                           id="edit_type" name="edit_type" placeholder="نوع">
                                </div>

                                <div class="form-group">
                                    <label for="edit_status">تسویه قبل از تولید</label>
                                    <select style="width: 100%" dir="rtl" class="form-control edit_status" id="edit_status"
                                            name="edit_status">
                                        <option value="">انتخاب کنید</option>
                                        <option value="0">اختیاری</option>
                                        <option value="1">الزامی</option>
                                    </select>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_edit_setting_checkout" class="btn btn-primary btn_edit_setting_checkout">ثبت</a>
            </div>
        </div>
    </div>
</div>

