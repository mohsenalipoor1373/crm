<?php

namespace Modules\EssentialsDealers\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\EssentialsDealers\Entities\EssentialsDealers;
use Modules\EssentialsPacking\Entities\EssentialsPacking;
use Validator;

class EssentialsDealersController extends Controller
{
    public function index(Request $request)
    {
        $essentials_packings = EssentialsPacking::orderBy('id', 'DESC')->get();
        $data = EssentialsDealers::orderBy('id', 'DESC')->get();


        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست تامیین کننده</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>کد</th>
            <th>نام شرکت</th>
            <th>نام نماینده</th>
            <th>تلفن</th>
            <th>محصول مورد تامیین</th>
            <th>توضیحات</th>
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
             <td>{$item->company_name}</td>
             <td>{$item->representative_name}</td>
             <td>{$item->phone}</td>
             <td>{$item->essentials_packing->name}</td>
             <td>{$item->description}</td>


             <td>
             <a href='#' class='fa fa-edit edit_essentials_dealers' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_essentials_dealers' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_essentials_dealers' id='add_essentials_dealers'
        >تعریف تامیین کننده جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json(['output' => $output]);
        } else {
            return view('essentialsdealers::index', compact('output', 'essentials_packings'));
        }
    }

    public function post_data_essentials_dealers(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'essentials_packing_id' => 'required',
        ], [
            'essentials_packing_id.required' => 'انتخاب ملزومات الزامی میباشد',
            'code.required' => 'وارد کردن کد الزامی میباشد',

        ]);
        if ($validator->passes()) {
            EssentialsDealers::create([
                'code' => $request['code'],
                'essentials_packing_id' => $request['essentials_packing_id'],
                'representative_name' => $request['representative_name'],
                'company_name' => $request['company_name'],
                'phone' => $request['phone'],
                'description' => $request['description'],
            ]);
            return response()->json(['success' => 'مشخصات تامیین کننده با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_essentials_dealers(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_code' => 'required',
            'edit_essentials_packing_id' => 'required',
        ], [
            'edit_essentials_packing_id.required' => 'انتخاب ملزومات الزامی میباشد',
            'edit_code.required' => 'وارد کردن کد الزامی میباشد',

        ]);
        if ($validator->passes()) {
            EssentialsDealers::findOrFail($request->id)->update(
                [
                    'code' => $request['edit_code'],
                    'essentials_packing_id' => $request['edit_essentials_packing_id'],
                    'representative_name' => $request['edit_representative_name'],
                    'company_name' => $request['edit_company_name'],
                    'phone' => $request['edit_phone'],
                    'description' => $request['edit_description'],
                ]
            );
            return response()->json(['success' => 'مشخصات تامیین کننده با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_essentials_dealers(Request $request)
    {
        $data = EssentialsDealers::findOrFail($request->id);
        $essentials_packings = EssentialsPacking::orderBy('id', 'DESC')->get();
        return response()->json(['data' => $data, 'essentials_packings' => $essentials_packings]);
    }

    public function remove_essentials_dealers(Request $request)
    {
        EssentialsDealers::findOrFail($request->id)->delete();
        return response()->json(['success' => 'تامیین کننده با موفقیت از سیستم حذف شد']);
    }
}
