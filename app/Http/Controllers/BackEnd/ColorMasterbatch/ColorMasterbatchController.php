<?php

namespace App\Http\Controllers\BackEnd\ColorMasterbatch;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\ColorMasterbatch;
use App\Models\Masterbach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Morilog\Jalali\Jalalian;

class ColorMasterbatchController extends Controller
{
    public function index(Request $request)
    {
        $colors = \App\Models\Color::orderBy('id', 'DESC')->get();
        $masterbachs = \App\Models\Masterbach::orderBy('id', 'DESC')->get();
        $data = ColorMasterbatch::orderBy('id', 'DESC')->get();


        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست رنگ و مستربچ</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>رنگ</th>
            <th>مستربچ</th>
            <th>قیمت مستربچ</th>
            <th>درصد اختلاط</th>
            <th>تاریخ ثبت</th>
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
             <td>{$item->color->name}</td>
             <td>{$item->masterbach->name}</td>
             <td>$item->price</td>
             <td>$item->mixing_percentage</td>
             <td>{$this->date($item->created_at)}</td>
             <td>{$this->status($item->status)}</td>

             <td>
             <a href='#' class='fa fa-edit edit_color_masterbatch' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_color_masterbatch' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-exchange change_color_masterbatch' data-id='{$item->id}' title='حذف' style='color: #00a6ff !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_color_masterbatch' id='add_color_masterbatch'
        >تعریف رنگ و مستربچ جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json(['output' => $output, 'colors' => $colors, 'masterbachs' => $masterbachs]);
        } else {
            return view('FrontEnd.ColorMasterbatch.index', compact('output', 'colors', 'masterbachs'));
        }
    }

    public function post_data_color_masterbatch(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'color_id' => 'required',
            'masterbach_id' => 'required',
            'price' => 'required',
            'mixing_percentage' => 'required',
        ], [
            'color_id.required' => 'وارد کردن نام رنگ الزامی میباشد',
            'masterbach_id.required' => 'وارد کردن نام مستربچ الزامی میباشد',
            'price.required' => 'وارد کردن قیمت مستربچ الزامی میباشد',
            'mixing_percentage.required' => 'وارد کردن درصد اختلاط الزامی میباشد',
        ]);
        if ($validator->passes()) {
            ColorMasterbatch::create([
                'color_id' => $request['color_id'],
                'masterbatch_id' => $request['masterbach_id'],
                'price' => $request['price'],
                'mixing_percentage' => $request['mixing_percentage'],
            ]);
            return response()->json(['success' => 'مشخصات رنگ و مستربچ با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_color_masterbatch(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_color_id' => 'required',
            'edit_masterbach_id' => 'required',
            'edit_price' => 'required',
            'edit_mixing_percentage' => 'required',
        ], [
            'edit_color_id.required' => 'وارد کردن نام رنگ الزامی میباشد',
            'edit_masterbach_id.required' => 'وارد کردن نام مستربچ الزامی میباشد',
            'edit_price.required' => 'وارد کردن قیمت مستربچ الزامی میباشد',
            'edit_mixing_percentage.required' => 'وارد کردن درصد اختلاط الزامی میباشد',
        ]);
        if ($validator->passes()) {
            ColorMasterbatch::findOrFail($request->id)->update(
                [
                    'color_id' => $request['edit_color_id'],
                    'masterbatch_id' => $request['edit_masterbach_id'],
                    'price' => $request['edit_price'],
                    'mixing_percentage' => $request['edit_mixing_percentage'],
                ]
            );
            return response()->json(['success' => 'مشخصات رنگ و مستربچ با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_color_masterbatch(Request $request)
    {
        $data = ColorMasterbatch::findOrFail($request->id);
        $colors = Color::orderBy('id', 'DESC')->get();
        $masterbachs = Masterbach::orderBy('id', 'DESC')->get();
        return response()->json(['data' => $data, 'colors' => $colors, 'masterbachs' => $masterbachs]);
    }

    public function remove_color_masterbatch(Request $request)
    {
        ColorMasterbatch::findOrFail($request->id)->delete();
        return response()->json(['success' => 'رنگ و مستربچ با موفقیت از سیستم حذف شد']);
    }

    public function change_color_masterbatch(Request $request)
    {
        $item = ColorMasterbatch::findOrFail($request->id);
        if ($item->status) {
            $status = "";
        } else {
            $status = 1;
        }
        $item->update([
            'status' => $status
        ]);
        return response()->json(['success' => 'وضعیت رنگ و مستربچ با موفقیت در سیستم تغییر کرد']);
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
