<?php

namespace App\Http\Controllers\BackEnd\ProductLabel;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\LabelDesign;
use App\Models\Product;
use App\Models\ProductLabel;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use Validator;

class ProductLabelController extends Controller
{
    public function index(Request $request)
    {
        $colors = Color::orderBy('id', 'DESC')->get();
        $products = Product::orderBy('id', 'DESC')->get();
        $label_designs = LabelDesign::orderBy('id', 'DESC')->get();
        $data = ProductLabel::orderBy('id', 'DESC')->get();


        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست محصول و لیبل</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>کد</th>
            <th>محصول</th>
            <th>طرح لیبل</th>
            <th>رنگ</th>
            <th>نام لیبل</th>
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
             <td>{$item->product->name}</td>
             <td>{$item->label_design->name}</td>
             <td>{$item->color->name}</td>
             <td>{$item->name}</td>

             <td>
             <a href='#' class='fa fa-edit edit_product_label' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_product_label' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_product_label' id='add_product_label'
        >تعریف محصول لیبل جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json(['output' => $output]);
        } else {
            return view('FrontEnd.ProductLabel.index', compact('output',
                'products', 'label_designs', 'colors'));
        }
    }

    public function post_data_product_label(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'name' => 'required',
            'product_id' => 'required',
            'label_design_id' => 'required',
            'color_id' => 'required',
        ], [
            'code.required' => 'وارد کردن کد الزامی میباشد',
            'name.required' => 'وارد کردن نام لیبل الزامی میباشد',
            'product_id.required' => 'انتخاب محصول الزامی میباشد',
            'label_design_id.required' => 'انتخاب طرح لیبل الزامی میباشد',
            'color_id.required' => 'انتخاب رنگ الزامی میباشد',
        ]);
        if ($validator->passes()) {
            ProductLabel::create([
                'code' => $request['code'],
                'name' => $request['name'],
                'product_id' => $request['product_id'],
                'label_design_id' => $request['label_design_id'],
                'color_id' => $request['color_id'],
            ]);
            return response()->json(['success' => 'مشخصات محصول لیبل با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_product_label(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_code' => 'required',
            'edit_name' => 'required',
            'edit_product_id' => 'required',
            'edit_label_design_id' => 'required',
            'edit_color_id' => 'required',
        ], [
            'edit_code.required' => 'وارد کردن کد الزامی میباشد',
            'edit_name.required' => 'وارد کردن نام لیبل الزامی میباشد',
            'edit_product_id.required' => 'انتخاب محصول الزامی میباشد',
            'edit_label_design_id.required' => 'انتخاب طرح لیبل الزامی میباشد',
            'edit_color_id.required' => 'انتخاب رنگ الزامی میباشد',
        ]);
        if ($validator->passes()) {
            ProductLabel::findOrFail($request->id)->update(
                [
                    'code' => $request['edit_code'],
                    'name' => $request['edit_name'],
                    'product_id' => $request['edit_product_id'],
                    'label_design_id' => $request['edit_label_design_id'],
                    'color_id' => $request['edit_color_id'],
                ]
            );
            return response()->json(['success' => 'مشخصات محصول لیبل با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_product_label(Request $request)
    {
        $data = ProductLabel::findOrFail($request->id);
        $colors = Color::orderBy('id', 'DESC')->get();
        $products = Product::orderBy('id', 'DESC')->get();
        $label_designs = LabelDesign::orderBy('id', 'DESC')->get();
        return response()->json(['data' => $data, 'colors' => $colors,
            'products' => $products, 'label_designs' => $label_designs]);
    }

    public function remove_product_label(Request $request)
    {
        ProductLabel::findOrFail($request->id)->delete();
        return response()->json(['success' => 'محصول لیبل با موفقیت از سیستم حذف شد']);
    }


}
