<?php

namespace App\Http\Controllers\BackEnd\CustomersBrands;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\CustomersBrands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomersBrandsController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customers::orderBy('id', 'DESC')->get();
        $data = CustomersBrands::orderBy('id', 'DESC')->get();


        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست برند مشتریان</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>کد</th>
            <th>کد مشتری</th>
            <th>برند</th>
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

             <td>
             <a href='#' class='fa fa-edit edit_customers_brands' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_customers_brands' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_customers_brands' id='add_customers_brands'
        >تعریف برند جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json(['output' => $output]);
        } else {
            return view('FrontEnd.CustomersBrands.index', compact('output', 'customers'));
        }
    }

    public function post_data_customers_brands(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'customer_id' => 'required',
            'name' => 'required',
        ], [
            'customer_id.required' => 'انتخاب مشتری الزامی میباشد',
            'code.required' => 'وارد کردن کد الزامی میباشد',
            'name.required' => 'وارد کردن نام الزامی میباشد',
        ]);
        if ($validator->passes()) {
            CustomersBrands::create([
                'code' => $request['code'],
                'customer_id' => $request['customer_id'],
                'name' => $request['name'],
            ]);
            return response()->json(['success' => 'مشخصات برند با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_customers_brands(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_code' => 'required',
            'edit_customer_id' => 'required',
            'edit_name' => 'required',
        ], [
            'edit_customer_id.required' => 'انتخاب مشتری الزامی میباشد',
            'edit_code.required' => 'وارد کردن کد الزامی میباشد',
            'edit_name.required' => 'وارد کردن نام الزامی میباشد',
        ]);
        if ($validator->passes()) {
            CustomersBrands::findOrFail($request->id)->update(
                [
                    'code' => $request['edit_code'],
                    'customer_id' => $request['edit_customer_id'],
                    'name' => $request['edit_name'],
                ]
            );
            return response()->json(['success' => 'مشخصات برند با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_customers_brands(Request $request)
    {
        $data = CustomersBrands::findOrFail($request->id);
        $customers = Customers::orderBy('id', 'DESC')->get();
        return response()->json(['data' => $data, 'customers' => $customers]);
    }

    public function remove_customers_brands(Request $request)
    {
        CustomersBrands::findOrFail($request->id)->delete();
        return response()->json(['success' => 'برند مشتری با موفقیت از سیستم حذف شد']);
    }
}
