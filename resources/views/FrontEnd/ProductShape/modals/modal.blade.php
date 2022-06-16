<div class="modal fade" id="add-product_shape" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ثبت اطلاعات شکل محصول</h7>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" role="form"
                              autocomplete="off" id="form_add_product_shape">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="username">کد</label>
                                    <input type="text" class="form-control"
                                           id="code" name="code" placeholder="کد">
                                </div>

                                <div class="form-group">
                                    <label for="username">نام</label>
                                    <input type="text" class="form-control"
                                           id="name" name="name" placeholder="نام">
                                </div>
                                <div class="form-group">
                                    <label for="username">نام لاتین</label>
                                    <input type="text" class="form-control"
                                           id="name_en" name="name_en" placeholder="نام لاتین">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_add_product_shape" class="btn btn-primary btn_add_product_shape">ثبت</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="edit-product_shape" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ویرایش اطلاعات شکل محصول</h7>
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
                              autocomplete="off" id="form_edit_product_shape">
                            @csrf
                            <input type="hidden" id="id" name="id">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="edit_username">کد</label>
                                    <input type="text" class="form-control"
                                           id="edit_code" name="edit_code" placeholder="کد">
                                </div>

                                <div class="form-group">
                                    <label for="edit_username">نام</label>
                                    <input type="text" class="form-control"
                                           id="edit_name" name="edit_name" placeholder="نام">
                                </div>

                                <div class="form-group">
                                    <label for="edit_username">نام لاتین</label>
                                    <input type="text" class="form-control"
                                           id="edit_name_en" name="edit_name_en" placeholder="نام لاتین">
                                </div>


                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_edit_product_shape" class="btn btn-primary btn_edit_product_shape">ثبت</a>
            </div>
        </div>
    </div>
</div>
