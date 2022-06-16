<?php

namespace App\Http\Controllers\BackEnd\Shift;

use App\Http\Controllers\Controller;
use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShiftController extends Controller
{
    public function index(Request $request)
    {
        $data = Shift::orderBy('id', 'DESC')->get();
        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست شیفت</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>نام</th>
            <th>از ساعت</th>
            <th>روز</th>
            <th>تا ساعت</th>
            <th>روز</th>
            <th>طول</th>
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
             <td>$item->time_in</td>
             <td>$item->date_in</td>
             <td>$item->time_to</td>
             <td>$item->date_to</td>
             <td>$item->length</td>
             <td>
             <a href='#' class='fa fa-edit edit_shift' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_shift' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_shift' id='add_shift'
        >تعریف شیفت جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json($output);
        } else {
            return view('FrontEnd.Shift.index', compact('output'));
        }
    }

    public function post_data_shift(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'time_in' => 'required',
            'date_in' => 'required',
            'time_to' => 'required',
            'date_to' => 'required',
            'length' => 'required',
        ], [
            'name.required' => 'وارد کردن نام شیفت الزامی میباشد',
            'time_in.required' => 'وارد کردن شروع ساعت شیفت الزامی میباشد',
            'date_in.required' => 'وارد کردن شروع تاریخ شیفت الزامی میباشد',
            'time_to.required' => 'وارد کردن پایان ساعت شیفت الزامی میباشد',
            'date_to.required' => 'وارد کردن پایان تاریخ شیفت الزامی میباشد',
            'length.required' => 'وارد کردن طول شیفت الزامی میباشد',
        ]);
        if ($validator->passes()) {
            Shift::create([
                'name' => $request['name'],
                'time_in' => $request['time_in'],
                'date_in' => $request['date_in'],
                'time_to' => $request['time_to'],
                'date_to' => $request['date_to'],
                'length' => $request['length'],
            ]);
            return response()->json(['success' => 'مشخصات شیفت با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_shift(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_name' => 'required',
            'edit_time_in' => 'required',
            'edit_date_in' => 'required',
            'edit_time_to' => 'required',
            'edit_date_to' => 'required',
            'edit_length' => 'required',
        ], [
            'edit_name.required' => 'وارد کردن نام شیفت الزامی میباشد',
            'edit_time_in.required' => 'وارد کردن شروع ساعت شیفت الزامی میباشد',
            'edit_date_in.required' => 'وارد کردن شروع تاریخ شیفت الزامی میباشد',
            'edit_time_to.required' => 'وارد کردن پایان ساعت شیفت الزامی میباشد',
            'edit_date_to.required' => 'وارد کردن پایان تاریخ شیفت الزامی میباشد',
            'edit_length.required' => 'وارد کردن طول شیفت الزامی میباشد',
        ]);
        if ($validator->passes()) {
            Shift::findOrFail($request->id)->update(
                [
                    'name' => $request['edit_name'],
                    'time_in' => $request['edit_time_in'],
                    'date_in' => $request['edit_date_in'],
                    'time_to' => $request['edit_time_to'],
                    'date_to' => $request['edit_date_to'],
                    'length' => $request['edit_length'],
                ]
            );
            return response()->json(['success' => 'مشخصات شیفت با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_shift(Request $request)
    {
        $data = Shift::findOrFail($request->id);
        return response()->json($data);
    }

    public function remove_shift(Request $request)
    {
        Shift::findOrFail($request->id)->delete();
        return response()->json(['success' => 'شیفت با موفقیت از سیستم حذف شد']);
    }
}
