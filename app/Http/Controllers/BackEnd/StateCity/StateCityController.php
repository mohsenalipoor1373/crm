<?php

namespace App\Http\Controllers\BackEnd\StateCity;

use App\Http\Controllers\Controller;
use App\Models\StateCity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StateCityController extends Controller
{
    public function index(Request $request)
    {
        $data = StateCity::orderBy('id', 'DESC')->get();
        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست مناطق</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>کشور</th>
            <th>استان</th>
            <th>شهر</th>
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
             <td>$item->country</td>
             <td>$item->state</td>
             <td>$item->city</td>
             <td>
             <a href='#' class='fa fa-edit edit_state_city' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_state_city' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_state_city' id='add_state_city'
        >تعریف منطقه جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json($output);
        } else {
            return view('FrontEnd.StateCity.index', compact('output'));
        }
    }

    public function post_data_state_city(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
        ], [
            'country.required' => 'وارد کردن نام کشور الزامی میباشد',
            'state.required' => 'وارد کردن نام استان الزامی میباشد',
            'city.required' => 'وارد کردن نام شهر الزامی میباشد',
        ]);
        if ($validator->passes()) {
            StateCity::create([
                'country' => $request['country'],
                'state' => $request['state'],
                'city' => $request['city'],
            ]);
            return response()->json(['success' => 'مشخصات منطقه با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_state_city(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_country' => 'required',
            'edit_state' => 'required',
            'edit_city' => 'required',
        ], [
            'edit_country.required' => 'وارد کردن نام کشور الزامی میباشد',
            'edit_state.required' => 'وارد کردن نام استان الزامی میباشد',
            'edit_city.required' => 'وارد کردن نام شهر الزامی میباشد',
        ]);
        if ($validator->passes()) {
            StateCity::findOrFail($request->id)->update(
                [
                    'country' => $request['edit_country'],
                    'state' => $request['edit_state'],
                    'city' => $request['edit_city'],
                ]
            );
            return response()->json(['success' => 'مشخصات منطقه با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_state_city(Request $request)
    {
        $permissions = StateCity::findOrFail($request->id);
        return response()->json($permissions);
    }

    public function remove_state_city(Request $request)
    {
        StateCity::findOrFail($request->id)->delete();
        return response()->json(['success' => 'منطقه با موفقیت از سیستم حذف شد']);
    }
}
