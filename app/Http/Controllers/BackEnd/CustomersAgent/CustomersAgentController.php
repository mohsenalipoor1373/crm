<?php

namespace App\Http\Controllers\BackEnd\CustomersAgent;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\CustomersAgent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomersAgentController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customers::orderBy('id', 'DESC')->get();
        $data = CustomersAgent::orderBy('id', 'DESC')->get();


        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست نماینده مشتریان</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>کد</th>
            <th>کد مشتری</th>
            <th>نام نماینده</th>
            <th>سمت</th>
            <th>شماره تماس</th>
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
             <td>{$item->code}</td>
             <td>{$item->customer->code}</td>
             <td>{$item->name}</td>
             <td>{$item->side}</td>
             <td>{$item->phone}</td>

             <td>
             <a href='#' class='fa fa-edit edit_customers_agent' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_customers_agent' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_customers_agent' id='add_customers_agent'
        >تعریف نماینده جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json(['output' => $output]);
        } else {
            return view('FrontEnd.CustomersAgent.index', compact('output', 'customers'));
        }
    }

    public function post_data_customers_agent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'customer_id' => 'required',
            'name' => 'required',
            'side' => 'required',
            'phone' => 'required',
        ], [
            'customer_id.required' => 'انتخاب مشتری الزامی میباشد',
            'code.required' => 'وارد کردن کد الزامی میباشد',
            'name.required' => 'وارد کردن نام الزامی میباشد',
            'side.required' => 'وارد کردن سمت الزامی میباشد',
            'phone.required' => 'وارد کردن شماره تماس الزامی میباشد',
        ]);
        if ($validator->passes()) {
            CustomersAgent::create([
                'code' => $request['code'],
                'customer_id' => $request['customer_id'],
                'name' => $request['name'],
                'side' => $request['side'],
                'phone' => $request['phone'],
            ]);
            return response()->json(['success' => 'مشخصات نماینده با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_customers_agent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_code' => 'required',
            'edit_customer_id' => 'required',
            'edit_name' => 'required',
            'edit_side' => 'required',
            'edit_phone' => 'required',
        ], [
            'edit_customer_id.required' => 'انتخاب مشتری الزامی میباشد',
            'edit_code.required' => 'وارد کردن کد الزامی میباشد',
            'edit_name.required' => 'وارد کردن نام الزامی میباشد',
            'edit_side.required' => 'وارد کردن سمت الزامی میباشد',
            'edit_phone.required' => 'وارد کردن شماره تماس الزامی میباشد',
        ]);
        if ($validator->passes()) {
            CustomersAgent::findOrFail($request->id)->update(
                [
                    'code' => $request['edit_code'],
                    'customer_id' => $request['edit_customer_id'],
                    'name' => $request['edit_name'],
                    'side' => $request['edit_side'],
                    'phone' => $request['edit_phone'],
                ]
            );
            return response()->json(['success' => 'مشخصات نماینده با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_customers_agent(Request $request)
    {
        $data = CustomersAgent::findOrFail($request->id);
        $customers = Customers::orderBy('id', 'DESC')->get();
        return response()->json(['data' => $data, 'customers' => $customers]);
    }

    public function remove_customers_agent(Request $request)
    {
        CustomersAgent::findOrFail($request->id)->delete();
        return response()->json(['success' => 'نماینده مشتری با موفقیت از سیستم حذف شد']);
    }
}
