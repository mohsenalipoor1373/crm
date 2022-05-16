<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Color\Entities\Color;
use Modules\ColorMasterbatch\Entities\ColorMasterbatch;
use Modules\Masterbach\Entities\Masterbach;
use Modules\Product\Entities\Product;
use Modules\ProductDim\Entities\ProductDim;
use Modules\ProductIndex\Entities\ProductIndex;
use Modules\ProductShape\Entities\ProductShape;
use Modules\ProductType\Entities\ProductType;
use Morilog\Jalali\Jalalian;
use Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $product_types = ProductType::orderBy('id', 'DESC')->get();
        $product_shapes = ProductShape::orderBy('id', 'DESC')->get();
        $product_indexs = ProductIndex::orderBy('id', 'DESC')->get();
        $product_dims = ProductDim::orderBy('id', 'DESC')->get();
        $data = Product::orderBy('id', 'DESC')->get();


        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست محصول</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>کد</th>
            <th>نام</th>
            <th>نوع</th>
            <th>شکل</th>
            <th>شاخص</th>
            <th>ابعاد</th>
            <th>وزن</th>
            <th>کارمزد</th>
            <th>فی فروش</th>
            <th>ظرفیت تولید</th>
            <th>محل تولید</th>
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
             <td>{$item->code}</td>
             <td>{$item->name}</td>
             <td>{$item->product_type->name}</td>
             <td>{$item->product_shape->name}</td>
             <td>{$item->product_index->name}</td>
             <td>{$item->product_dim->name}</td>
             <td>{$item->weight}</td>
             <td>{$item->wage}</td>
             <td>{$item->per_sale}</td>
             <td>{$item->production_capacity}</td>
             <td>{$item->place_production}</td>
             <td>{$this->status($item->status)}</td>
             <td>
             <a href='#' class='fa fa-edit edit_product' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_product' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-exchange change_product' data-id='{$item->id}' title='تغییر وضعیت' style='color: #00a6ff !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_product' id='add_product'
        >تعریف محصول جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json(['output' => $output]);
        } else {
            return view('product::index', compact('output',
                'product_types', 'product_shapes', 'product_indexs', 'product_dims'));
        }
    }

    public function post_data_product(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'name' => 'required',
            'product_type_id' => 'required',
            'product_shape_id' => 'required',
            'product_index_id' => 'required',
            'product_dim_id' => 'required',
            'weight' => 'required',
            'wage' => 'required',
            'per_sale' => 'required',
            'production_capacity' => 'required',
            'place_production' => 'required',
        ], [
            'code.required' => 'وارد کردن کد محصول الزامی میباشد',
            'name.required' => 'وارد کردن نام محصول الزامی میباشد',
            'product_type_id.required' => 'انتخاب نوع محصول الزامی میباشد',
            'product_shape_id.required' => 'انتخاب شکل محصول الزامی میباشد',
            'product_index_id.required' => 'انتخاب شاخص محصول الزامی میباشد',
            'product_dim_id.required' => 'انتخاب ابعاد محصول الزامی میباشد',
            'weight.required' => 'وارد کردن وزن محصول الزامی میباشد',
            'wage.required' => 'وارد کردن کارمزد محصول الزامی میباشد',
            'per_sale.required' => 'وارد کردن فی فروش محصول الزامی میباشد',
            'production_capacity.required' => 'وارد کردن ظرفیت تولید محصول الزامی میباشد',
            'place_production.required' => 'وارد کردن محل تولید محصول الزامی میباشد',
        ]);
        if ($validator->passes()) {
            Product::create([
                'code' => $request['code'],
                'name' => $request['name'],
                'product_type_id' => $request['product_type_id'],
                'product_shape_id' => $request['product_shape_id'],
                'product_index_id' => $request['product_index_id'],
                'product_dim_id' => $request['product_dim_id'],
                'weight' => $request['weight'],
                'wage' => $request['wage'],
                'per_sale' => $request['per_sale'],
                'production_capacity' => $request['production_capacity'],
                'place_production' => $request['place_production'],
            ]);
            return response()->json(['success' => 'مشخصات محصول با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_product(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_code' => 'required',
            'edit_name' => 'required',
            'edit_product_type_id' => 'required',
            'edit_product_shape_id' => 'required',
            'edit_product_index_id' => 'required',
            'edit_product_dim_id' => 'required',
            'edit_weight' => 'required',
            'edit_wage' => 'required',
            'edit_per_sale' => 'required',
            'edit_production_capacity' => 'required',
            'edit_place_production' => 'required',
        ], [
            'edit_code.required' => 'وارد کردن کد محصول الزامی میباشد',
            'edit_name.required' => 'وارد کردن نام محصول الزامی میباشد',
            'edit_product_type_id.required' => 'انتخاب نوع محصول الزامی میباشد',
            'edit_product_shape_id.required' => 'انتخاب شکل محصول الزامی میباشد',
            'edit_product_index_id.required' => 'انتخاب شاخص محصول الزامی میباشد',
            'edit_product_dim_id.required' => 'انتخاب ابعاد محصول الزامی میباشد',
            'edit_weight.required' => 'وارد کردن وزن محصول الزامی میباشد',
            'edit_wage.required' => 'وارد کردن کارمزد محصول الزامی میباشد',
            'edit_per_sale.required' => 'وارد کردن فی فروش محصول الزامی میباشد',
            'edit_production_capacity.required' => 'وارد کردن ظرفیت تولید محصول الزامی میباشد',
            'edit_place_production.required' => 'وارد کردن محل تولید محصول الزامی میباشد',
        ]);
        if ($validator->passes()) {
            Product::findOrFail($request->id)->update(
                [
                    'code' => $request['edit_code'],
                    'name' => $request['edit_name'],
                    'product_type_id' => $request['edit_product_type_id'],
                    'product_shape_id' => $request['edit_product_shape_id'],
                    'product_index_id' => $request['edit_product_index_id'],
                    'product_dim_id' => $request['edit_product_dim_id'],
                    'weight' => $request['edit_weight'],
                    'wage' => $request['edit_wage'],
                    'per_sale' => $request['edit_per_sale'],
                    'production_capacity' => $request['edit_production_capacity'],
                    'place_production' => $request['edit_place_production'],
                ]
            );
            return response()->json(['success' => 'مشخصات محصول با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_product(Request $request)
    {
        $data = Product::findOrFail($request->id);
        $product_types = ProductType::orderBy('id', 'DESC')->get();
        $product_shapes = ProductShape::orderBy('id', 'DESC')->get();
        $product_indexs = ProductIndex::orderBy('id', 'DESC')->get();
        $product_dims = ProductDim::orderBy('id', 'DESC')->get();
        return response()->json(['data' => $data, 'product_types' => $product_types,
            'product_shapes' => $product_shapes, 'product_indexs' => $product_indexs,
            'product_dims' => $product_dims]);
    }

    public function remove_product(Request $request)
    {
        Product::findOrFail($request->id)->delete();
        return response()->json(['success' => 'محصول با موفقیت از سیستم حذف شد']);
    }

    public function change_product(Request $request)
    {
        $item = Product::findOrFail($request->id);
        if ($item->status) {
            $status = "";
        } else {
            $status = 1;
        }
        $item->update([
            'status' => $status
        ]);
        return response()->json(['success' => 'وضعیت محصول با موفقیت در سیستم تغییر کرد']);
    }

    public function status($val)
    {
        if ($val == 1) {
            $status = "غیرفعال";
        } else {
            $status = "فعال";
        }
        return $status;

    }

    public function date($val)
    {
        $date = Jalalian::forge($val)->format('Y/m/d');
        return $date;
    }
}
