@extends('layouts.main')

<style>
    ul,
    li {
        list-style: none;
        margin: 2px;
        padding: 0
    }

    label {
        font-weight: normal
    }

    /Tree/

    .trees {
        margin-right: 15px;
    }

    .trees li {
        border-right: dotted 1px #bcbec0;
        padding: 1px 0 1px 25px;
        position: relative
    }

    .trees li > label {
        position: relative;
        right: 10px
    }

    .trees li:before {
        content: "";
        width: 13px;
        height: 1px;
        border-bottom: dotted 1px #bcbec0;
        position: absolute;
        top: 10px;
        right: 0
    }

    .trees li:last-child:after {
        content: "";
        position: absolute;
        width: 2px;
        height: 13px;
        background: #fff;
        right: -1px;
        bottom: 0px;
    }

    .trees li input {
        margin-right: 5px;
        margin-left: 5px
    }

    .trees li.has-child > ul {
        display: none
    }

    .trees li.has-child > input {
        opacity: 0;
        position: absolute;
        right: -14px;
        z-index: 9999;
        width: 22px;
        height: 22px;
        top: -5px
    }

    .trees li.has-child > input + .tree-control {
        position: absolute;
        right: -4px;
        top: 6px;
        width: 8px;
        height: 8px;
        line-height: 8px;
        z-index: 2;
        display: inline-block;
        color: #fff;
        border-radius: 3px;
    }

    .trees li.has-child > input + .tree-control:after {
        font-family: 'FontAwesome';
        content: "";
        font-size: 15px;
        color: #183955;
        position: absolute;
        right: 1px
    }

    .trees li.has-child > input:checked + .tree-control:after {
        font-family: 'FontAwesome';
        content: "";
        font-size: 15px;
        color: #183955;
        position: absolute;
        right: 1px
    }

    .trees li.has-child > input:checked ~ ul {
        display: block
    }

    .trees ul li.has-child:last-child {
        border-right: none
    }

    .trees ul li.has-child:nth-last-child(2):after {
        content: "";
        width: 1px;
        height: 5px;
        border-right: dotted 1px #bcbec0;
        position: absolute;
        bottom: -5px;
        right: -1px
    }

    .tree-alt li {
        padding: 4px 0
    }
</style>

@section('content')

    <div style="margin-top: 3%">
        <form method="POST" enctype="multipart/form-data" role="form"
              autocomplete="off" id="form_add_permission_roles">
            @csrf
            <input type="hidden" id="id" name="id" value="{{$id}}">
        <div class="col-md-4">
            <ul class="trees">
                <li class="has-child">
                    <input id="tree-controll1" type="checkbox" class="custom-control-input"><span
                        class="tree-control"></span>
                    <label>
                        <input type="checkbox" class="check" id="users"/>
                        <i class="fa fa-user light-blue"></i>&nbsp; مدیریت کاربران
                    </label>
                    <ul>
                        @foreach($permissions as $value)
                            @if(!empty($value))
                                @if($value->label == "مدیریت کاربران")
                                    <li>
                                        <label>{{ Form::checkbox('permission[]',$value->id,in_array($value->id,$rolePermission)? true : false , array('class'=>'user')) }}
                                            {{$value->name}}
                                        </label>
                                    </li>
                                @endif
                            @endif
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
        <div class="col-md-4">
            <ul class="trees">
                <li class="has-child">
                    <input id="tree-controll1" type="checkbox" class="custom-control-input"><span
                        class="tree-control"></span>
                    <label>
                        <input type="checkbox" class="check" id="users"/>
                        <i class="fa fa-user light-blue"></i>&nbsp; تعاریف پایه
                    </label>
                    <ul>
                        @foreach($permissions as $value)
                            @if(!empty($value))
                                @if($value->label == "تعاریف پایه")
                                    <li>
                                        <label>{{ Form::checkbox('permission[]',$value->id,in_array($value->id,$rolePermission)? true : false , array('class'=>'user')) }}
                                            {{$value->name}}
                                        </label>
                                    </li>
                                @endif
                            @endif
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
        </form>
        <div class="col-md-12" style="margin-top: 3%">
            <a id="btn_add_permission_roles" class="btn btn-primary btn_add_permission_roles">ثبت</a>
            <a class="btn btn-danger" href="{{route('roles')}}">بازگشت</a>
        </div>
    </div>

@endsection
@section('script')
    @include('FrontEnd.Roles.partials.js')
@endsection
