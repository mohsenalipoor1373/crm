<?php

namespace App\Http\Controllers\BackEnd\LabelType;

use App\Http\Controllers\Controller;
use App\Models\LabelType;
use App\Models\StoresType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LabelTypeController extends Controller
{
    public function index(Request $request)
    {
        $data = LabelType::orderBy('id', 'DESC')->get();
        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست انواع لیبل</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>کد</th>
            <th>شرح</th>
            <th>وضعیت</th>
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
             <td>$item->text</td>
             <td>{$this->status($item->status)}</td>
             <td>
             <a href='#' class='fa fa-edit edit_label_type' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_label_type' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_label_type' id='add_label_type'
        >تعریف نوع لیبل جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json($output);
        } else {
            return view('FrontEnd.LabelType.index', compact('output'));
        }
    }

    public function post_data_label_type(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'text' => 'required',
        ], [
            'code.required' => 'وارد کردن کد الزامی میباشد',
            'text.required' => 'وارد کردن شرح الزامی میباشد',
        ]);
        if ($validator->passes()) {
            LabelType::create([
                'code' => $request['code'],
                'text' => $request['text'],
            ]);
            return response()->json(['success' => 'مشخصات نوع لیبل با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_label_type(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_code' => 'required',
            'edit_text' => 'required',
        ], [
            'edit_code.required' => 'وارد کردن کد الزامی میباشد',
            'edit_text.required' => 'وارد کردن شرح الزامی میباشد',
        ]);
        if ($validator->passes()) {
            LabelType::findOrFail($request->id)->update(
                [
                    'code' => $request['edit_code'],
                    'text' => $request['edit_text'],
                ]
            );
            return response()->json(['success' => 'مشخصات نوع لیبل با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_label_type(Request $request)
    {
        $permissions = LabelType::findOrFail($request->id);
        return response()->json($permissions);
    }

    public function remove_label_type(Request $request)
    {
        LabelType::findOrFail($request->id)->delete();
        return response()->json(['success' => 'نوع لیبل با موفقیت از سیستم حذف شد ']);
    }

    public function status($val)
    {
        if ($val == 0) {
            $status = "فعال";
        } else {
            $status = "غیرفعال";
        }
        return $status;
    }
}
