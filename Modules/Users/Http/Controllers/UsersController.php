<?php

namespace Modules\Users\Http\Controllers;

use App\Models\User;
use DB;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;
use Modules\Grouping\Entities\Grouping;
use Modules\Shift\Entities\Shift;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{

    public function index(Request $request)
    {
        $roles = Role::all();
        $groupings = Grouping::all();
        $shifts = Shift::all();
        $data = User::orderBy('id', 'DESC')->get();
        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست کاربران</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>نام و نام خانوادگی</th>
            <th>نام کاربری</th>
            <th>سمت</th>
            <th>محل خدمت</th>
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
             <td>$item->name $item->fname</td>
             <td>$item->email</td>
             <td>{$item->role->name}</td>
             <td>{$item->grouping->name}</td>
               <td>{$this->status($item->status)}</td>
             <td>
             <a href='#' class='fa fa-edit edit_users' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-ban ban_users' data-id='{$item->id}' title='غیر فعال کردن' style='color: red !important;'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_users' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             <a href='" . route('add_permission_to_users', $item->id) . "' class='fa fa-lock'
             data-id='{$item->id}' title='سطوح دسترسی' style='color: #0033ff !important;'></a>&nbsp;&nbsp;

             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_users' id='add_users'
        >تعریف کاربر جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json($output);
        } else {
            return view('users::index', compact('output', 'roles', 'groupings', 'shifts'));
        }
    }

    /**
     * @throws \Throwable
     */
    public function post_data_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lname' => 'required',
            'fname' => 'required',
            'email' => 'required|unique:users',
            'role_id' => 'required',
            'grouping_id' => 'required',
            'shift_id' => 'required',
            'pass' => 'required',
        ], [
            'lname.required' => 'وارد کردن نام الزامی میباشد',
            'fname.required' => 'وارد کردن نام خانوادگی الزامی میباشد',
            'email.unique' => 'نام کاربری قبلا در سیستم ثبت شده است',
            'email.required' => 'وارد کردن نام کاربری الزامی میباشد',
            'role_id.required' => 'وارد کردن سمت سازمانی الزامی میباشد',
            'grouping_id.required' => 'وارد کردن محل خدمت الزامی میباشد',
            'shift_id.required' => 'وارد کردن شیفت الزامی میباشد',
            'pass.required' => 'وارد کردن کلمه عبور الزامی میباشد',
        ]);
        if ($request->hasFile('signature')) {
            $file = $request->file('signature');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $sign = $request->file('signature')->move('signature', $filename);
        } else {
            $sign = "";
        }

        if ($validator->passes()) {
            \DB::beginTransaction();
            try {
                $user = User::create([
                    'email' => $request['email'],
                    'name' => $request['lname'],
                    'fname' => $request['fname'],
                    'role_id' => $request['role_id'],
                    'grouping_id' => $request['grouping_id'],
                    'shift_id' => $request['shift_id'],
                    'signature' => $sign,
                    'password' => Hash::make($request['pass'])
                ]);
                $user->assignRole($request->input('role_id'));
                \DB::commit();
                return response()->json(['success' => 'مشخصات کاربر با موفقیت ثبت شد', 'status' => 1]);
            } catch (Exception $exception) {
                \DB::rollBack();
            }
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);

    }

    /**
     * @throws \Throwable
     */
    public function post_data_edit_user(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'edit_lname' => 'required',
            'edit_fname' => 'required',
            'edit_email' => 'required',
            'edit_role_id' => 'required',
            'edit_grouping_id' => 'required',
            'edit_shift_id' => 'required',
        ], [
            'edit_lname.required' => 'وارد کردن نام الزامی میباشد',
            'edit_fname.required' => 'وارد کردن نام خانوادگی الزامی میباشد',
            'edit_email.required' => 'وارد کردن نام کاربری الزامی میباشد',
            'edit_role_id.required' => 'وارد کردن سمت سازمانی الزامی میباشد',
            'edit_grouping_id.required' => 'وارد کردن محل خدمت الزامی میباشد',
            'edit_shift_id.required' => 'وارد کردن شیفت الزامی میباشد',
        ]);

        $user = User::findOrFail($request->id);
        if ($request['edit_email'] == $user->email) {
            $name = $request['edit_email'];
        } else {
            $check_user = User::where('email', $request['edit_email'])->first();
            if ($check_user) {
                return response()->json(['status' => 2]);
            } else {
                $name = $request['edit_email'];
            }
        }
        if ($request['edit_pass']) {
            $pass = Hash::make($request['edit_pass']);
        } else {
            $pass = $user->password;
        }

        if ($request->hasFile('edit_signature')) {
            $file = $request->file('edit_signature');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $sign = $request->file('edit_signature')->move('signature', $filename);
        } else {
            $sign = $user->signature;
        }


        if ($validator->passes()) {
            \DB::beginTransaction();
            try {
                $user->update([
                    'email' => $name,
                    'name' => $request['edit_lname'],
                    'fname' => $request['edit_fname'],
                    'role_id' => $request['edit_role_id'],
                    'grouping_id' => $request['edit_grouping_id'],
                    'shift_id' => $request['edit_shift_id'],
                    'password' => $pass,
                    'signature' => $sign
                ]);
                $user->syncRoles($request->input('edit_role_id'));
                \DB::commit();
                return response()->json(['success' => 'مشخصات کاربر با موفقیت ویرایش شد', 'status' => 1]);
            }catch (Exception $exception){
                \DB::rollBack();
            }

        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_users(Request $request)
    {
        $roles = Role::get();
        $groupings = Grouping::all();
        $shifts = Shift::all();
        $users = User::findOrfail($request->id);
        return response()->json(['users' => $users, 'roles' => $roles, 'groupings' => $groupings
            , 'shifts' => $shifts]);
    }

    public function add_permission_to_users($id)
    {
        $permissions = Permission::get();
        $rolePermission = DB::table("model_has_permissions")
            ->where("model_has_permissions.model_id", $id)
            ->pluck('model_has_permissions.permission_id', 'model_has_permissions.permission_id')
            ->all();
        return view('users::roles', compact('id', 'permissions', 'rolePermission'));
    }

    public function ban_users(Request $request)
    {
        $user = User::findOrfail($request->id);
        if ($user->status) {
            $status = null;
        } else {
            $status = 1;
        }
        $user->update(['status' => $status]);
        return response()->json(['success' => 'وضعیت حساب کاربری با موفقیت در سیستم تغییر کرد']);
    }

    public function remove_users(Request $request)
    {
        User::findOrfail($request->id)->delete();
        return response()->json(['success' => 'حساب کاربری با موفقیت از سیستم حذف شد']);
    }

    public function status($val)
    {
        if ($val) {
            $status = "غیرفعال";
        } else {
            $status = "فعال";
        }
        return $status;

    }

    public function post_data_permission_user(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'permission' => 'required',
        ], [
            'permission.required' => 'انتخاب دسترسی الزامی میباشد',
        ]);
        if ($validator->passes()) {
            $user = User::findOrfail($request->id);
            $user->givePermissionTo($request->input('permission'));
            return response()->json(['success' => 'دسترسی کاربر با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }


}
