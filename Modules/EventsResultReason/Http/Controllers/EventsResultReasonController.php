<?php

namespace Modules\EventsResultReason\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\EventsResult\Entities\EventsResult;
use Modules\EventsResultReason\Entities\EventsResultReason;
use Modules\EventsSubject\Entities\EventsSubject;
use Validator;

class EventsResultReasonController extends Controller
{
    public function index(Request $request)
    {
        $events_subjects = EventsSubject::orderBy('id', 'DESC')->get();
        $events_results = EventsResult::orderBy('id', 'DESC')->get();
        $data = EventsResultReason::orderBy('id', 'DESC')->get();


        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست دلایل نتایج رویداد</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>موضوع رویداد</th>
            <th>نتیجه رویداد</th>
            <th>شرح دلیل نتیجه</th>
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
             <td>{$item->events_subject->name}</td>
             <td>{$item->events_result->name}</td>
             <td>$item->name</td>

             <td>
             <a href='#' class='fa fa-edit edit_events_result_reason' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_events_result_reason' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_events_result_reason' id='add_events_result_reason'
        >تعریف دلیل نتیجه رویداد جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json(['output' => $output]);
        } else {
            return view('eventsresultreason::index', compact('output',
                'events_subjects', 'events_results'));
        }
    }

    public function post_data_events_result_reason(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'events_subject_id' => 'required',
            'events_result_id' => 'required',
        ], [
            'name.required' => 'وارد کردن شرح نتیجه الزامی میباشد',
            'events_subject_id.required' => 'انتخاب موضوع رویداد الزامی میباشد',
            'events_result_id.required' => 'انتخاب نتیجه رویداد الزامی میباشد',

        ]);
        if ($validator->passes()) {
            EventsResultReason::create([
                'name' => $request['name'],
                'events_subject_id' => $request['events_subject_id'],
                'events_result_id' => $request['events_result_id'],
            ]);
            return response()->json(['success' => 'مشخصات دلیل نتیجه رویداد با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_events_result_reason(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_name' => 'required',
            'edit_events_subject_id' => 'required',
            'edit_events_result_id' => 'required',
        ], [
            'edit_name.required' => 'وارد کردن شرح نتیجه الزامی میباشد',
            'edit_events_subject_id.required' => 'انتخاب موضوع رویداد الزامی میباشد',
            'edit_events_result_id.required' => 'انتخاب نتیجه رویداد الزامی میباشد',

        ]);
        if ($validator->passes()) {
            EventsResultReason::findOrFail($request->id)->update(
                [
                    'name' => $request['edit_name'],
                    'events_subject_id' => $request['edit_events_subject_id'],
                    'events_result_id' => $request['edit_events_result_id'],
                ]
            );
            return response()->json(['success' => 'مشخصات دلیل نتیجه رویداد با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_events_result_reason(Request $request)
    {
        $data = EventsResultReason::findOrFail($request->id);
        $events_subjects = EventsSubject::orderBy('id', 'DESC')->get();
        $events_results = EventsResult::orderBy('id', 'DESC')->get();
        return response()->json(['data' => $data, 'events_subjects' => $events_subjects,
            'events_results' => $events_results]);
    }

    public function remove_events_result_reason(Request $request)
    {
        EventsResultReason::findOrFail($request->id)->delete();
        return response()->json(['success' => 'دلیل نتیجه رویداد با موفقیت از سیستم حذف شد']);
    }
}
