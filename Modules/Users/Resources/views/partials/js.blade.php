<script type="text/javascript">


    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });





        function load_table() {
            $.ajax({
                url: "{{route('users_index')}}",
                success: function (res) {
                    $('#TableData').html(res);
                    $('.data-table').DataTable({
                        'paging': true,
                        'searching': true,
                        'ordering': false,
                        'info': false,
                        "language": {
                            "search": "جستجو :",
                            "lengthMenu": "نمایش : _MENU_",
                            "zeroRecords": " موردی یافت نشد !",
                            "info": "نمایش _PAGE_ از _PAGES_",
                            "infoEmpty": " موردی یافت نشد !",
                            "infoFiltered": "(جستجو از _MAX_ مورد)",
                            "processing": "در حال پردازش اطلاعات",
                            'paginate': {
                                'previous': 'قبلی',
                                'next': 'بعدی'
                            }
                        },
                        responsive: true

                    });


                }
            })
        }





        $('.data-table').DataTable({
            'paging': true,
            'searching': true,
            'ordering': false,
            'info': false,
            "language": {
                "search": "جستجو :",
                "lengthMenu": "نمایش : _MENU_",
                "zeroRecords": " موردی یافت نشد !",
                "info": "نمایش _PAGE_ از _PAGES_",
                "infoEmpty": " موردی یافت نشد !",
                "infoFiltered": "(جستجو از _MAX_ مورد)",
                "processing": "در حال پردازش اطلاعات",
                'paginate': {
                    'previous': 'قبلی',
                    'next': 'بعدی'
                }
            },
            responsive: true

        });

        $('body').on('click', '.add_users', function () {
            $('#add-users').modal('show');
        });

        $('body').on('click', '.btn_add_users', function (e) {
            $('.btn_add_users').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_users').html(loadingText);
            e.preventDefault(e);
            var form = $('#form_add_users')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{route('post_data_user')}}",
                data: data,
                type: 'POST',
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        load_table();
                        $('#form_add_users').trigger("reset");
                        $('#add-users').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_users').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_users').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.email) {
                            msg = data.errors.email;
                        } else if (data.errors.fname) {
                            msg = data.errors.fname;
                        } else if (data.errors.lname) {
                            msg = data.errors.lname;
                        } else if (data.errors.role_id) {
                            msg = data.errors.role_id;
                        } else if (data.errors.pass) {
                            msg = data.errors.pass;
                        } else if (data.errors.grouping_id) {
                            msg = data.errors.grouping_id;
                        } else if (data.errors.shift_id) {
                            msg = data.errors.shift_id;
                        }
                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_users').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_users').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_users').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_users').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_edit_users', function (e) {
            $('.btn_edit_users').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_edit_users').html(loadingText);
            e.preventDefault(e);
            var form = $('#form_edit_users')[0];
            var data = new FormData(form);
            $.ajax({
                url: "{{route('post_data_edit_user')}}",
                data: data,
                type: 'POST',
                enctype: 'multipart/form-data',
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                success: function (data) {
                    if (data.status == 2) {
                        tata.error('خطا', 'نام کاربری قبلا در سیستم ثبت شده است', {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_users').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_users').html(loadingText);
                    }
                    if (data.status == 1) {
                        load_table();
                        $('#form_edit_users').trigger("reset");
                        $('#edit-users').modal('hide');
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_users').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_users').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.edit_email) {
                            msg = data.errors.edit_email;
                        } else if (data.errors.edit_fname) {
                            msg = data.errors.edit_fname;
                        } else if (data.errors.edit_lname) {
                            msg = data.errors.edit_lname;
                        } else if (data.errors.edit_role_id) {
                            msg = data.errors.edit_role_id;
                        } else if (data.errors.edit_pass) {
                            msg = data.errors.edit_pass;
                        } else if (data.errors.edit_grouping_id) {
                            msg = data.errors.edit_grouping_id;
                        } else if (data.errors.edit_shift_id) {
                            msg = data.errors.edit_shift_id;
                        }
                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_edit_users').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_edit_users').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_users').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_users').html(loadingText);
                }
            });
        });

        $('body').on('click', '.btn_add_permission_users', function (e) {
            $('.btn_add_permission_users').prop('disabled', true);
            var loadingText = 'در حال بررسی اطلاعات... <i class="fa fa-spinner fa-spin"></i>';
            $('.btn_add_permission_users').html(loadingText);
            e.preventDefault(e);
            $.ajax({
                url: "{{route('post_data_permission_user')}}",
                data: $('#form_add_permission_users').serialize(),
                type: 'POST',
                success: function (data) {
                    if (data.status == 1) {
                        tata.success('موفق', data.success, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_permission_users').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_permission_users').html(loadingText);
                    } else {
                        var msg;
                        if (data.errors.permission) {
                            msg = data.errors.permission;
                        }
                        tata.error('خطا', msg, {
                            position: 'bl',
                            duration: 8000,
                            animate: 'slide'
                        });
                        $('.btn_add_permission_users').prop('disabled', false);
                        var loadingText = 'ثبت';
                        $('.btn_add_permission_users').html(loadingText);
                    }

                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_permission_roles').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_permission_roles').html(loadingText);
                }
            });
        });



        $('body').on('click', '.edit_users', function () {
            $('#edit_shift_id').empty();
            $('#edit_grouping_id').empty();
            $('#edit_role_id').empty();
            $('#load_modal').show();
            $('#edit-users').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('edit_users')}}",
                data: {id},
                type: 'GET',
                success: function (data) {

                    for (i = 0; i < data.roles.length; i++) {
                        $('#edit_role_id').append(
                            "<option value='" + data.roles[i].id + "'>" + data.roles[i].name + "</option>"
                        );
                    }

                    for (i = 0; i < data.groupings.length; i++) {
                        $('#edit_grouping_id').append(
                            "<option value='" + data.groupings[i].id + "'>" + data.groupings[i].name + "</option>"
                        );
                    }

                    for (i = 0; i < data.shifts.length; i++) {
                        $('#edit_shift_id').append(
                            "<option value='" + data.shifts[i].id + "'>" + data.shifts[i].name + "</option>"
                        );
                    }

                    $('#edit_role_id').val(data.users.role_id);
                    $('#edit_grouping_id').val(data.users.grouping_id);
                    $('#edit_shift_id').val(data.users.shift_id);
                    $('#edit_email').val(data.users.email);
                    $('#edit_lname').val(data.users.name);
                    $('#edit_fname').val(data.users.fname);
                    $('#edit_pass').val(data.users.password);
                    $('#id').val(data.users.id);

                    $('#load_modal').fadeOut();
                    $('#ajaxSpinnerDemo').addClass('d-none')
                },
                error: function (request, status, error) {
                    tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                        position: 'bl',
                        duration: 8000,
                        animate: 'slide'
                    });
                    $('.btn_add_users').prop('disabled', false);
                    var loadingText = 'ثبت';
                    $('.btn_add_users').html(loadingText);
                    $('#edit-users').modal('hide');
                    $('#load_modal').fadeOut();

                }
            });
        });

        $('body').on('click', '.ban_users', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از تغییر وضعیت حساب کاربری اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('ban_users')}}",
                        data: {id},
                        type: 'GET',
                        success: function (data) {
                            tata.success('موفق', data.success, {
                                position: 'bl',
                                duration: 8000,
                                animate: 'slide'
                            });
                            load_table();
                        },
                        error: function (request, status, error) {
                            tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                                position: 'bl',
                                duration: 8000,
                                animate: 'slide'
                            });
                        }
                    });
                }
            })

        });

        $('body').on('click', '.remove_users', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'اخطار!',
                text: "آیا از حذف حساب کاربری اطمینان دارید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'تایید',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('remove_users')}}",
                        data: {id},
                        type: 'GET',
                        success: function (data) {
                            tata.success('موفق', data.success, {
                                position: 'bl',
                                duration: 8000,
                                animate: 'slide'
                            });
                            load_table();
                        },
                        error: function (request, status, error) {
                            tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                                position: 'bl',
                                duration: 8000,
                                animate: 'slide'
                            });
                        }
                    });
                }
            })

        });

        $('#users_li').addClass("active");
        $('#users_li_index').addClass("active");
        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });


    });


</script>
<script>
    $('.role_id').select2({
        dropdownParent: $('#add-users'),
        language: {
            noResults: function () {
                return 'سمتی با این مشخصات یافت نشد!'
            }
        }
    });
    $('.grouping_id').select2({
        dropdownParent: $('#add-users'),
        language: {
            noResults: function () {
                return 'محل خدمتی با این مشخصات یافت نشد!'
            }
        }
    });
    $('.shift_id').select2({
        dropdownParent: $('#add-users'),
        language: {
            noResults: function () {
                return 'شیفتی با این مشخصات یافت نشد!'
            }
        }
    });


    $('.edit_role_id').select2({
        dropdownParent: $('#edit-users'),
        language: {
            noResults: function () {
                return 'سمتی با این مشخصات یافت نشد!'
            }
        }
    });
    $('.edit_grouping_id').select2({
        dropdownParent: $('#edit-users'),
        language: {
            noResults: function () {
                return 'محل خدمتی با این مشخصات یافت نشد!'
            }
        }
    });
    $('.edit_shift_id').select2({
        dropdownParent: $('#edit-users'),
        language: {
            noResults: function () {
                return 'شیفتی با این مشخصات یافت نشد!'
            }
        }
    });

</script>
