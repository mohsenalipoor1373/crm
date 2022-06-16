<?php

namespace App\Http\Controllers\BackEnd\EventsCustomers;

use App\Http\Controllers\Controller;
use App\Models\EventsCustomers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventsCustomersController extends Controller
{
    public function post_data_events_customers(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'events_type_id' => 'required',
            'events_subject_id' => 'required',
            'events_result_id' => 'required',
            'events_result_reason_id' => 'required',
            'negotiator_id' => 'required',
            'date' => 'required',
            'negotiator_name' => 'required',
            'negotiator_phone' => 'required',
        ], [
            'events_type_id.required' => 'انتخاب نوع رویداد الزامی میباشد',
            'events_subject_id.required' => 'انتخاب موضوع رویداد الزامی میباشد',
            'events_result_id.required' => 'انتخاب دلیل رویداد الزامی میباشد',
            'events_result_reason_id.required' => 'انتخاب دلیل نتیجه رویداد الزامی میباشد',
            'negotiator_id.required' => 'انتخاب مذاکره کننده الزامی میباشد',
            'date.required' => 'وارد کردن تاریخ الزامی میباشد',
            'negotiator_name.required' => 'وارد کردن نام طرف مذاکره کننده الزامی میباشد',
            'negotiator_phone.required' => 'وارد کردن شماره طرف مذاکره کننده الزامی میباشد',
        ]);
        if ($validator->passes()) {
            $events_customer = EventsCustomers::create([
                'customer_id' => $request['customer_id'],
                'events_type_id' => $request['events_type_id'],
                'events_subject_id' => $request['events_subject_id'],
                'events_result_id' => $request['events_result_id'],
                'events_result_reason_id' => $request['events_result_reason_id'],
                'negotiator_id' => $request['negotiator_id'],
                'date' => $request['date'],
                'negotiator_name' => $request['negotiator_name'],
                'negotiator_phone' => $request['negotiator_phone'],
                'negotiator_text' => $request['negotiator_text'],
            ]);
            return response()->json(['success' => 'مشخصات رویداد با موفقیت ثبت شد', 'status' => 1, 'id' => $events_customer]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_edit_events_customers(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_events_type_id' => 'required',
            'edit_events_subject_id' => 'required',
            'edit_events_result_id' => 'required',
            'edit_events_result_reason_id' => 'required',
            'edit_negotiator_id' => 'required',
            'edit_date' => 'required',
            'edit_negotiator_name' => 'required',
            'edit_negotiator_phone' => 'required',
        ], [
            'edit_events_type_id.required' => 'انتخاب نوع رویداد الزامی میباشد',
            'edit_events_subject_id.required' => 'انتخاب موضوع رویداد الزامی میباشد',
            'edit_events_result_id.required' => 'انتخاب دلیل رویداد الزامی میباشد',
            'edit_events_result_reason_id.required' => 'انتخاب دلیل نتیجه رویداد الزامی میباشد',
            'edit_negotiator_id.required' => 'انتخاب مذاکره کننده الزامی میباشد',
            'edit_date.required' => 'وارد کردن تاریخ الزامی میباشد',
            'edit_negotiator_name.required' => 'وارد کردن نام طرف مذاکره کننده الزامی میباشد',
            'edit_negotiator_phone.required' => 'وارد کردن شماره طرف مذاکره کننده الزامی میباشد',
        ]);
        if ($validator->passes()) {
            $events_customer = EventsCustomers::find($request->edit_id_events_customer)->update([
                'customer_id' => $request['customer_id'],
                'events_type_id' => $request['edit_events_type_id'],
                'events_subject_id' => $request['edit_events_subject_id'],
                'events_result_id' => $request['edit_events_result_id'],
                'events_result_reason_id' => $request['edit_events_result_reason_id'],
                'negotiator_id' => $request['edit_negotiator_id'],
                'date' => $request['edit_date'],
                'negotiator_name' => $request['edit_negotiator_name'],
                'negotiator_phone' => $request['edit_negotiator_phone'],
                'negotiator_text' => $request['edit_negotiator_text'],
            ]);
            return response()->json(['success' => 'مشخصات رویداد با موفقیت ویرایش شد', 'status' => 1, 'id' => $events_customer]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_events_customers_detail(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'text' => 'required',
        ], [
            'text.required' => 'وارد کردن شرح الزامی میباشد',
        ]);


        if ($validator->passes()) {
            \DB::table('events_customers_detail')->insert([
                'events_customers_id' => $request['id_events_customers'],
                'text' => $request['text'],
            ]);


            return response()->json(['success' => 'مشخصات جزییات رویداد با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }
}
