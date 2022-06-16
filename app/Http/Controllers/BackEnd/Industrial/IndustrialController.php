<?php

namespace App\Http\Controllers\BackEnd\Industrial;

use App\Http\Controllers\Controller;
use App\Models\Industrial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndustrialController extends Controller
{
    public function index(Request $request)
    {
        $data = Industrial::orderBy('id', 'DESC')->get();
        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست صنایع</th>
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
             <a href='#' class='fa fa-edit edit_color' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_color' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_industrial' id='add_industrial'
        >تعریف صنایع جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json($output);
        } else {
            return view('FrontEnd.Industrial.index', compact('output'));
        }
    }

    public function post_data_industrial(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], [
            'name.required' => 'وارد کردن نام الزامی میباشد',
        ]);
        if ($validator->passes()) {
            Industrial::create([
                'name' => $request['name'],
            ]);
            return response()->json(['success' => 'مشخصات صنایع با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_industrial(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_name' => 'required',
        ], [
            'edit_name.required' => 'وارد کردن نام الزامی میباشد',
        ]);
        if ($validator->passes()) {
            industrial::findOrFail($request->id)->update(
                [
                    'name' => $request->edit_name,
                ]
            );
            return response()->json(['success' => 'مشخصات صنایع با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_industrial(Request $request)
    {
        $permissions = industrial::findOrFail($request->id);
        return response()->json($permissions);
    }

    public function remove_industrial(Request $request)
    {
        industrial::findOrFail($request->id)->delete();
        return response()->json(['success' => 'صنایع با موفقیت از سیستم حذف شد']);
    }
}
