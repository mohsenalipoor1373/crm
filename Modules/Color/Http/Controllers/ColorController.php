<?php

namespace Modules\Color\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Color\Entities\Color;

class ColorController extends Controller
{
    public function index(Request $request)
    {
        $data = Color::orderBy('id', 'DESC')->get();
        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست رنگ</th>
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
        <a style='margin-top: -72px' class='btn btn-primary add_color' id='add_color'
        >تعریف رنگ جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json($output);
        } else {
            return view('color::index', compact('output'));
        }
    }

    public function post_data_color(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], [
            'name.required' => 'وارد کردن نام رنگ الزامی میباشد',
        ]);
        if ($validator->passes()) {
            Color::create([
                'name' => $request['name'],
            ]);
            return response()->json(['success' => 'مشخصات رنگ با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_color(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_name' => 'required',
        ], [
            'edit_name.required' => 'وارد کردن نام رنگ الزامی میباشد',
        ]);
        if ($validator->passes()) {
            Color::findOrFail($request->id)->update(
                [
                    'name' => $request->edit_name,
                ]
            );
            return response()->json(['success' => 'مشخصات رنگ با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_color(Request $request)
    {
        $permissions = Color::findOrFail($request->id);
        return response()->json($permissions);
    }

    public function remove_color(Request $request)
    {
        Color::findOrFail($request->id)->delete();
        return response()->json(['success' => 'رنگ با موفقیت از سیستم حذف شد']);
    }
}
