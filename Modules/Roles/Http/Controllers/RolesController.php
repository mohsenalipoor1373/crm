<?php

namespace Modules\Roles\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use function GuzzleHttp\Promise\all;

class RolesController extends Controller
{
    public function index(Request $request)
    {
        $data = Role::orderBy('id', 'DESC')->get();
        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست نقش ها</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>عنوان</th>
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
             <a href='#' class='fa fa-edit edit_roles' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_roles' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             <a href='" . route('add_roles_to_users', $item->id) . "' class='fa fa-lock' data-id='{$item->id}' title='سطوح دسترسی' style='color: #0033ff !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_roles' id='add_roles'
        >تعریف نقش جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json($output);
        } else {
            return view('roles::index', compact('output'));
        }
    }

    public function post_data_role(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], [
            'name.required' => 'وارد کردن عنوان نقش الزامی میباشد',
        ]);
        if ($validator->passes()) {
            Role::create([
                'name' => $request['name'],
            ]);
            return response()->json(['success' => 'مشخصات نقش با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_role(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_name' => 'required',
        ], [
            'edit_name.required' => 'وارد کردن عنوان نقش الزامی میباشد',
        ]);
        if ($validator->passes()) {
            Role::findOrFail($request->id)->update(['name' => $request->edit_name]);
            return response()->json(['success' => 'مشخصات نقش با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_roles(Request $request)
    {
        $roles = Role::findOrFail($request->id);
        return response()->json($roles);

    }

    public function remove_roles(Request $request)
    {
        Role::findById($request->id)->delete();
        return response()->json(['success' => 'نقش با موفقیت از سیستم حذف شد']);
    }

    public function roles_to_users($id)
    {
      return view('roles::roles');
    }

}
