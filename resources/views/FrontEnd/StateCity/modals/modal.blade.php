<div class="modal fade" id="add-state_city" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ثبت اطلاعات منطقه</h7>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" role="form"
                              autocomplete="off" id="form_add_state_city">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="country">نام کشور</label>
                                    <input type="text" class="form-control"
                                           id="country" name="country" placeholder="نام کشور">
                                </div>

                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="state">نام استان</label>
                                    <input type="text" class="form-control"
                                           id="state" name="state" placeholder="نام استان">
                                </div>

                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="city">نام شهر</label>
                                    <input type="text" class="form-control"
                                           id="city" name="city" placeholder="نام شهر">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_add_state_city" class="btn btn-primary btn_add_state_city">ثبت</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="edit-state_city" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ویرایش اطلاعات منطقه</h7>
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
                              autocomplete="off" id="form_edit_state_city">
                            @csrf
                            <input type="hidden" id="id" name="id">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="edit_country">نام کشور</label>
                                    <input type="text" class="form-control"
                                           id="edit_country" name="edit_country" placeholder="نام کشور">
                                </div>

                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="edit_state">نام استان</label>
                                    <input type="text" class="form-control"
                                           id="edit_state" name="edit_state" placeholder="نام استان">
                                </div>

                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="edit_city">نام شهر</label>
                                    <input type="text" class="form-control"
                                           id="edit_city" name="edit_city" placeholder="نام شهر">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_edit_state_city" class="btn btn-primary btn_edit_state_city">ثبت</a>
            </div>
        </div>
    </div>
</div>

