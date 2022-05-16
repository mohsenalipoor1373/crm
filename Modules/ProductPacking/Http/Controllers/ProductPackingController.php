<?php

namespace Modules\ProductPacking\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\EssentialsPacking\Entities\EssentialsPacking;
use Modules\Product\Entities\Product;
use Modules\ProductPacking\Entities\ProductPacking;
use Validator;

class ProductPackingController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::orderBy('id', 'DESC')->get();
        $essentials_packings = EssentialsPacking::orderBy('id', 'DESC')->get();
        $data = ProductPacking::orderBy('id', 'DESC')->get();


        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست بسته بندی محصولات</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>نام محصول</th>
            <th>بسته بندی</th>
            <th>تعداد محصول در بسته</th>
            <th>تعداد کارتن در بسته</th>
            <th>تعداد بسته در پالت</th>
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
             <td>{$item->products->name}</td>
             <td>{$item->essentials_packing->essentials_packing_type->name} {$item->essentials_packing->name}</td>
             <td>{$item->number_products_package}</td>
             <td>{$item->number_cartons_package}</td>
             <td>{$item->number_packages_pallet}</td>
             <td>
             <a href='#' class='fa fa-edit edit_product_packing' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_product_packing' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_product_packing' id='add_product_packing'
        >تعریف بسته بندی جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json(['output' => $output]);
        } else {
            return view('productpacking::index', compact('output', 'essentials_packings', 'products'));
        }
    }

    public function post_data_product_packing(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'essentials_packing_id' => 'required',
        ], [
            'product_id.required' => 'انتخاب محصول الزامی میباشد',
            'essentials_packing_id.required' => 'انتخاب بسته بندی الزامی میباشد',

        ]);
        if ($validator->passes()) {
            ProductPacking::create([
                'code' => $request['code'],
                'product_id' => $request['product_id'],
                'essentials_packing_id' => $request['essentials_packing_id'],
                'number_products_package' => $request['number_products_package'],
                'number_cartons_package' => $request['number_cartons_package'],
                'number_packages_pallet' => $request['number_packages_pallet'],
            ]);
            return response()->json(['success' => 'مشخصات بسته بندی محصولات با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_product_packing(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_product_id' => 'required',
            'edit_essentials_packing_id' => 'required',
        ], [
            'edit_product_id.required' => 'انتخاب محصول الزامی میباشد',
            'edit_essentials_packing_id.required' => 'انتخاب بسته بندی الزامی میباشد',

        ]);
        if ($validator->passes()) {
            ProductPacking::findOrFail($request->id)->update(
                [
                    'code' => $request['edit_code'],
                    'product_id' => $request['edit_product_id'],
                    'essentials_packing_id' => $request['edit_essentials_packing_id'],
                    'number_products_package' => $request['edit_number_products_package'],
                    'number_cartons_package' => $request['edit_number_cartons_package'],
                    'number_packages_pallet' => $request['edit_number_packages_pallet'],
                ]
            );
            return response()->json(['success' => 'مشخصات بسته بندی محصولات با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_product_packing(Request $request)
    {
        $data = ProductPacking::findOrFail($request->id);
        $essentials_packings = EssentialsPacking::with('essentials_packing_type')->orderBy('id', 'DESC')->get();
        $products = Product::orderBy('id', 'DESC')->get();
        return response()->json(['data' => $data, 'essentials_packings' => $essentials_packings
            , 'products' => $products]);
    }

    public function remove_product_packing(Request $request)
    {
        ProductPacking::findOrFail($request->id)->delete();
        return response()->json(['success' => 'بسته بندی با موفقیت از سیستم حذف شد']);
    }
}
