<div class="modal fade" id="add-label_design_version" aria-hidden="true">
    <div class="modal-dialog col-md-12">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ثبت اطلاعات ورژن لیبل</h7>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" role="form"
                              autocomplete="off" id="form_add_label_design_version">
                            @csrf
                            <div class="box-body">

                                <div class="form-group">

                                    <div class="col-md-3">

                                        <label for="username">کد طرح لیبل</label>
                                        <select style="width: 100%" dir="rtl"
                                                class="form-control label_design_id"
                                                id="label_design_id"
                                                name="label_design_id">
                                            <option value="">انتخاب کنید</option>
                                            @foreach($label_designs as $label_design)
                                                <option value="{{$label_design->id}}">
                                                    {{$label_design->name}}
                                                </option>
                                            @endforeach
                                        </select>


                                    </div>

                                    <div class="col-md-3">

                                        <label for="username">طراح</label>
                                        <select style="width: 100%" dir="rtl"
                                                class="form-control designer_id"
                                                id="designer_id"
                                                name="designer_id">
                                            <option value="">انتخاب کنید</option>
                                            @foreach($designers as $designer)
                                                <option value="{{$designer->id}}">
                                                    {{$designer->name}} {{$designer->fname}}
                                                </option>
                                            @endforeach
                                        </select>


                                    </div>

                                    <div class="col-md-3">
                                        <label for="username">شکل طرح</label>
                                        <input type="text" class="form-control"
                                               id="shape" name="shape"
                                               placeholder="شکل طرح">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="username">اندازه طرح</label>
                                        <input type="text" class="form-control"
                                               id="size" name="size"
                                               placeholder="اندازه طرح">
                                    </div>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-3">
                                        <label for="username">کد ورژن لیبل</label>
                                        <input type="text" class="form-control"
                                               id="code" name="code"
                                               placeholder="کد ورژن لیبل">
                                    </div>


                                    <div class="col-md-3">
                                        <label for="username">مسیر ذخیره سازی</label>
                                        <input type="text" class="form-control"
                                               id="direction" name="direction"
                                               placeholder="مسیر ذخیره سازی">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="username">نام فایل</label>
                                        <input type="text" class="form-control"
                                               id="name_file" name="name_file"
                                               placeholder="نام فایل">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="username">فایل پیوست</label>
                                        <input type="file" class="form-control"
                                               id="file" name="file"
                                               placeholder="فایل پیوست">
                                    </div>


                                </div>

                                <div class="form-group">

                                    <div class="col-md-12">
                                        <label for="username">توضیحات</label>
                                        <textarea class="form-control"
                                                  id="text"
                                                  name="text"
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
                <a id="btn_add_label_design_version" class="btn btn-primary btn_add_label_design_version">ثبت</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="edit-label_design_version" aria-hidden="true">
    <div class="modal-dialog col-md-12">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ویرایش اطلاعات ورژن لیبل</h7>
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
                              autocomplete="off" id="form_edit_label_design_version">
                            @csrf
                            <input type="hidden" id="id" name="id">
                            <div class="box-body">

                                <div class="form-group">

                                    <div class="col-md-3">

                                        <label for="username">کد طرح لیبل</label>
                                        <select style="width: 100%" dir="rtl"
                                                class="form-control edit_label_design_id"
                                                id="edit_label_design_id"
                                                name="edit_label_design_id">

                                        </select>


                                    </div>

                                    <div class="col-md-3">

                                        <label for="username">طراح</label>
                                        <select style="width: 100%" dir="rtl"
                                                class="form-control edit_designer_id"
                                                id="edit_designer_id"
                                                name="edit_designer_id">

                                        </select>


                                    </div>

                                    <div class="col-md-3">
                                        <label for="username">شکل طرح</label>
                                        <input type="text" class="form-control"
                                               id="edit_shape" name="edit_shape"
                                               placeholder="شکل طرح">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="username">اندازه طرح</label>
                                        <input type="text" class="form-control"
                                               id="edit_size" name="edit_size"
                                               placeholder="اندازه طرح">
                                    </div>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-3">
                                        <label for="username">کد ورژن لیبل</label>
                                        <input type="text" class="form-control"
                                               id="edit_code" name="edit_code"
                                               placeholder="کد ورژن لیبل">
                                    </div>


                                    <div class="col-md-3">
                                        <label for="username">مسیر ذخیره سازی</label>
                                        <input type="text" class="form-control"
                                               id="edit_direction" name="edit_direction"
                                               placeholder="مسیر ذخیره سازی">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="username">نام فایل</label>
                                        <input type="text" class="form-control"
                                               id="edit_name_file" name="edit_name_file"
                                               placeholder="نام فایل">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="username">فایل پیوست</label>
                                        <input type="file" class="form-control"
                                               id="edit_file" name="edit_file"
                                               placeholder="فایل پیوست">
                                    </div>


                                </div>

                                <div class="form-group">

                                    <div class="col-md-12">
                                        <label for="username">توضیحات</label>
                                        <textarea class="form-control"
                                                  id="edit_text"
                                                  name="edit_text"
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
                <a id="btn_edit_label_design_version" class="btn btn-primary btn_edit_label_design_version">ثبت</a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="see-file_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">فایل پیوست ورژن لیبل</h7>
            </div>
            <div class="modal-body">
                <div id="load_modall" style="
                         position: fixed;
                         opacity: 0.95;
                         left: 0px;
                         top: 0px;
                         width: 100%;
                         height: 100%;
                         z-index: 999999;
                         background: url({{asset('/public/assets/dist/img/ajax-loader.gif')}}) 50% 50% no-repeat #f5f5f5">
                </div>
                <div id="ajaxContentDemoo" class="row d-none">
                    <div class="col-md-12">
                        <div class="box-body">
                            <div class="col-md-12">
                                <img id="image_file" name="image_file"
                                     style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
