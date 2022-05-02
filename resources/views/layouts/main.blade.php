<!DOCTYPE html>
<html lang="fa">
@include('partials.css')
<body class="hold-transition skin-blue sidebar-mini" style="font-family: Shabnam"
onload="myLoader()" >

<div class="wrapper">

    @include('partials.header')

    @include('partials.aside')

    <div class="content-wrapper">
        <div class="loader"></div>
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

                </div>

            </div>
        </section>








    </div>
</div>

@include('partials.js')

</body>
</html>
