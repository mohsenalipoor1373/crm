<script>

    window.addEventListener('beforeunload',function (){
        $('.loader').show();

    });
    window.addEventListener('unload',function (){
        $('.loader').show();

    });

    $(window).on('load',function (){
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

    $(window).on('load',function (){
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
</script>
