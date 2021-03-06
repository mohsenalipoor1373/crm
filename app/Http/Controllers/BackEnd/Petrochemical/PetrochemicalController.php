<?php

namespace App\Http\Controllers\BackEnd\Petrochemical;

use App\Http\Controllers\Controller;
use App\Models\Petrochemical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PetrochemicalController extends Controller
{
    public function index(Request $request)
    {
        $data = Petrochemical::orderBy('id', 'DESC')->get();
        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست پتروشیمی</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>کد</th>
            <th>نام</th>
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
             <td>
             <a href='#' class='fa fa-edit edit_petrochemical' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_petrochemical' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_petrochemical' id='add_petrochemical'
        >تعریف پتروشیمی جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json($output);
        } else {
            return view('FrontEnd.Petrochemical.index', compact('output'));
        }
    }

    public function post_data_petrochemical(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code' => 'required',
        ], [
            'name.required' => 'وارد کردن نام الزامی میباشد',
            'code.required' => 'وارد کردن کد الزامی میباشد',
        ]);
        if ($validator->passes()) {
            Petrochemical::create([
                'name' => $request['name'],
                'code' => $request['code'],
            ]);
            return response()->json(['success' => 'مشخصات پتروشیمی با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_petrochemical(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_name' => 'required',
            'edit_code' => 'required',
        ], [
            'edit_name.required' => 'وارد کردن نام الزامی میباشد',
            'edit_code.required' => 'وارد کردن کد الزامی میباشد',
        ]);
        if ($validator->passes()) {
            Petrochemical::findOrFail($request->id)->update(
                [
                    'name' => $request->edit_name,
                    'code' => $request->edit_code,
                ]
            );
            return response()->json(['success' => 'مشخصات پتروشیمی با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_petrochemical(Request $request)
    {
        $data = Petrochemical::find($request->id);
        return response()->json($data);
    }

    public function remove_petrochemical(Request $request)
    {
        Petrochemical::find($request->id)->delete();
        return response()->json(['success' => 'پتروشیمی با موفقیت از سیستم حذف شد']);
    }
}
