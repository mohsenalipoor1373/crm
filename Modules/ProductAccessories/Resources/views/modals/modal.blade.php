<div class="modal fade" id="add-product_accessories" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ثبت اطلاعات قطعه مونتاژی</h7>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" role="form"
                              autocomplete="off" id="form_add_product_accessories">
                            @csrf
                            <div class="box-body">

                                <div class="col-md-12">
                                    <label for="product_id_parent">محصول</label>
                                    <br/>
                                    <select style="width: 100%" dir="rtl" class="form-control product_id_parent"
                                            id="product_id_parent" name="product_id_parent">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="product_id">قطعه مونتاژی</label>
                                    <br/>
                                    <select style="width: 100%" dir="rtl" class="form-control product_id"
                                            id="product_id" name="product_id">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                </div>




                                <div class="col-md-12" style="margin-top: 2%">
                                    <label for="number">تعداد</label>
                                    <input type="text" onkeyup="this.value=separate(this.value);"
                                           class="form-control" id="number" name="number">
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_add_product_accessories" class="btn btn-primary btn_add_product_accessories">ثبت</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="edit-product_accessories" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ویرایش اطلاعات قطعه مونتاژی</h7>
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
                              autocomplete="off" id="form_edit_product_accessories">
                            @csrf
                            <input type="hidden" id="id" name="id">
                            <div class="box-body">

                                <div class="col-md-12">
                                    <label for="edit_product_id_parent">محصول</label>
                                    <br/>
                                    <select style="width: 100%" dir="rtl" class="form-control edit_product_id_parent"
                                            id="edit_product_id_parent" name="edit_product_id_parent">

                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="edit_product_id">قطعه مونتاژی</label>
                                    <br/>
                                    <select style="width: 100%" dir="rtl" class="form-control edit_product_id"
                                            id="edit_product_id" name="edit_product_id">

                                    </select>
                                </div>




                                <div class="col-md-12" style="margin-top: 2%">
                                    <label for="edit_number">تعداد</label>
                                    <input type="text" onkeyup="this.value=separate(this.value);"
                                           class="form-control" id="edit_number" name="edit_number">
                                </div>


                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_edit_product_accessories" class="btn btn-primary btn_edit_product_accessories">ثبت</a>
            </div>
        </div>
    </div>
</div>

