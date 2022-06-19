<div class="modal fade" id="add-product_label" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ثبت اطلاعات محصول و لیبل</h7>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" role="form"
                              autocomplete="off" id="form_add_product_label">
                            @csrf
                            <div class="box-body">

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="code">کد</label>
                                        <input type="text" class="form-control"
                                               id="code" name="code" placeholder="کد">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-md-12">
                                        <label for="role_id">محصول</label>
                                        <select style="width: 100%" dir="rtl"
                                                class="form-control product_id" id="product_id"
                                                name="product_id">
                                            <option value="">انتخاب کنید</option>
                                            @foreach($products as $product)
                                                <option value="{{$product->id}}">{{$product->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                </div>
                                <div class="form-group">

                                    <div class="col-md-12">
                                        <label for="role_id">طرح لیبل</label>
                                        <select style="width: 100%" dir="rtl"
                                                class="form-control label_design_id" id="label_design_id"
                                                name="label_design_id">
                                            <option value="">انتخاب کنید</option>
                                            @foreach($label_designs as $label_design)
                                                <option value="{{$label_design->id}}">{{$label_design->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                </div>

                                <div class="form-group">

                                    <div class="col-md-12">
                                        <label for="role_id">رنگ</label>
                                        <select style="width: 100%" dir="rtl"
                                                class="form-control color_id" id="color_id"
                                                name="color_id">
                                            <option value="">انتخاب کنید</option>
                                            @foreach($colors as $color)
                                                <option value="{{$color->id}}">{{$color->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="code">نام لیبل</label>
                                        <input type="text" class="form-control"
                                               id="name" name="name" placeholder="نام لیبل">
                                    </div>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_add_product_label" class="btn btn-primary btn_add_product_label">ثبت</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="edit-product_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ویرایش اطلاعات محصول لیبل</h7>
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
                              autocomplete="off" id="form_edit_product_label">
                            @csrf
                            <input type="hidden" id="id" name="id">
                            <div class="box-body">

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="code">کد</label>
                                        <input type="text" class="form-control"
                                               id="edit_code" name="edit_code" placeholder="کد">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-md-12">
                                        <label for="role_id">محصول</label>
                                        <select style="width: 100%" dir="rtl"
                                                class="form-control edit_product_id" id="edit_product_id"
                                                name="edit_product_id">

                                        </select>
                                    </div>


                                </div>
                                <div class="form-group">

                                    <div class="col-md-12">
                                        <label for="role_id">طرح لیبل</label>
                                        <select style="width: 100%" dir="rtl"
                                                class="form-control edit_label_design_id" id="edit_label_design_id"
                                                name="edit_label_design_id">

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-md-12">
                                        <label for="role_id">رنگ</label>
                                        <select style="width: 100%" dir="rtl"
                                                class="form-control edit_color_id" id="edit_color_id"
                                                name="edit_color_id">

                                        </select>
                                    </div>


                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="code">نام لیبل</label>
                                        <input type="text" class="form-control"
                                               id="edit_name" name="edit_name" placeholder="نام لیبل">
                                    </div>
                                </div>


                            </div>

                        </form>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_edit_product_label" class="btn btn-primary btn_edit_product_label">ثبت</a>
            </div>
        </div>
    </div>
</div>

