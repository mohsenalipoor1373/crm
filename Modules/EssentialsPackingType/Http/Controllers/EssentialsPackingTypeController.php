<?php

namespace Modules\EssentialsPackingType\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\EssentialsPackingType\Entities\EssentialsPackingType;
use Validator;

class EssentialsPackingTypeController extends Controller
{
    public function index(Request $request)
    {
        $data = EssentialsPackingType::orderBy('id', 'DESC')->get();
        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست نوع ملزومات</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>کد</th>
            <th>نام</th>
            <th>واحد اندازه گیری</th>
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
             <td>$item->unit_measurement</td>
             <td>
             <a href='#' class='fa fa-edit edit_essentials_packing_type' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_essentials_packing_type' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_essentials_packing_type' id='add_essentials_packing_type'
        >تعریف نوع ملزومات جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json($output);
        } else {
            return view('essentialspackingtype::index', compact('output'));
        }
    }

    public function post_data_essentials_packing_type(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'name' => 'required',
            'unit_measurement' => 'required',
        ], [
            'code.required' => 'وارد کردن کد الزامی میباشد',
            'name.required' => 'وارد کردن نام الزامی میباشد',
            'unit_measurement.required' => 'وارد کردن واحد اندازه گیری الزامی میباشد',
        ]);
        if ($validator->passes()) {
            EssentialsPackingType::create([
                'code' => $request->code,
                'name' => $request->name,
                'unit_measurement' => $request->unit_measurement,
            ]);
            return response()->json(['success' => 'مشخصات نوع ملزومات با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_essentials_packing_type(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_code' => 'required',
            'edit_name' => 'required',
            'edit_unit_measurement' => 'required',
        ], [
            'edit_code.required' => 'وارد کردن کد الزامی میباشد',
            'edit_name.required' => 'وارد کردن نام الزامی میباشد',
            'edit_unit_measurement.required' => 'وارد کردن واحد اندازه گیری الزامی میباشد',
        ]);
        if ($validator->passes()) {
            EssentialsPackingType::findOrFail($request->id)->update(
                [
                    'code' => $request->edit_code,
                    'name' => $request->edit_name,
                    'unit_measurement' => $request->edit_unit_measurement,
                ]
            );
            return response()->json(['success' => 'مشخصات نوع ملزومات با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_essentials_packing_type(Request $request)
    {
        $permissions = EssentialsPackingType::findOrFail($request->id);
        return response()->json($permissions);
    }

    public function remove_essentials_packing_type(Request $request)
    {
        EssentialsPackingType::findOrFail($request->id)->delete();
        return response()->json(['success' => 'نوع ملزومات با موفقیت از سیستم حذف شد']);
    }
}
