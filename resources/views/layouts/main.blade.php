<!DOCTYPE html>
<html lang="fa">
@include('partials.css')
<body class="hold-transition skin-blue sidebar-mini" style="font-family: Shabnam">
<div class="loader"></div>

<div class="wrapper">

    @include('partials.header')

    @include('partials.aside')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                <small></small>
            </h1>
            <ol>

            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    @yield('content')
                    <div class="modal fade" id="modal-search_customer" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header"
                                     style="background-color: #e9e9e9;border-bottom-color:#dddddd;cursor: move">
                                    <button type="button" style="background-color: red" class="close"
                                            data-dismiss="modal"
                                            aria-label="Close">
                    <span aria-hidden="true" style="color: white">
                            <img src="{{asset('/public/img/sa.png')}}" width="20">
                    </span>
                                    </button>
                                    <h7 class="modal-title" style="font-family: Shabnam">جستجوی مشتری</h7>
                                </div>
                                <div class="modal-body">
                                    <div class="load_modal_customer" id="load_modal" style="
                                    display: none;
                         position: fixed;
                         opacity: 0.95;
                         left: 0px;
                         top: 0px;
                         width: 100%;
                         height: 100%;
                         z-index: 999999;
                         background: url({{asset('/public/assets/dist/img/ajax-loader.gif')}}) 50% 50% no-repeat #f5f5f5">
                                    </div>
                                    <div class="row">
                                        <div id="ajaxContentDemo" class="row d-none">

                                            <div class="col-md-12">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control input_search_customer"
                                                               id="input_search_customer" name="input_search_customer"
                                                               placeholder="نام مشتری یا برند">
                                                    </div>
                                                    <div id="li">

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </section>


    </div>
</div>

@include('partials.js')

</body>
</html>
