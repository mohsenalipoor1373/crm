<div class="modal fade" id="add-early_materials" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-lg">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ثبت اطلاعات مواد اولیه</h7>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" enctype="multipart/form-data" role="form"
                              autocomplete="off" id="form_add_early_materials">
                            @csrf
                            <div class="box-body">

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="material_id">نوع مواد</label>
                                        <select style="width: 100%" dir="rtl" class="form-control material_id"
                                                id="material_id" name="material_id">
                                            <option value="">انتخاب کنید</option>
                                            @foreach($Materials as $Material)
                                                <option value="{{$Material->id}}">{{$Material->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="grade_id">نوع گرید</label>
                                        <select style="width: 100%" dir="rtl" class="form-control grade_id"
                                                id="grade_id" name="grade_id">
                                            <option value="">انتخاب کنید</option>
                                            @foreach($Grades as $Grade)
                                                <option value="{{$Grade->id}}">{{$Grade->code}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="petrochemical_id">پتروشیمی</label>
                                        <select style="width: 100%" dir="rtl" class="form-control petrochemical_id"
                                                id="petrochemical_id" name="petrochemical_id">
                                            <option value="">انتخاب کنید</option>
                                            @foreach($Petrochemicals as $Petrochemical)
                                                <option value="{{$Petrochemical->id}}">{{$Petrochemical->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="quality_materials_id ">درجه کیفی</label>
                                        <select style="width: 100%" dir="rtl" class="form-control quality_materials_id"
                                                id="quality_materials_id " name="quality_materials_id">
                                            <option value="">انتخاب کنید</option>
                                            @foreach($QualityMaterials as $QualityMaterial)
                                                <option
                                                    value="{{$QualityMaterial->id}}">{{$QualityMaterial->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="current_price">قیمت فعلی</label>
                                        <input onkeyup="this.value=separate(this.value);" type="text"
                                               class="form-control"
                                               id="current_price" name="current_price" placeholder="قیمت فعلی">
                                    </div>


                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_add_early_materials" class="btn btn-primary btn_add_early_materials">ثبت</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="edit-early_materials" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header" style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                <button type="button" style="background-color: red" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                </button>
                <h7 class="modal-title" style="font-family: Shabnam">ویرایش اطلاعات مواد اولیه</h7>
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
                              autocomplete="off" id="form_edit_early_materials">
                            @csrf
                            <input type="hidden" id="id" name="id">

                            <div class="box-body">

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="material_id">نوع مواد</label>
                                        <select style="width: 100%" dir="rtl" class="form-control edit_material_id"
                                                id="edit_material_id" name="edit_material_id">
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="grade_id">نوع گرید</label>
                                        <select style="width: 100%" dir="rtl" class="form-control edit_grade_id"
                                                id="edit_grade_id" name="edit_grade_id">
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="petrochemical_id">پتروشیمی</label>
                                        <select style="width: 100%" dir="rtl" class="form-control edit_petrochemical_id"
                                                id="edit_petrochemical_id" name="edit_petrochemical_id">
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="quality_materials_id ">درجه کیفی</label>
                                        <select style="width: 100%" dir="rtl" class="form-control edit_quality_materials_id"
                                                id="edit_quality_materials_id" name="edit_quality_materials_id">
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="current_price">قیمت فعلی</label>
                                        <input onkeyup="this.value=separate(this.value);" type="text"
                                               class="form-control"
                                               id="edit_current_price" name="edit_current_price" placeholder="قیمت فعلی">
                                    </div>


                                </div>


                            </div>
                        </form>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">انصراف</button>
                <a id="btn_add_early_materials" class="btn btn-primary btn_edit_early_materials">ثبت</a>
            </div>
        </div>
    </div>
</div>

