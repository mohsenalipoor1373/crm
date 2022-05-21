<script>

    window.addEventListener('beforeunload', function () {
        $('.loader').show();

    });
    window.addEventListener('unload', function () {
        $('.loader').show();

    });

    $(window).on('load', function () {
        $('.loader').show();
    });
</script>
<script src="{{asset('assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('assets/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('assets/dist/js/pages/dashboard.js')}}"></script>
<script src="{{asset('assets/dist/js/tata.js')}}"></script>
<script src="{{asset('assets/js/sweetalert2.all.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/datatable.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/datatables.bootstrap.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/select2.min.js')}}" type="text/javascript"></script>

@yield('script')

<script>

    $(window).on('load', function () {
        $('.loader').fadeOut(200);
    });

</script>

<script>
    function separate(Number) {
        Number += '';
        Number = Number.replace(',', '');
        x = Number.split('.');
        y = x[0];
        z = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(y))
            y = y.replace(rgx, '$1' + ',' + '$2');
        return y + z;
    }

    $('[data-toggle="tooltip"]').tooltip({
        'placement': 'top'
    });
    $('[data-toggle="popover"]').popover({
        trigger: 'hover',
        'placement': 'bottom'
    });

    $('#userNameField').tooltip({
        'show': true,
        'placement': 'bottom',
        'title': "Please remember to..."
    });
    $('#userNameField').tooltip('show');

    $('body').on('click', '.search_customer', function () {
        $('#modal-search_customer').modal('show');
    });

    function delay(callback, ms) {
        var timer = 0;
        return function () {
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
                callback.apply(context, args);
            }, ms || 0);
        };
    }

    $('body').on('keyup', '.input_search_customer', delay(function (e) {
        $('.load_modal_customer').show();

        var input = $('.input_search_customer').val();
        $.ajax({
            url: "{{route('search_customer_index')}}",
            data: {input},
            type: 'GET',
            success: function (data) {
                $('#li').empty();
                if (data.length > 0) {
                    for (i = 0; i < data.length; i++) {
                        var name = data[i].name;
                        var id = data[i].id;
                        var url = '{{ route("customer_page", ":id") }}';
                        url = url.replace(':id', id);

                        $('#li').append(
                            '<a href="' + url + '"><p>' + name + '</p></a>'
                        );
                    }
                } else {
                    $('#li').append(
                        "<p class='text-center'>موردی یافت نشد !</p>"
                    );
                }
                $('.load_modal_customer').hide();

            },
            error: function (request, status, error) {
                tata.error('خطا', 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', {
                    position: 'bl',
                    duration: 8000,
                    animate: 'slide'
                });
            }
        });
    }, 600));


</script>
