<div class="modal fade" id="add-shift" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
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
                              autocomplete="off" id="form_add_shift">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="username">نام</label>
                                    <input type="text" class="form-control"
                                           id="name" name="name" placeholder="نام">
                                </div>
                                <div class="form-group">
                                    <label for="time_in">از ساعت</label>
                                    <input type="text" class="form-control"
                                           id="time_in" name="time_in" placeholder="از ساعت">
                                </div>
                                <div class="form-group">
                                    <label for="date_in">از روز</label>
                                    <input type="text" class="form-control"
                                           id="date_in" name="date_in" placeholder="از روز">
                                </div>
                                <div class="form-group">
                                    <label for="time_to">تا ساعت</label>
                                    <input type="text" class="form-control"
                                           id="time_to" name="time_to" placeholder="تا ساعت">
                                </div>
                                <div class="form-group">
                                    <label for="date_to">تا روز</label>
                                    <input type="text" class="form-control"
                                           id="date_to" name="date_to" placeholder="تا روز">
                                </div>
                                <div class="form-group">
                                    <label for="length">طول</label>
                                    <input type="text" class="form-control"
                                           id="length" name="length" placeholder="طول">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_add_shift" class="btn btn-primary btn_add_shift">ثبت</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="edit-shift" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
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
                              autocomplete="off" id="form_edit_shift">
                            @csrf
                            <input type="hidden" id="id" name="id">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="edit_username">نام</label>
                                    <input type="text" class="form-control"
                                           id="edit_name" name="edit_name" placeholder="نام">
                                </div>
                                <div class="form-group">
                                    <label for="edit_time_in">از ساعت</label>
                                    <input type="text" class="form-control"
                                           id="edit_time_in" name="edit_time_in" placeholder="از ساعت">
                                </div>
                                <div class="form-group">
                                    <label for="edit_date_in">از روز</label>
                                    <input type="text" class="form-control"
                                           id="edit_date_in" name="edit_date_in" placeholder="از روز">
                                </div>
                                <div class="form-group">
                                    <label for="edit_time_to">تا ساعت</label>
                                    <input type="text" class="form-control"
                                           id="edit_time_to" name="edit_time_to" placeholder="تا ساعت">
                                </div>
                                <div class="form-group">
                                    <label for="edit_date_to">تا روز</label>
                                    <input type="text" class="form-control"
                                           id="edit_date_to" name="edit_date_to" placeholder="تا روز">
                                </div>
                                <div class="form-group">
                                    <label for="edit_length">طول</label>
                                    <input type="text" class="form-control"
                                           id="edit_length" name="edit_length" placeholder="طول">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_edit_color" class="btn btn-primary btn_edit_shift">ثبت</a>
            </div>
        </div>
    </div>
</div>

