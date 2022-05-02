<?php

namespace Modules\Users\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{

    public function index(Request $request)
    {
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
               <td>$item->id</td>
             <td>
             <a href='#' class='fa fa-edit edit_users' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-ban ban_users' data-id='{$item->id}' title='غیر فعال کردن' style='color: red !important;'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_users' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
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
            return view('users::index', compact('output'));
        }
    }

    public function post_data_user(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'lname' => 'required',
            'fname' => 'required',
            'email' => 'required|unique:users',
            'side' => 'required',
            'pass' => 'required',
        ], [
            'lname.required' => 'وارد کردن نام الزامی میباشد',
            'fname.required' => 'وارد کردن نام خانوادگی الزامی میباشد',
            'email.unique' => 'نام کاربری قبلا در سیستم ثبت شده است',
            'email.required' => 'وارد کردن نام کاربری الزامی میباشد',
            'side.required' => 'وارد کردن سمت سازمانی الزامی میباشد',
            'pass.required' => 'وارد کردن کلمه عبور الزامی میباشد',
        ]);

        if ($validator->passes()) {
            User::create([
                'email' => $request['email'],
                'name' => $request['lname'],
                'fname' => $request['fname'],
                'side' => $request['side'],
                'password' => Hash::make($request['pass'])
            ]);
            return response()->json(['success' => 'مشخصات کاربر با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);


    }

    public function post_data_edit_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_lname' => 'required',
            'edit_fname' => 'required',
            'edit_email' => 'required',
            'edit_side' => 'required',
        ], [
            'edit_lname.required' => 'وارد کردن نام الزامی میباشد',
            'edit_fname.required' => 'وارد کردن نام خانوادگی الزامی میباشد',
            'edit_email.required' => 'وارد کردن نام کاربری الزامی میباشد',
            'edit_side.required' => 'وارد کردن سمت سازمانی الزامی میباشد',
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

        if ($validator->passes()) {
            $user->update([
                'email' => $name,
                'name' => $request['edit_lname'],
                'fname' => $request['edit_fname'],
                'side' => $request['edit_side'],
                'password' => $pass
            ]);
            return response()->json(['success' => 'مشخصات کاربر با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_users(Request $request)
    {
        $users = User::findOrfail($request->id);
        return response()->json($users);
    }

    public function ban_users(Request $request)
    {
        $user = User::findOrfail($request->id);
        if (empty($user->ban)) {
            $ban = 1;
        } else {
            $ban = null;
        }
        $user->update(['ban' => $ban]);
        return response()->json(['success' => 'وضعیت حساب کاربری با موفقیت در سیستم تغییر کرد']);
    }

    public function remove_users(Request $request)
    {
        User::findOrfail($request->id)->delete();
        return response()->json(['success' => 'حساب کاربری با موفقیت از سیستم حذف شد']);
    }


}
