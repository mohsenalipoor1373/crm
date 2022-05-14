<?php

namespace Modules\Grade\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Grade\Entities\Grade;
use Validator;

class GradeController extends Controller
{
    public function index(Request $request)
    {
        $data = Grade::orderBy('id', 'DESC')->get();
        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست گرید مواد</th>
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
             <a href='#' class='fa fa-edit edit_grade' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_grade' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_grade' id='add_grade'
        >تعریف گرید مواد جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json($output);
        } else {
            return view('grade::index', compact('output'));
        }
    }

    public function post_data_grade(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code' => 'required',
        ], [
            'name.required' => 'وارد کردن نام الزامی میباشد',
            'code.required' => 'وارد کردن کد الزامی میباشد',
        ]);
        if ($validator->passes()) {
            Grade::create([
                'name' => $request['name'],
                'code' => $request['code'],
            ]);
            return response()->json(['success' => 'مشخصات گرید مواد با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_grade(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_name' => 'required',
            'edit_code' => 'required',
        ], [
            'edit_name.required' => 'وارد کردن نام الزامی میباشد',
            'edit_code.required' => 'وارد کردن کد الزامی میباشد',
        ]);
        if ($validator->passes()) {
            Grade::findOrFail($request->id)->update(
                [
                    'name' => $request->edit_name,
                    'code' => $request->edit_code,
                ]
            );
            return response()->json(['success' => 'مشخصات گرید مواد با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_grade(Request $request)
    {
        $data = Grade::find($request->id);
        return response()->json($data);
    }

    public function remove_grade(Request $request)
    {
        Grade::find($request->id)->delete();
        return response()->json(['success' => 'گرید مواد با موفقیت از سیستم حذف شد']);
    }
}
