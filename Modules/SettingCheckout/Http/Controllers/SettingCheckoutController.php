<?php

namespace Modules\SettingCheckout\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SettingCheckout\Entities\SettingCheckout;
use Validator;

class SettingCheckoutController extends Controller
{
    public function index(Request $request)
    {
        $data = SettingCheckout::orderBy('id', 'DESC')->get();
        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست تنظیمات تسویه حساب</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>نوع</th>
            <th>تسویه قبل از تولید</th>
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
             <td>$item->type</td>
             <td>{$this->status($item->status)}</td>
             <td>
             <a href='#' class='fa fa-edit edit_setting_checkout' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_setting_checkout' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_setting_checkout' id='add_setting_checkout'
        >تعریف تنظیمات جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json($output);
        } else {
            return view('settingcheckout::index', compact('output'));
        }
    }

    public function post_data_setting_checkout(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'status' => 'required',
        ], [
            'name.required' => 'وارد کردن نوع الزامی میباشد',
            'status.required' => 'انتخاب فیلد تسویه قبل از تولید الزامی میباشد',
        ]);
        if ($validator->passes()) {
            SettingCheckout::create([
                'type' => $request['type'],
                'status' => $request['status'],
            ]);
            return response()->json(['success' => 'مشخصات تنظیمات با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_setting_checkout(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_type' => 'required',
            'edit_status' => 'required',
        ], [
            'edit_name.required' => 'وارد کردن نوع الزامی میباشد',
            'edit_status.required' => 'انتخاب فیلد تسویه قبل از تولید الزامی میباشد',
        ]);
        if ($validator->passes()) {
            SettingCheckout::findOrFail($request->id)->update(
                [
                    'type' => $request->edit_type,
                    'status' => $request->edit_status
                ]
            );
            return response()->json(['success' => 'مشخصات تنظیمات با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_setting_checkout(Request $request)
    {
        $permissions = SettingCheckout::findOrFail($request->id);
        return response()->json($permissions);
    }

    public function remove_setting_checkout(Request $request)
    {
        SettingCheckout::findOrFail($request->id)->delete();
        return response()->json(['success' => 'تنظیمات با موفقیت از سیستم حذف شد']);
    }

    public function status($val)
    {
        if ($val == 0) {
            $status = "اختیاری";
        } else {
            $status = "الزامی";
        }
        return $status;
    }
}
