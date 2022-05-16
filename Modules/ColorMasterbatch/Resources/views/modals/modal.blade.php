<div class="modal fade" id="add-color_masterbatch" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ثبت اطلاعات رنگ و مستربچ</h7>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" role="form"
                              autocomplete="off" id="form_add_color_masterbatch">
                            @csrf
                            <div class="box-body">

                                <div class="col-md-12">
                                    <label for="role_id">رنگ</label>
                                    <br/>
                                    <select style="width: 100%" dir="rtl" class="form-control color_id"
                                            id="color_id" name="color_id">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($colors as $color)
                                            <option value="{{$color->id}}">{{$color->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-md-12" style="margin-top: 2%">
                                    <label for="role_id">مستربچ</label>
                                    <br/>
                                    <select style="width: 100%" dir="rtl" class="form-control masterbach_id" id="masterbach_id" name="masterbach_id">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($masterbachs as $masterbach)
                                            <option value="{{$masterbach->id}}">{{$masterbach->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-md-12" style="margin-top: 2%">
                                    <label for="price">قیمت مستربچ</label>
                                    <input type="text" onkeyup="this.value=separate(this.value);"
                                           class="form-control" id="price" name="price">
                                </div>

                                <div class="col-md-12" style="margin-top: 2%">
                                    <label for="mixing_percentage">درصد اختلاط</label>
                                    <input type="text" onkeyup="this.value=separate(this.value);"
                                           class="form-control" id="mixing_percentage" name="mixing_percentage">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_add_color_masterbatch" class="btn btn-primary btn_add_color_masterbatch">ثبت</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="edit-color_masterbatch" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ویرایش اطلاعات رنگ و مستربچ</h7>
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
                              autocomplete="off" id="form_edit_color_masterbatch">
                            @csrf
                            <input type="hidden" id="id" name="id">
                            <div class="box-body">

                                <div class="col-md-12">
                                    <label for="role_id">رنگ</label>
                                    <br/>
                                    <select style="width: 100%" dir="rtl" class="form-control edit_color_id"
                                            id="edit_color_id" name="edit_color_id">

                                    </select>
                                </div>


                                <div class="col-md-12" style="margin-top: 2%">
                                    <label for="role_id">مستربچ</label>
                                    <br/>
                                    <select style="width: 100%" dir="rtl" class="form-control edit_masterbach_id"
                                            id="edit_masterbach_id" name="edit_masterbach_id">

                                    </select>
                                </div>


                                <div class="col-md-12" style="margin-top: 2%">
                                    <label for="price">قیمت مستربچ</label>
                                    <input type="text" onkeyup="this.value=separate(this.value);"
                                           class="form-control" id="edit_price" name="edit_price">
                                </div>

                                <div class="col-md-12" style="margin-top: 2%">
                                    <label for="mixing_percentage">درصد اختلاط</label>
                                    <input type="text" onkeyup="this.value=separate(this.value);"
                                           class="form-control" id="edit_mixing_percentage" name="edit_mixing_percentage">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_edit_color_masterbatch" class="btn btn-primary btn_edit_color_masterbatch">ثبت</a>
            </div>
        </div>
    </div>
</div>

