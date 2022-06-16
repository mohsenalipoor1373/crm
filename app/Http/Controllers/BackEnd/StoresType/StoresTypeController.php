<?php

namespace App\Http\Controllers\BackEnd\StoresType;

use App\Http\Controllers\Controller;
use App\Models\StoresType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StoresTypeController extends Controller
{
    public function index(Request $request)
    {
        $data = StoresType::orderBy('id', 'DESC')->get();
        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست انواع انبارها</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
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
             <td>$item->name</td>
             <td>
             <a href='#' class='fa fa-edit edit_stores_type' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_stores_type' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_stores_type' id='add_stores_type'
        >تعریف نوع انبار جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json($output);
        } else {
            return view('FrontEnd.StoresType.index', compact('output'));
        }
    }

    public function post_data_stores_type(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], [
            'name.required' => 'وارد کردن نام  نوع انبار الزامی میباشد',
        ]);
        if ($validator->passes()) {
            StoresType::create([
                'name' => $request['name'],
            ]);
            return response()->json(['success' => 'مشخصات نوع انبار با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_stores_type(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_name' => 'required',
        ], [
            'edit_name.required' => 'وارد کردن نام نوع انبار الزامی میباشد',
        ]);
        if ($validator->passes()) {
            StoresType::findOrFail($request->id)->update(
                [
                    'name' => $request->edit_name,
                ]
            );
            return response()->json(['success' => 'مشخصات نوع انبار با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_stores_type(Request $request)
    {
        $permissions = StoresType::findOrFail($request->id);
        return response()->json($permissions);
    }

    public function remove_stores_type(Request $request)
    {
        StoresType::findOrFail($request->id)->delete();
        return response()->json(['success' => 'نوع انبار با موفقیت از سیستم حذف شد ']);
    }
}
