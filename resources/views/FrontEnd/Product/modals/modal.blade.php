<div class="modal fade" id="add-product" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog col-md-12">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ثبت اطلاعات محصول</h7>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" role="form"
                              autocomplete="off" id="form_add_product">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="code">کد</label>
                                        <input type="text" class="form-control"
                                               id="code" name="code" placeholder="کد">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="name">نام</label>
                                        <input type="text" class="form-control"
                                               id="name" name="name" placeholder="نام">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="role_id">نوع محصول</label>
                                        <select style="width: 100%" dir="rtl"
                                                class="form-control product_type_id" id="product_type_id" name="product_type_id">
                                            <option value="">انتخاب کنید</option>
                                            @foreach($product_types as $product_type)
                                                <option value="{{$product_type->id}}">{{$product_type->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="role_id">شکل محصول</label>
                                        <select style="width: 100%" dir="rtl"
                                                class="form-control product_shape_id"
                                                id="product_shape_id" name="product_shape_id">
                                            <option value="">انتخاب کنید</option>
                                            @foreach($product_shapes as $product_shape)
                                                <option value="{{$product_shape->id}}">{{$product_shape->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="role_id">شاخص محصول</label>
                                        <select style="width: 100%" dir="rtl"
                                                class="form-control product_index_id"
                                                id="product_index_id" name="product_index_id">
                                            <option value="">انتخاب کنید</option>
                                            @foreach($product_indexs as $product_index)
                                                <option value="{{$product_index->id}}">{{$product_index->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="role_id">ابعاد محصول</label>
                                        <select style="width: 100%" dir="rtl"
                                                class="form-control product_dim_id"
                                                id="product_dim_id" name="product_dim_id">
                                            <option value="">انتخاب کنید</option>
                                            @foreach($product_dims as $product_dim)
                                                <option value="{{$product_dim->id}}">{{$product_dim->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="weight">وزن(گرم)</label>
                                        <input type="text" class="form-control"
                                               id="weight" name="weight" placeholder="وزن(گرم)">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="wage">کارمزد(ریال)</label>
                                        <input type="text" class="form-control"
                                               id="wage" name="wage" onkeyup="this.value=separate(this.value);" placeholder="کارمزد(ریال)">
                                    </div>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-3">
                                        <label for="per_sale">فی فروش(ریال)</label>
                                        <input type="text" class="form-control"
                                               id="per_sale" name="per_sale" onkeyup="this.value=separate(this.value);" placeholder="فی فروش(ریال)">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="production_capacity">ظرفیت تولید</label>
                                        <input type="text" class="form-control"
                                               id="production_capacity" name="production_capacity" placeholder="ظرفیت تولید">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="place_production">محل تولید</label>
                                        <input type="text" class="form-control"
                                               id="place_production" name="place_production"
                                               placeholder="محل تولید">
                                    </div>

                                </div>



                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_add_product" class="btn btn-primary btn_add_product">ثبت</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="edit-product" aria-hidden="true">
    <div class="modal-dialog col-md-12">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ویرایش اطلاعات محصول</h7>
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
                              autocomplete="off" id="form_edit_product">
                            @csrf
                            <input type="hidden" id="id" name="id">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="edit_code">کد</label>
                                        <input type="text" class="form-control"
                                               id="edit_code" name="edit_code" placeholder="کد">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_name">نام</label>
                                        <input type="text" class="form-control"
                                               id="edit_name" name="edit_name" placeholder="نام">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="role_id">نوع محصول</label>
                                        <select style="width: 100%" dir="rtl"
                                                class="form-control edit_product_type_id"
                                                id="edit_product_type_id" name="edit_product_type_id">


                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="role_id">شکل محصول</label>
                                        <select style="width: 100%" dir="rtl"
                                                class="form-control edit_product_shape_id"
                                                id="edit_product_shape_id" name="edit_product_shape_id">

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-md-3">
                                        <label for="role_id">شاخص محصول</label>
                                        <select style="width: 100%" dir="rtl"
                                                class="form-control edit_product_index_id"
                                                id="edit_product_index_id" name="edit_product_index_id">

                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="role_id">ابعاد محصول</label>
                                        <select style="width: 100%" dir="rtl"
                                                class="form-control edit_product_dim_id"
                                                id="edit_product_dim_id" name="edit_product_dim_id">

                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="edit_weight">وزن(گرم)</label>
                                        <input type="text" class="form-control"
                                               id="edit_weight" name="edit_weight" placeholder="وزن(گرم)">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_wage">کارمزد(ریال)</label>
                                        <input type="text" class="form-control"
                                               id="edit_wage" name="edit_wage" onkeyup="this.value=separate(this.value);" placeholder="کارمزد(ریال)">
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-md-3">
                                        <label for="edit_per_sale">فی فروش(ریال)</label>
                                        <input type="text" class="form-control"
                                               id="edit_per_sale" name="edit_per_sale" onkeyup="this.value=separate(this.value);" placeholder="فی فروش(ریال)">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_production_capacity">ظرفیت تولید</label>
                                        <input type="text" class="form-control"
                                               id="edit_production_capacity" name="edit_production_capacity" placeholder="ظرفیت تولید">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edit_place_production">محل تولید</label>
                                        <input type="text" class="form-control"
                                               id="edit_place_production" name="edit_place_production"
                                               placeholder="محل تولید">
                                    </div>

                                </div>



                            </div>
                        </form>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_edit_product" class="btn btn-primary btn_edit_product">ثبت</a>
            </div>
        </div>
    </div>
</div>

