<?php

namespace Modules\ProductAccessories\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use Modules\ProductAccessories\Entities\ProductAccessories;
use Morilog\Jalali\Jalalian;
use Validator;

class ProductAccessoriesController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::orderBy('id', 'DESC')->get();
        $data = ProductAccessories::orderBy('id', 'DESC')->get();


        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست قطعات مونتاژی</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>محصول</th>
            <th>قطعه مونتاژی</th>
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

             <td>{$item->product_parent->name}</td>
             <td>{$item->product->name}</td>

             <td>
             <a href='#' class='fa fa-edit edit_product_accessories' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_product_accessories' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_product_accessories' id='add_product_accessories'
        >تعریف قطعه مونتاژی جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json(['output' => $output]);
        } else {
            return view('productaccessories::index', compact('output', 'products'));
        }
    }

    public function post_data_product_accessories(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id_parent' => 'required',
            'product_id' => 'required',
        ], [
            'product_id_parent.required' => 'انتخاب محصول الزامی میباشد',
            'product_id.required' => 'انتخاب قطعه مونتاژی الزامی میباشد',
        ]);
        if ($validator->passes()) {
            ProductAccessories::create([
                'product_id_parent' => $request['product_id_parent'],
                'product_id' => $request['product_id'],
                'number' => $request['number'],
            ]);
            return response()->json(['success' => 'مشخصات قطعه مونتاژی با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_product_accessories(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_product_id_parent' => 'required',
            'edit_product_id' => 'required',
        ], [
            'edit_product_id_parent.required' => 'انتخاب محصول الزامی میباشد',
            'edit_product_id.required' => 'انتخاب قطعه مونتاژی الزامی میباشد',
        ]);
        if ($validator->passes()) {
            ProductAccessories::findOrFail($request->id)->update(
                [
                    'product_id_parent' => $request['edit_product_id_parent'],
                    'product_id' => $request['edit_product_id'],
                    'number' => $request['edit_number'],
                ]
            );
            return response()->json(['success' => 'مشخصات قطعه مونتاژی با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_product_accessories(Request $request)
    {
        $data = ProductAccessories::findOrFail($request->id);
        $products = Product::orderBy('id', 'DESC')->get();
        return response()->json(['data' => $data, 'products' => $products]);
    }

    public function remove_product_accessories(Request $request)
    {
        ProductAccessories::findOrFail($request->id)->delete();
        return response()->json(['success' => 'قطعه مونتاژی با موفقیت از سیستم حذف شد']);
    }


}
