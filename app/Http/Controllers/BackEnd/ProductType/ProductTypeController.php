<?php

namespace App\Http\Controllers\BackEnd\ProductType;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Validator;

class ProductTypeController extends Controller
{
    public function index(Request $request)
    {
        $data = ProductType::orderBy('id', 'DESC')->get();
        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست نوع محصول</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>کد</th>
            <th>نام</th>
            <th>نام لاتین</th>
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
             <td>$item->name_en</td>
             <td>
             <a href='#' class='fa fa-edit edit_product_type' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_product_type' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_product_type' id='add_product_type'
        >تعریف نوع محصول جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json($output);
        } else {
            return view('FrontEnd.ProductType.index', compact('output'));
        }
    }

    public function post_data_product_type(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'name_en' => 'required',
        ], [
            'name.required' => 'وارد کردن نام الزامی میباشد',
            'name_en.required' => 'وارد کردن نام لاتین الزامی میباشد',
        ]);
        if ($validator->passes()) {
            ProductType::create([
                'code' => $request['code'],
                'name' => $request['name'],
                'name_en' => $request['name_en'],
            ]);
            return response()->json(['success' => 'مشخصات نوع محصول با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_product_type(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_name' => 'required',
            'edit_name_en' => 'required',
        ], [
            'edit_name.required' => 'وارد کردن نام الزامی میباشد',
            'edit_name_en.required' => 'وارد کردن نام لاتین الزامی میباشد',
        ]);
        if ($validator->passes()) {
            ProductType::findOrFail($request->id)->update(
                [
                    'code' => $request->edit_code,
                    'name' => $request->edit_name,
                    'name-en' => $request->edit_name_en,
                ]
            );
            return response()->json(['success' => 'مشخصات نوع محصول با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_product_type(Request $request)
    {
        $permissions = ProductType::findOrFail($request->id);
        return response()->json($permissions);
    }

    public function remove_product_type(Request $request)
    {
        ProductType::findOrFail($request->id)->delete();
        return response()->json(['success' => 'نوع محصول با موفقیت از سیستم حذف شد']);
    }
}
