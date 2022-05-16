<?php

namespace Modules\EssentialsPacking\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\EssentialsPacking\Entities\EssentialsPacking;
use Modules\EssentialsPackingType\Entities\EssentialsPackingType;
use Validator;

class EssentialsPackingController extends Controller
{
    public function index(Request $request)
    {
        $essentials_packing_types = EssentialsPackingType::orderBy('id', 'DESC')->get();
        $data = EssentialsPacking::orderBy('id', 'DESC')->get();


        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست ملزومات بسته بندی</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>کد</th>
            <th>نام</th>
            <th>سایز</th>
            <th>نوع ملزومات</th>
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
             <td>{$item->size}</td>
             <td>{$item->essentials_packing_type->name}</td>


             <td>
             <a href='#' class='fa fa-edit edit_essentials_packing' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_essentials_packing' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_essentials_packing' id='add_essentials_packing'
        >تعریف ملزومات بسته بندی جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json(['output' => $output]);
        } else {
            return view('essentialspacking::index', compact('output', 'essentials_packing_types'));
        }
    }

    public function post_data_essentials_packing(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'essentials_packing_type_id' => 'required',
            'name' => 'required',
            'size' => 'required',
        ], [
            'essentials_packing_type_id.required' => 'انتخاب نوع ملزومات الزامی میباشد',
            'code.required' => 'وارد کردن کد الزامی میباشد',
            'name.required' => 'وارد کردن نام الزامی میباشد',
            'size.required' => 'وارد کردن سایز الزامی میباشد',
        ]);
        if ($validator->passes()) {
            EssentialsPacking::create([
                'code' => $request['code'],
                'essentials_packing_type_id' => $request['essentials_packing_type_id'],
                'name' => $request['name'],
                'size' => $request['size'],
            ]);
            return response()->json(['success' => 'مشخصات ملزومات بسته بندی با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_essentials_packing(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_code' => 'required',
            'edit_essentials_packing_type_id' => 'required',
            'edit_name' => 'required',
            'edit_size' => 'required',
        ], [
            'edit_essentials_packing_type_id.required' => 'انتخاب نوع ملزومات الزامی میباشد',
            'edit_code.required' => 'وارد کردن کد الزامی میباشد',
            'edit_name.required' => 'وارد کردن نام الزامی میباشد',
            'edit_size.required' => 'وارد کردن سایز الزامی میباشد',
        ]);
        if ($validator->passes()) {
            EssentialsPacking::findOrFail($request->id)->update(
                [
                    'code' => $request['edit_code'],
                    'essentials_packing_type_id' => $request['edit_essentials_packing_type_id'],
                    'name' => $request['edit_name'],
                    'size' => $request['edit_size'],
                ]
            );
            return response()->json(['success' => 'مشخصات ملزومات بسته بندی با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_essentials_packing(Request $request)
    {
        $data = EssentialsPacking::findOrFail($request->id);
        $essentials_packing_type = EssentialsPackingType::orderBy('id', 'DESC')->get();
        return response()->json(['data' => $data, 'essentials_packing_type' => $essentials_packing_type]);
    }

    public function remove_essentials_packing(Request $request)
    {
        EssentialsPacking::findOrFail($request->id)->delete();
        return response()->json(['success' => 'ملزومات بسته بندی با موفقیت از سیستم حذف شد']);
    }


}
