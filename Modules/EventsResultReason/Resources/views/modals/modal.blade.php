<div class="modal fade" id="add-events_result_reason" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ثبت اطلاعات دلیل نتایج رویداد</h7>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" role="form"
                              autocomplete="off" id="form_add_events_result_reason">
                            @csrf
                            <div class="box-body">

                                <div class="col-md-12">
                                    <label for="events_result_id">موضوع</label>
                                    <br/>
                                    <select style="width: 100%" dir="rtl" class="form-control events_subject_id"
                                            id="events_subject_id" name="events_subject_id">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($events_subjects as $events_subject)
                                            <option value="{{$events_subject->id}}">{{$events_subject->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <label for="events_result_id">نتیجه</label>
                                    <br/>
                                    <select style="width: 100%" dir="rtl" class="form-control events_result_id"
                                            id="events_result_id" name="events_result_id">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($events_results as $events_result)
                                            <option value="{{$events_result->id}}">{{$events_result->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-md-12">
                                    <label for="name">شرح نتیجه</label>
                                    <input type="text"
                                           placeholder="شرح نتیجه"
                                           class="form-control" id="name" name="name">
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_add_events_result_reason" class="btn btn-primary btn_add_events_result_reason">ثبت</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="edit-events_result_reason" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ویرایش اطلاعات دلیل نتایج رویداد</h7>
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
                              autocomplete="off" id="form_edit_events_result_reason">
                            @csrf
                            <input type="hidden" id="id" name="id">
                            <div class="box-body">

                                <div class="col-md-12">
                                    <label for="edit_events_subject_id">موضوع</label>
                                    <br/>
                                    <select style="width: 100%" dir="rtl" class="form-control edit_events_subject_id"
                                            id="edit_events_subject_id" name="edit_events_subject_id">

                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <label for="edit_events_result_id">نتیجه</label>
                                    <br/>
                                    <select style="width: 100%" dir="rtl" class="form-control edit_events_result_id"
                                            id="edit_events_result_id" name="edit_events_result_id">

                                    </select>
                                </div>


                                <div class="col-md-12">
                                    <label for="edit_name">شرح نتیجه</label>
                                    <input type="text"
                                           placeholder="شرح نتیجه"
                                           class="form-control" id="edit_name" name="edit_name">
                                </div>


                            </div>
                        </form>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_edit_events_result_reason" class="btn btn-primary btn_edit_events_result_reason">ثبت</a>
            </div>
        </div>
    </div>
</div>

