<?php

namespace App\Http\Controllers\BackEnd\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function index(Request $request)
    {
        $data = Permission::orderBy('id', 'DESC')->get();
        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست دسترسی ها</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>عنوان</th>
            <th>لیبل</th>
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
             <td>$item->label</td>
             <td>
             <a href='#' class='fa fa-edit edit_permissions' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_permissions' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_permissions' id='add_permissions'
        >تعریف دسترسی جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json($output);
        } else {
            return view('FrontEnd.Permissions.index', compact('output'));
        }
    }

    public function post_data_permissions(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'label' => 'required',
        ], [
            'name.required' => 'وارد کردن عنوان دسترسی الزامی میباشد',
            'label.required' => 'وارد کردن لیبل دسترسی الزامی میباشد',
        ]);
        if ($validator->passes()) {
            Permission::create([
                'name' => $request['name'],
                'label' => $request['label'],
            ]);
            return response()->json(['success' => 'مشخصات دسترسی با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_permissions(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_name' => 'required',
            'edit_label' => 'required',
        ], [
            'edit_name.required' => 'وارد کردن عنوان دسترسی الزامی میباشد',
            'edit_label.required' => 'وارد کردن لیبل دسترسی الزامی میباشد',
        ]);
        if ($validator->passes()) {
            Permission::findOrFail($request->id)->update([
                'name' => $request->edit_name,
                'label' => $request->edit_label
            ]);
            return response()->json(['success' => 'مشخصات نقش با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_permissions(Request $request)
    {
        $permissions = Permission::findById($request->id);
        return response()->json($permissions);
    }

    public function remove_permissions(Request $request)
    {
        Permission::findById($request->id)->delete();
        return response()->json(['success' => 'دسترسی با موفقیت از سیستم حذف شد']);
    }
}
