<div class="modal fade" id="add-users" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-lg">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('img/sa.png')}}" width="20">
                    </span>
                </button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" role="form"
                              autocomplete="off" id="form_add_users">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="username">نام کاربری</label>
                                        <input type="text" class="form-control"
                                               id="email" name="email" placeholder="نام کاربری">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="side">سمت سازمانی</label>
                                        <input type="text" class="form-control"
                                               id="side" name="side" placeholder="سمت سازمانی">
                                    </div>


                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="lname">نام</label>
                                        <input type="text" class="form-control"
                                               id="lname" name="lname" placeholder="نام">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="fname">نام خانوادگی</label>
                                        <input type="text" class="form-control"
                                               id="fname" name="fname" placeholder="نام خانوادگی">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="pass">کلمه عبور</label>
                                        <input type="password" class="form-control"
                                               id="pass" name="pass" placeholder="کلمه عبور">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="role_id">سطح دسترسی</label>
                                        <select class="form-control" id="role_id" name="role_id">
                                            <option>گزینه 1</option>
                                            <option>گزینه 2</option>
                                        </select>
                                    </div>

                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_add_users" class="btn btn-primary btn_add_users">ثبت</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="edit-users" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('img/sa.png')}}" width="20">
                    </span>
                </button>
                <h4 class="modal-title"></h4>
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
                              autocomplete="off" id="form_edit_users">
                            @csrf
                            <input type="hidden" id="id" name="id">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="edit_username">نام کاربری</label>
                                        <input type="text" class="form-control"
                                               id="edit_email" name="edit_email" placeholder="نام کاربری">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_side">سمت سازمانی</label>
                                        <input type="text" class="form-control"
                                               id="edit_side" name="edit_side" placeholder="سمت سازمانی">
                                    </div>


                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="edit_lname">نام</label>
                                        <input type="text" class="form-control"
                                               id="edit_lname" name="edit_lname" placeholder="نام">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_fname">نام خانوادگی</label>
                                        <input type="text" class="form-control"
                                               id="edit_fname" name="edit_fname" placeholder="نام خانوادگی">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="edit_pass">کلمه عبور</label>
                                        <input type="password" class="form-control"
                                               id="edit_pass" name="edit_pass" placeholder="کلمه عبور">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="edit_role_id">سطح دسترسی</label>
                                        <select class="form-control" id="edit_role_id" name="edit_role_id">
                                            <option>گزینه 1</option>
                                            <option>گزینه 2</option>
                                        </select>
                                    </div>

                                </div>


                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_add_users" class="btn btn-primary btn_edit_users">ثبت</a>
            </div>
        </div>
    </div>
</div>

