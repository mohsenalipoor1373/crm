<?php

namespace App\Http\Controllers\BackEnd\Stores;

use App\Http\Controllers\Controller;
use App\Models\Stores;
use App\Models\StoresType;
use Illuminate\Http\Request;
use Validator;

class StoresController extends Controller
{
    public function index(Request $request)
    {
        $storestypes = StoresType::orderBy('id', 'DESC')->get();
        $data = Stores::orderBy('id', 'DESC')->get();


        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست انبارها</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>کد انبار</th>
            <th>نوع انبار</th>
            <th>پیشوند</th>
            <th>محل فیزیکی</th>
            <th>ظرفیت تعدادی</th>
            <th>ظرفیت وزنی</th>
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
             <td>{$item->stores_type->name}</td>
             <td>$item->prefix</td>
             <td>$item->location</td>
             <td>$item->capacity_number</td>
             <td>$item->capacity_weight</td>
             <td>
             <a href='#' class='fa fa-edit edit_stores' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_stores' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_stores' id='add_stores'
        >تعریف انبار جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json(['output' => $output, 'storestypes' => $storestypes]);
        } else {
            return view('FrontEnd.Stores.index', compact('output', 'storestypes'));
        }
    }

    public function post_data_stores(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'stores_type_id' => 'required',
            'prefix' => 'required',
            'location' => 'required',
            'capacity_number' => 'required',
            'capacity_weight' => 'required',
        ], [
            'code.required' => 'وارد کردن کد انبار الزامی میباشد',
            'stores_type_id.required' => 'وارد کردن نوع انبار الزامی میباشد',
            'prefix.required' => 'وارد کردن پیشوند الزامی میباشد',
            'location.required' => 'وارد کردن محل فیزیکی الزامی میباشد',
            'capacity_number.required' => 'وارد کردن ظرفیت تعدادی الزامی میباشد',
            'capacity_weight.required' => 'وارد کردن ظرفیت وزنی الزامی میباشد',
        ]);
        if ($validator->passes()) {
            Stores::create([
                'code' => $request['code'],
                'stores_type_id' => $request['stores_type_id'],
                'prefix' => $request['prefix'],
                'location' => $request['location'],
                'capacity_number' => $request['capacity_number'],
                'capacity_weight' => $request['capacity_weight'],
            ]);
            return response()->json(['success' => 'مشخصات انبار با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_stores(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_code' => 'required',
            'edit_stores_type_id' => 'required',
            'edit_prefix' => 'required',
            'edit_location' => 'required',
            'edit_capacity_number' => 'required',
            'edit_capacity_weight' => 'required',
        ], [
            'edit_code.required' => 'وارد کردن کد انبار الزامی میباشد',
            'edit_stores_type_id.required' => 'وارد کردن نوع انبار الزامی میباشد',
            'edit_prefix.required' => 'وارد کردن پیشوند الزامی میباشد',
            'edit_location.required' => 'وارد کردن محل فیزیکی الزامی میباشد',
            'edit_capacity_number.required' => 'وارد کردن ظرفیت تعدادی الزامی میباشد',
            'edit_capacity_weight.required' => 'وارد کردن ظرفیت وزنی الزامی میباشد',
        ]);
        if ($validator->passes()) {
            Stores::findOrFail($request->id)->update(
                [
                    'code' => $request['edit_code'],
                    'stores_type_id' => $request['edit_stores_type_id'],
                    'prefix' => $request['edit_prefix'],
                    'location' => $request['edit_location'],
                    'capacity_number' => $request['edit_capacity_number'],
                    'capacity_weight' => $request['edit_capacity_weight'],
                ]
            );
            return response()->json(['success' => 'مشخصات انبار با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_stores(Request $request)
    {
        $data = Stores::findOrFail($request->id);
        $storestype = StoresType::orderBy('id', 'DESC')->get();
        return response()->json(['data' => $data, 'storestype' => $storestype]);
    }

    public function remove_stores(Request $request)
    {
        Stores::findOrFail($request->id)->delete();
        return response()->json(['success' => 'انبار با موفقیت از سیستم حذف شد']);
    }


}
