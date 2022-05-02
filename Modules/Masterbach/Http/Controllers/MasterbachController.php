<?php

namespace Modules\Masterbach\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Grouping\Entities\Grouping;
use Modules\Masterbach\Entities\Masterbach;

class MasterbachController extends Controller
{
    public function index(Request $request)
    {
        $data = Masterbach::orderBy('id', 'DESC')->get();
        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست مستربچ</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>کد</th>
            <th>نام</th>
            <th>ابزار</th>
        </tr>
        </thead>
        <tbody>
        ";
        $number = 1;
        foreach ($data as $item) {
            $output .= "
             <tr>
             <td style='background-color: #e5e5e5'>$number</td>
             <td>$item->code</td>
             <td>$item->name</td>
             <td>
             <a href='#' class='fa fa-edit edit_masterbach' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_masterbach' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_masterbach' id='add_masterbach'
        >تعریف مستربچ جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json($output);
        } else {
            return view('masterbach::index', compact('output'));
        }
    }

    public function post_data_masterbach(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code' => 'required|unique:masterbachs',
        ], [
            'name.required' => 'وارد کردن نام مستربچ الزامی میباشد',
            'code.unique' => 'کد مستربچ وارد شده قبلا در سیستم ثبت شده است',
            'code.required' => 'وارد کردن کد مستربچ الزامی میباشد',
        ]);
        if ($validator->passes()) {
            Masterbach::create([
                'name' => $request['name'],
                'code' => $request['code'],
            ]);
            return response()->json(['success' => 'مشخصات مستربچ با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_masterbach(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_name' => 'required',
            'edit_code' => 'required',
        ], [
            'edit_name.required' => 'وارد کردن نام مستربچ الزامی میباشد',
            'edit_code.required' => 'وارد کردن کد مستربچ الزامی میباشد',
        ]);
        if ($validator->passes()) {
            Masterbach::findOrFail($request->id)->update(
                [
                    'name' => $request->edit_name,
                    'code' => $request->edit_code,
                ]
            );
            return response()->json(['success' => 'مشخصات مستربچ با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_masterbach(Request $request)
    {
        $permissions = Masterbach::findOrFail($request->id);
        return response()->json($permissions);
    }

    public function remove_masterbach(Request $request)
    {
        Masterbach::findOrFail($request->id)->delete();
        return response()->json(['success' => 'مستربچ با موفقیت از سیستم حذف شد']);
    }

}
