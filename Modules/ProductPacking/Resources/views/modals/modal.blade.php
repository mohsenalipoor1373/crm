<div class="modal fade" id="add-product_packing" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ثبت اطلاعات بسته بندی محصول</h7>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" role="form"
                              autocomplete="off" id="form_add_product_packing">
                            @csrf
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="role_id">محصول</label>
                                    <br/>
                                    <select style="width: 100%" dir="rtl"
                                            class="form-control product_id"
                                            id="product_id" name="product_id">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="role_id">بسته بندی</label>
                                    <br/>
                                    <select style="width: 100%" dir="rtl"
                                            class="form-control essentials_packing_id"
                                            id="essentials_packing_id" name="essentials_packing_id">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($essentials_packings as $essentials_packing)
                                            <option
                                                value="{{$essentials_packing->id}}">{{$essentials_packing->essentials_packing_type->name}} {{$essentials_packing->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="number_products_package">تعداد محصول در بسته</label>
                                    <input type="text"
                                           class="form-control" id="number_products_package"
                                           name="number_products_package" placeholder="تعداد محصول در بسته">
                                </div>

                                <div class="form-group">
                                    <label for="number_cartons_package">تعداد کارتن در بسته</label>
                                    <input type="text"
                                           class="form-control" id="number_cartons_package"
                                           name="number_cartons_package" placeholder="تعداد کارتن در بسته">
                                </div>

                                <div class="form-group">
                                    <label for="number_packages_pallet">تعداد بسته در پالت</label>
                                    <input type="text"
                                           class="form-control" id="number_packages_pallet"
                                           name="number_packages_pallet" placeholder="تعداد بسته در پالت">
                                </div>




                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_add_product_packing" class="btn btn-primary btn_add_product_packing">ثبت</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="edit-product_packing" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ویرایش اطلاعات بسته بندی محصول</h7>
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
                              autocomplete="off" id="form_edit_product_packing">
                            @csrf
                            <input type="hidden" id="id" name="id">
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="role_id">محصول</label>
                                    <br/>
                                    <select style="width: 100%" dir="rtl"
                                            class="form-control edit_product_id"
                                            id="edit_product_id" name="edit_product_id">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="role_id">بسته بندی</label>
                                    <br/>
                                    <select style="width: 100%" dir="rtl"
                                            class="form-control edit_essentials_packing_id"
                                            id="edit_essentials_packing_id" name="edit_essentials_packing_id">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($essentials_packings as $essentials_packing)
                                            <option
                                                value="{{$essentials_packing->id}}">{{$essentials_packing->essentials_packing_type->name}} {{$essentials_packing->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="edit_number_products_package">تعداد محصول در بسته</label>
                                    <input type="text"
                                           class="form-control" id="edit_number_products_package"
                                           name="edit_number_products_package" placeholder="تعداد محصول در بسته">
                                </div>

                                <div class="form-group">
                                    <label for="edit_number_cartons_package">تعداد کارتن در بسته</label>
                                    <input type="text"
                                           class="form-control" id="edit_number_cartons_package"
                                           name="edit_number_cartons_package" placeholder="تعداد کارتن در بسته">
                                </div>

                                <div class="form-group">
                                    <label for="edit_number_packages_pallet">تعداد بسته در پالت</label>
                                    <input type="text"
                                           class="form-control" id="edit_number_packages_pallet"
                                           name="edit_number_packages_pallet" placeholder="تعداد بسته در پالت">
                                </div>




                            </div>
                        </form>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_edit_product_packing" class="btn btn-primary btn_edit_product_packing">ثبت</a>
            </div>
        </div>
    </div>
</div>

