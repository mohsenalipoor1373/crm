<?php

namespace Modules\Grouping\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Grouping\Entities\Grouping;
use Spatie\Permission\Models\Permission;

class GroupingController extends Controller
{
    public function index(Request $request)
    {
        $data = Grouping::orderBy('id', 'DESC')->get();
        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست محل خدمت</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
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
             <td>$item->name</td>
             <td>
             <a href='#' class='fa fa-edit edit_grouping' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_grouping' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_grouping' id='add_grouping'
        >تعریف محل خدمت جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json($output);
        } else {
            return view('grouping::index', compact('output'));
        }
    }

    public function post_data_grouping(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], [
            'name.required' => 'وارد کردن نام الزامی میباشد',
        ]);
        if ($validator->passes()) {
            Grouping::create([
                'name' => $request['name'],
            ]);
            return response()->json(['success' => 'مشخصات محل خدمت با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_grouping(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_name' => 'required',
        ], [
            'edit_name.required' => 'وارد کردن نام الزامی میباشد',
        ]);
        if ($validator->passes()) {
            Grouping::findOrFail($request->id)->update(['name' => $request->edit_name]);
            return response()->json(['success' => 'مشخصات محل خدمت با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_grouping(Request $request)
    {
        $data = Grouping::find($request->id);
        return response()->json($data);
    }

    public function remove_grouping(Request $request)
    {
        Grouping::find($request->id)->delete();
        return response()->json(['success' => 'محل خدمت با موفقیت از سیستم حذف شد']);
    }
}
