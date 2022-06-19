<div class="modal fade" id="add-label_design" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ثبت اطلاعات لیبل</h7>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" role="form"
                              autocomplete="off" id="form_add_label_design">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="username">کد طرح</label>
                                    <input type="text" class="form-control"
                                           id="code" name="code" placeholder="کد طرح">
                                </div>

                                <div class="form-group">
                                    <label for="username">مشتری</label>
                                    <select style="width: 100%" dir="rtl"
                                            class="form-control customer_id" id="customer_id"
                                            name="customer_id">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($customers as $customer)
                                            <option value="{{$customer->id}}">
                                                {{$customer->name}} - {{$customer->code}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="username">نوع لیبل</label>
                                    <select style="width: 100%" dir="rtl"
                                            class="form-control label_type_id" id="label_type_id"
                                            name="label_type_id">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($label_types as $label_type)
                                            <option value="{{$label_type->id}}">
                                                {{$label_type->text}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="username">نام طرح</label>
                                    <input type="text" class="form-control"
                                           id="name" name="name" placeholder="نام طرح">
                                </div>

                                <div class="form-group">
                                    <label for="username">توضیحات</label>
                                    <textarea class="form-control"
                                              id="text"
                                              name="text"
                                              rows="3">

                                    </textarea>

                                </div>



                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_add_label_design" class="btn btn-primary btn_add_label_design">ثبت</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="edit-label_design" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ویرایش اطلاعات لیبل</h7>
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
                              autocomplete="off" id="form_edit_label_design">
                            @csrf
                            <input type="hidden" id="id" name="id">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="username">کد طرح</label>
                                    <input type="text" class="form-control"
                                           id="edit_code" name="edit_code" placeholder="کد طرح">
                                </div>

                                <div class="form-group">
                                    <label for="username">مشتری</label>
                                    <select style="width: 100%" dir="rtl"
                                            class="form-control edit_customer_id" id="edit_customer_id"
                                            name="edit_customer_id">

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="username">نوع لیبل</label>
                                    <select style="width: 100%" dir="rtl"
                                            class="form-control edit_label_type_id" id="edit_label_type_id"
                                            name="edit_label_type_id">

                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="username">نام طرح</label>
                                    <input type="text" class="form-control"
                                           id="edit_name" name="edit_name" placeholder="نام طرح">
                                </div>

                                <div class="form-group">
                                    <label for="username">توضیحات</label>
                                    <textarea class="form-control"
                                              id="edit_text"
                                              name="edit_text"
                                              rows="3">

                                    </textarea>

                                </div>



                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_edit_label_design" class="btn btn-primary btn_edit_label_design">ثبت</a>
            </div>
        </div>
    </div>
</div>

