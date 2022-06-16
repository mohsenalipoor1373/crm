<?php

namespace App\Http\Controllers\BackEnd\Customers;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Industrial;
use App\Models\StateCity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Morilog\Jalali\Jalalian;

class CustomersController extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderBy('id', 'DESC')->get();
        $industrials = Industrial::orderBy('id', 'DESC')->get();
        $state_citys = StateCity::orderBy('id', 'DESC')->get();
        $data = Customers::orderBy('id', 'DESC')->get();


        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست مشتریان</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>کد</th>
            <th>نام</th>
            <th>فروشنده</th>
            <th>طراح</th>
            <th>صنعت</th>
            <th>منطقه</th>
            <th>کد ملی</th>
            <th>تاریخ ثبت</th>
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
             <td>{$item->code}</td>
             <td>{$item->name}</td>
             <td>{$item->seller->name} {$item->seller->fname}</td>
             <td>{$item->designer->name} {$item->designer->fname}</td>
             <td>{$item->industrial->name}</td>
             <td>{$item->state_city->country}_{$item->state_city->state}_{$item->state_city->city}</td>
             <td>{$item->national_code}</td>
             <td>{$this->date($item->created_at)}</td>
             <td>{$this->status($item->status)}</td>

             <td>
             <a href='#' class='fa fa-edit edit_customers' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_customers' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-exchange change_customers' data-id='{$item->id}' title='تغییر وضعیت' style='color: #00a6ff !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_customers' id='add_customers'
        >تعریف مشتری جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json(['output' => $output]);
        } else {
            return view('FrontEnd.Customers.index', compact('output', 'users',
                'industrials', 'state_citys'));
        }
    }

    public function post_data_customers(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'name' => 'required',
            'national_code' => 'required',
            'seller_id' => 'required',
            'designer_id' => 'required',
            'industrial_id' => 'required',
            'state_city_id' => 'required',
        ], [
            'code.required' => 'وارد کردن کد الزامی میباشد',
            'name.required' => 'وارد کردن نام الزامی میباشد',
            'national_code.required' => 'وارد کردن کد ملی الزامی میباشد',
            'seller_id.required' => 'انتخاب فروشنده الزامی میباشد',
            'designer_id.required' => 'انتخاب طراح لیبل الزامی میباشد',
            'industrial_id.required' => 'انتخاب صنعت الزامی میباشد',
            'state_city_id.required' => 'انتخاب منطقه الزامی میباشد',
        ]);
        if ($validator->passes()) {
            Customers::create([
                'code' => $request['code'],
                'name' => $request['name'],
                'seller_id' => $request['seller_id'],
                'designer_id' => $request['designer_id'],
                'industrial_id' => $request['industrial_id'],
                'state_city_id' => $request['state_city_id'],
                'national_code' => $request['national_code'],
                'economic_code' => $request['economic_code'],
                'tel_central_office' => $request['tel_central_office'],
                'tel_factory' => $request['tel_factory'],
                'fax_central_office' => $request['fax_central_office'],
                'fax_factory' => $request['fax_factory'],
                'address_central_office' => $request['address_central_office'],
                'address_factory' => $request['address_factory'],
                'other_tel_central_office' => $request['other_tel_central_office'],
                'other_tel_factory' => $request['other_tel_factory'],
                'credit_limit' => $request['credit_limit'],
                'open_account_ceiling' => $request['open_account_ceiling'],
                'maximum_allowed_order_check_mode' => $request['maximum_allowed_order_check_mode']
            ]);
            return response()->json(['success' => 'مشخصات مشتری با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_customers(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_code' => 'required',
            'edit_name' => 'required',
            'edit_national_code' => 'required',
            'edit_seller_id' => 'required',
            'edit_designer_id' => 'required',
            'edit_industrial_id' => 'required',
            'edit_state_city_id' => 'required',
        ], [
            'edit_code.required' => 'وارد کردن کد الزامی میباشد',
            'edit_name.required' => 'وارد کردن نام الزامی میباشد',
            'edit_national_code.required' => 'وارد کردن کد ملی الزامی میباشد',
            'edit_seller_id.required' => 'انتخاب فروشنده الزامی میباشد',
            'edit_designer_id.required' => 'انتخاب طراح لیبل الزامی میباشد',
            'edit_industrial_id.required' => 'انتخاب صنعت الزامی میباشد',
            'edit_state_city_id.required' => 'انتخاب منطقه الزامی میباشد',
        ]);
        if ($validator->passes()) {
            Customers::findOrFail($request->id)->update(
                [
                    'code' => $request['edit_code'],
                    'name' => $request['edit_name'],
                    'seller_id' => $request['edit_seller_id'],
                    'designer_id' => $request['edit_designer_id'],
                    'industrial_id' => $request['edit_industrial_id'],
                    'state_city_id' => $request['edit_state_city_id'],
                    'national_code' => $request['edit_national_code'],
                    'economic_code' => $request['edit_economic_code'],
                    'tel_central_office' => $request['edit_tel_central_office'],
                    'tel_factory' => $request['edit_tel_factory'],
                    'fax_central_office' => $request['edit_fax_central_office'],
                    'fax_factory' => $request['edit_fax_factory'],
                    'address_central_office' => $request['edit_address_central_office'],
                    'address_factory' => $request['edit_address_factory'],
                    'other_tel_central_office' => $request['edit_other_tel_central_office'],
                    'other_tel_factory' => $request['edit_other_tel_factory'],
                    'credit_limit' => $request['edit_credit_limit'],
                    'open_account_ceiling' => $request['edit_open_account_ceiling'],
                    'maximum_allowed_order_check_mode' => $request['edit_maximum_allowed_order_check_mode']
                ]
            );
            return response()->json(['success' => 'مشخصات مشتری با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_customers(Request $request)
    {

        $users = User::orderBy('id', 'DESC')->get();
        $industrials = Industrial::orderBy('id', 'DESC')->get();
        $state_citys = StateCity::orderBy('id', 'DESC')->get();
        $data = Customers::findOrFail($request->id);

        return response()->json(['data' => $data, 'users' => $users,
            'industrials' => $industrials, 'state_citys' => $state_citys]);
    }

    public function remove_customers(Request $request)
    {
        Customers::findOrFail($request->id)->delete();
        return response()->json(['success' => 'مشتری با موفقیت از سیستم حذف شد']);
    }

    public function change_customers(Request $request)
    {
        $item = Customers::findOrFail($request->id);
        if ($item->status) {
            $status = "";
        } else {
            $status = 1;
        }
        $item->update([
            'status' => $status
        ]);
        return response()->json(['success' => 'وضعیت مشتری با موفقیت در سیستم تغییر کرد']);
    }

    public function status($val)
    {
        if ($val == 1) {
            $status = "فعال";
        } else {
            $status = "غیرفعال";
        }
        return $status;

    }

    public function date($val)
    {
        $date = Jalalian::forge($val)->format('Y/m/d');
        return $date;
    }
}
