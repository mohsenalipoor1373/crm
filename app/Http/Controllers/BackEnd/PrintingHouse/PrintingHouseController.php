<?php

namespace App\Http\Controllers\BackEnd\PrintingHouse;

use App\Http\Controllers\Controller;
use App\Models\PrintingHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Exception;

class PrintingHouseController extends Controller
{
    public function index(Request $request)
    {
        $data = PrintingHouse::orderBy('id', 'DESC')->get();
        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست چاپخانه</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>کد</th>
            <th>نام</th>
            <th>آدرس</th>
            <th>تلفن</th>
            <th>رابط</th>
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
             <td>{$this->check_address($item->address)}</td>
             <td>$item->phone</td>
             <td>$item->connector</td>
             <td>
             <a href='#' class='fa fa-edit edit_printing_house' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_printing_house' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_printing_house' id='add_printing_house'
        >تعریف چاپخانه جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json($output);
        } else {
            return view('FrontEnd.PrintingHouse.index', compact('output'));
        }
    }

    /**
     * @throws \Throwable
     */
    public function post_data_printing_house(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'connector' => 'required',
        ], [
            'code.required' => 'وارد کردن کد الزامی میباشد',
            'name.required' => 'وارد کردن نام الزامی میباشد',
            'phone.required' => 'وارد کردن شماره تماس الزامی میباشد',
            'connector.required' => 'وارد کردن رابط الزامی میباشد',
        ]);
        if ($validator->passes()) {
            DB::beginTransaction();
            try {
                PrintingHouse::create([
                    'code' => $request['code'],
                    'name' => $request['name'],
                    'phone' => $request['phone'],
                    'connector' => $request['connector'],
                    'address' => $request['address'],
                ]);
                DB::commit();
                return response()->json(['success' => 'مشخصات چاپخانه با موفقیت ثبت شد', 'status' => 1]);
            }catch (Exception $exception){
                DB::rollBack();
                return response()->json(['error' => 'در سیستم خطایی رخ داده است لطفا دوباره سعی کنید', 'status' => 2]);
            }
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_printing_house(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_code' => 'required',
            'edit_name' => 'required',
            'edit_phone' => 'required',
            'edit_connector' => 'required',
        ], [
            'edit_code.required' => 'وارد کردن کد الزامی میباشد',
            'edit_name.required' => 'وارد کردن نام الزامی میباشد',
            'edit_phone.required' => 'وارد کردن شماره تماس الزامی میباشد',
            'edit_connector.required' => 'وارد کردن رابط الزامی میباشد',
        ]);
        if ($validator->passes()) {
            PrintingHouse::findOrFail($request->id)->update(
                [
                    'code' => $request['edit_code'],
                    'name' => $request['edit_name'],
                    'phone' => $request['edit_phone'],
                    'connector' => $request['edit_connector'],
                    'address' => $request['edit_address'],
                ]
            );
            return response()->json(['success' => 'مشخصات چاپخانه با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_printing_house(Request $request)
    {
        $data = PrintingHouse::findOrFail($request->id);
        return response()->json($data);
    }

    public function remove_printing_house(Request $request)
    {
        PrintingHouse::findOrFail($request->id)->delete();
        return response()->json(['success' => 'چاپخانه با موفقیت از سیستم حذف شد']);
    }

    public function check_address($val)
    {
        if ($val) {
            $address = $val;
        } else {
            $address = "---";
        }
        return $address;

    }
}
