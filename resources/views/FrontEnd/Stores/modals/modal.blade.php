<div class="modal fade" id="add-stores" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ثبت اطلاعات انبار</h7>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" role="form"
                              autocomplete="off" id="form_add_stores">
                            @csrf
                            <div class="box-body">
                                <div class="col-md-12">
                                    <label for="price">کد انبار</label>
                                    <input type="text"
                                           class="form-control" id="code" name="code">
                                </div>

                                <div class="col-md-12">
                                    <label for="role_id">نوع انبار</label>
                                    <br/>
                                    <select style="width: 100%" dir="rtl" class="form-control stores_type_id"
                                            id="stores_type_id" name="stores_type_id">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($storestypes as $storestype)
                                            <option value="{{$storestype->id}}">{{$storestype->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="price">پیشوند</label>
                                    <input type="text"
                                           class="form-control" id="prefix" name="prefix">
                                </div>
                                <div class="col-md-12">
                                    <label for="price">محل فیزیکی</label>
                                    <input type="text"
                                           class="form-control" id="location" name="location">
                                </div>




                                <div class="col-md-12">
                                    <label for="price">ظرفیت تعدادی</label>
                                    <input type="text" onkeyup="this.value=separate(this.value);"
                                           class="form-control" id="capacity_number" name="capacity_number">
                                </div>
                                <div class="col-md-12">
                                    <label for="price">ظرفیت وزنی</label>
                                    <input type="text" onkeyup="this.value=separate(this.value);"
                                           class="form-control" id="capacity_weight" name="capacity_weight">
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_add_stores" class="btn btn-primary btn_add_stores">ثبت</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="edit-stores" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ویرایش اطلاعات انبار</h7>
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
                              autocomplete="off" id="form_edit_stores">
                            @csrf
                            <input type="hidden" id="id" name="id">
                            <div class="box-body">
                                <div class="col-md-12">
                                    <label for="price">کد انبار</label>
                                    <input type="text"
                                           class="form-control" id="edit_code" name="edit_code">
                                </div>

                                <div class="col-md-12">
                                    <label for="role_id">نوع انبار</label>
                                    <br/>
                                    <select style="width: 100%" dir="rtl" class="form-control edit_stores_type_id"
                                            id="edit_stores_type_id" name="edit_stores_type_id">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($storestypes as $storestype)
                                            <option value="{{$storestype->id}}">{{$storestype->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="price">پیشوند</label>
                                    <input type="text"
                                           class="form-control" id="edit_prefix" name="edit_prefix">
                                </div>
                                <div class="col-md-12">
                                    <label for="price">محل فیزیکی</label>
                                    <input type="text"
                                           class="form-control" id="edit_location" name="edit_location">
                                </div>




                                <div class="col-md-12">
                                    <label for="price">ظرفیت تعدادی</label>
                                    <input type="text" onkeyup="this.value=separate(this.value);"
                                           class="form-control" id="edit_capacity_number" name="edit_capacity_number">
                                </div>
                                <div class="col-md-12">
                                    <label for="price">ظرفیت وزنی</label>
                                    <input type="text" onkeyup="this.value=separate(this.value);"
                                           class="form-control" id="edit_capacity_weight" name="edit_capacity_weight">
                                </div>


                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_edit_stores" class="btn btn-primary btn_edit_stores">ثبت</a>
            </div>
        </div>
    </div>
</div>

