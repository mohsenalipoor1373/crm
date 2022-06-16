<?php

namespace App\Http\Controllers\BackEnd\Reminder;

use App\Http\Controllers\Controller;
use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Morilog\Jalali\Jalalian;

class ReminderController extends Controller
{
    public function index(Request $request)
    {
        $data = Reminder::whereCustomerId($request->id)->whereUserId(auth()->user()->id)->orderBy('id', 'DESC')->get();
        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست اعلان</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>تاریخ و ساعت ثبت</th>
            <th>عنوان</th>
            <th>متن</th>
            <th>از تاریخ و ساعت</th>
            <th>تا تاریخ و ساعت</th>
            <th>لینک</th>
            <th>رویت شده</th>
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
             <td>{$item->time} {$item->date}</td>
             <td>$item->title</td>
             <td>$item->text</td>
             <td>{$item->time_in} {$item->date_in}</td>
             <td>{$item->time_to} {$item->date_to}</td>
             <td>$item->link</td>
             <td>{$this->status_see($item->displayed)}</td>
             <td style='background-color: {$this->active_color($item->status)}'>{$this->active($item->status)}</td>
             <td>
             <a href='#' class='fa fa-edit edit_reminder' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_reminder' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>

        ";
        return response()->json($output);
    }

    public function post_data_reminder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'date_in' => 'required',
            'date_to' => 'required',
        ], [
            'title.required' => 'وارد کردن عنوان الزامی میباشد',
            'date_in.required' => 'انتخاب از تاریخ الزامی میباشد',
            'date_to.required' => 'انتخاب تا تاریخ الزامی میباشد',
        ]);
        $date = Jalalian::now()->format('Y/m/d');
        $time = Jalalian::now()->format('H:i');
        if ($validator->passes()) {
            Reminder::create([
                'user_id' => auth()->user()->id,
                'customer_id' => $request['id_customer_reminder'],
                'title' => $request['title'],
                'text' => $request['text'],
                'date_in' => $request['date_in'],
                'time_in' => $request['time_in'],
                'date_to' => $request['date_to'],
                'time_to' => $request['time_to'],
                'repeat' => $request['repeat'],
                'latest_show' => $request['latest_show'],
                'show_time_day' => $request['show_time_day'],
                'show_day' => $request['show_day'],
                'daily_reminder' => $request['daily_reminder'],
                'hourly_reminder' => $request['hourly_reminder'],
                'link' => $request['link'],
                'date' => $date,
                'time' => $time
            ]);
            $data = Reminder::whereCustomerId($request['id_customer_reminder'])->whereUserId(auth()->user()->id)->orderBy('id', 'DESC')->get();
            $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست اعلان</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>تاریخ و ساعت ثبت</th>
            <th>عنوان</th>
            <th>متن</th>
            <th>از تاریخ و ساعت</th>
            <th>تا تاریخ و ساعت</th>
            <th>لینک</th>
            <th>رویت شده</th>
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
             <td>{$item->time} {$item->date}</td>
             <td>$item->title</td>
             <td>$item->text</td>
             <td>{$item->time_in} {$item->date_in}</td>
             <td>{$item->time_to} {$item->date_to}</td>
             <td>$item->link</td>
             <td>{$this->status_see($item->displayed)}</td>
             <td style='background-color: {$this->active_color($item->status)}'>{$this->active($item->status)}</td>
             <td>
             <a href='#' class='fa fa-edit edit_reminder' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_reminder' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
                $number++;
            }
            $output .= "
         </tbody>
         </table>

        ";
            return response()->json(['success' => 'مشخصات اعلان با موفقیت ثبت شد', 'status' => 1, 'output' => $output]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_edit_data_reminder(Request $request)
    {
        $reminder = Reminder::find($request->id_edit_reminder);
        $validator = Validator::make($request->all(), [
            'edit_title' => 'required',
            'edit_date_in' => 'required',
            'edit_date_to' => 'required',
        ], [
            'edit_title.required' => 'وارد کردن عنوان الزامی میباشد',
            'edit_date_in.required' => 'انتخاب از تاریخ الزامی میباشد',
            'edit_date_to.required' => 'انتخاب تا تاریخ الزامی میباشد',
        ]);
        if ($validator->passes()) {
            $reminder->update([
                'user_id' => $reminder->user_id,
                'customer_id' => $reminder->customer_id,
                'title' => $request['edit_title'],
                'text' => $request['edit_text_d'],
                'date_in' => $request['edit_date_in'],
                'time_in' => $request['edit_time_in'],
                'date_to' => $request['edit_date_to'],
                'time_to' => $request['edit_time_to'],
                'repeat' => $request['edit_repeat'],
                'latest_show' => $request['edit_latest_show'],
                'show_time_day' => $request['edit_show_time_day'],
                'show_day' => $request['edit_show_day'],
                'daily_reminder' => $request['edit_daily_reminder'],
                'hourly_reminder' => $request['edit_hourly_reminder'],
                'link' => $request['edit_link']
            ]);
            $data = Reminder::whereCustomerId($reminder->customer_id)->whereUserId(auth()->user()->id)->orderBy('id', 'DESC')->get();
            $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست اعلان</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>تاریخ و ساعت ثبت</th>
            <th>عنوان</th>
            <th>متن</th>
            <th>از تاریخ و ساعت</th>
            <th>تا تاریخ و ساعت</th>
            <th>لینک</th>
            <th>رویت شده</th>
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
             <td>{$item->time} {$item->date}</td>
             <td>$item->title</td>
             <td>$item->text</td>
             <td>{$item->time_in} {$item->date_in}</td>
             <td>{$item->time_to} {$item->date_to}</td>
             <td>$item->link</td>
             <td>{$this->status_see($item->displayed)}</td>
             <td style='background-color: {$this->active_color($item->status)}'>{$this->active($item->status)}</td>
             <td>
             <a href='#' class='fa fa-edit edit_reminder' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_reminder' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
                $number++;
            }
            $output .= "
         </tbody>
         </table>

        ";
            return response()->json(['success' => 'مشخصات اعلان با موفقیت ویرایش شد', 'status' => 1, 'output' => $output]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function remove_reminder(Request $request)
    {
        $reminder = Reminder::find($request->id);
        $reminder->delete();
        $data = Reminder::whereCustomerId($reminder->customer_id)->whereUserId(auth()->user()->id)->orderBy('id', 'DESC')->get();
        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست اعلان</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>تاریخ و ساعت ثبت</th>
            <th>عنوان</th>
            <th>متن</th>
            <th>از تاریخ و ساعت</th>
            <th>تا تاریخ و ساعت</th>
            <th>لینک</th>
            <th>رویت شده</th>
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
             <td>{$item->time} {$item->date}</td>
             <td>$item->title</td>
             <td>$item->text</td>
             <td>{$item->time_in} {$item->date_in}</td>
             <td>{$item->time_to} {$item->date_to}</td>
             <td>$item->link</td>
             <td>{$this->status_see($item->displayed)}</td>
             <td style='background-color: {$this->active_color($item->status)}'>{$this->active($item->status)}</td>
             <td>
             <a href='#' class='fa fa-edit edit_reminder' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_reminder' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>

        ";
        return response()->json(['success' => 'اعلان با موفقیت از سیستم حذف شد', 'output' => $output]);
    }

    public function edit_reminder(Request $request)
    {
        $reminder = Reminder::find($request->id);
        return response()->json($reminder);
    }

    public function date($val)
    {
        $data = Jalalian::forge($val);
        return $data;
    }

    public function status($val)
    {
        if ($val) {
            $status = "فعال";
        } else {
            $status = "غیرفعال";
        }
        return $status;
    }

    public function status_see($val)
    {
        if ($val) {
            $status_see = "<i title='رویت شده' style='color: green !important;' class='fa fa-check'></i>";
        } else {
            $status_see = "<i title='رویت نشده' style='color: red !important;' class='fa fa-remove'></i>";
        }
        return $status_see;
    }

    public function active($val)
    {
        if ($val == "") {
            $active = "فعال";
        } else {
            $active = "غیرفعال";

        }
        return $active;

    }

    public function active_color($val)
    {
        if ($val == "") {
            $active_color = "lightgreen";
        } else {
            $active_color = "lightsalmon";
        }
        return $active_color;

    }

}
