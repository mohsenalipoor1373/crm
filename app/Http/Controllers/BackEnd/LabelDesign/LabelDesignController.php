<?php

namespace App\Http\Controllers\BackEnd\LabelDesign;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\LabelDesign;
use App\Models\LabelType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LabelDesignController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customers::all();
        $label_types = LabelType::all();
        $data = LabelDesign::orderBy('id', 'DESC')->get();
        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست طرح لیبل</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>کد</th>
            <th>کد مشتری</th>
            <th>نوع لیبل</th>
            <th>نام طرح</th>
            <th>توضیحات</th>
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
             <td>{$item->customer->code}</td>
             <td>{$item->label_type->text}</td>
             <td>$item->name</td>
             <td>$item->text</td>
             <td>{$this->status($item->status)}</td>
             <td>
             <a href='#' class='fa fa-edit edit_label_design' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_label_design' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_label_design' id='add_label_design'
        >تعریف طرح لیبل جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json($output);
        } else {
            return view('FrontEnd.LabelDesign.index', compact('output',
                'customers', 'label_types'));
        }
    }

    public function post_data_label_design(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'name' => 'required',
            'customer_id' => 'required',
            'label_type_id' => 'required',
        ], [
            'code.required' => 'وارد کردن کد الزامی میباشد',
            'name.required' => 'وارد کردن نام الزامی میباشد',
            'customer_id.required' => 'وارد کردن مشتری الزامی میباشد',
            'label_type_id.required' => 'وارد کردن نوع لیبل الزامی میباشد',
        ]);
        if ($validator->passes()) {
            LabelDesign::create([
                'code' => $request['code'],
                'text' => $request['text'],
                'name' => $request['name'],
                'customer_id' => $request['customer_id'],
                'label_type_id' => $request['label_type_id'],
            ]);
            return response()->json(['success' => 'مشخصات طرح لیبل با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_label_design(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_code' => 'required',
            'edit_name' => 'required',
            'edit_customer_id' => 'required',
            'edit_label_type_id' => 'required',
        ], [
            'edit_code.required' => 'وارد کردن کد الزامی میباشد',
            'edit_name.required' => 'وارد کردن نام الزامی میباشد',
            'edit_customer_id.required' => 'وارد کردن مشتری الزامی میباشد',
            'edit_label_type_id.required' => 'وارد کردن نوع لیبل الزامی میباشد',
        ]);
        if ($validator->passes()) {
            LabelDesign::findOrFail($request->id)->update(
                [
                    'code' => $request['edit_code'],
                    'text' => $request['edit_text'],
                    'name' => $request['edit_name'],
                    'customer_id' => $request['edit_customer_id'],
                    'label_type_id' => $request['edit_label_type_id'],
                ]
            );
            return response()->json(['success' => 'مشخصات طرح لیبل با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_label_design(Request $request)
    {
        $customers = Customers::all();
        $label_types = LabelType::all();
        $permissions = LabelDesign::findOrFail($request->id);
        return response()->json(['permissions' => $permissions, 'customers' => $customers
            , 'label_types' => $label_types]);
    }

    public function remove_label_design(Request $request)
    {
        LabelDesign::findOrFail($request->id)->delete();
        return response()->json(['success' => 'طرح لیبل با موفقیت از سیستم حذف شد ']);
    }

    public function status($val)
    {
        if ($val == 1) {
            $status = "فعال";
        } else {
            $status = "غیرفعال";
        }
        return $status;
    }
}
