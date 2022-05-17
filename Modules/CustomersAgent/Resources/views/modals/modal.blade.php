<div class="modal fade" id="add-customers_agent" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ثبت اطلاعات نماینده مشتری</h7>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" role="form"
                              autocomplete="off" id="form_add_customers_agent">
                            @csrf
                            <div class="box-body">


                                <div class="form-group">
                                    <label for="code">کد</label>
                                    <input type="text"
                                           class="form-control" id="code" name="code" placeholder="کد">
                                </div>

                                <div class="form-group">
                                    <label for="customer_id">مشتری</label>
                                    <br/>
                                    <select style="width: 100%" dir="rtl"
                                            class="form-control customer_id"
                                            id="customer_id" name="customer_id">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->name}}_{{$customer->code}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="name">نام  نماینده</label>
                                    <input type="text"
                                           class="form-control" id="name" name="name" placeholder="نام نماینده">
                                </div>

                                <div class="form-group">
                                    <label for="side">سمت</label>
                                    <input type="text"
                                           class="form-control" id="side" name="side" placeholder="سمت">
                                </div>

                                <div class="form-group">
                                    <label for="phone">شماره تماس</label>
                                    <input type="text"
                                           class="form-control" id="phone" name="phone" placeholder="شماره تماس">
                                </div>





                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_add_customers_agent" class="btn btn-primary btn_add_customers_agent">ثبت</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="edit-customers_agent" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ویرایش اطلاعات نماینده مشتری</h7>
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
                              autocomplete="off" id="form_edit_customers_agent">
                            @csrf
                            <input type="hidden" id="id" name="id">
                            <div class="box-body">


                                <div class="form-group">
                                    <label for="edit_code">کد</label>
                                    <input type="text"
                                           class="form-control" id="edit_code" name="edit_code" placeholder="کد">
                                </div>

                                <div class="form-group">
                                    <label for="edit_customer_id">مشتری</label>
                                    <br/>
                                    <select style="width: 100%" dir="rtl"
                                            class="form-control edit_customer_id"
                                            id="edit_customer_id" name="edit_customer_id">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->name}}_{{$customer->code}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="edit_name">نام  نماینده</label>
                                    <input type="text"
                                           class="form-control" id="edit_name"
                                           name="edit_name" placeholder="نام نماینده">
                                </div>

                                <div class="form-group">
                                    <label for="edit_side">سمت</label>
                                    <input type="text"
                                           class="form-control" id="edit_side" name="edit_side" placeholder="سمت">
                                </div>

                                <div class="form-group">
                                    <label for="edit_phone">شماره تماس</label>
                                    <input type="text"
                                           class="form-control" id="edit_phone" name="edit_phone" placeholder="شماره تماس">
                                </div>





                            </div>
                        </form>


                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_edit_customers_agent" class="btn btn-primary btn_edit_customers_agent">ثبت</a>
            </div>
        </div>
    </div>
</div>

