<?php

namespace App\Http\Controllers\BackEnd\EventsResult;

use App\Http\Controllers\Controller;
use App\Models\EventsResult;
use App\Models\EventsSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventsResultController extends Controller
{
    public function index(Request $request)
    {
        $events_subjects = EventsSubject::orderBy('id', 'DESC')->get();
        $data = EventsResult::orderBy('id', 'DESC')->get();


        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست نتایج رویداد</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>موضوع</th>
            <th>شرح نتیجه</th>
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
             <td>$item->name</td>

             <td>
             <a href='#' class='fa fa-edit edit_events_result' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_events_result' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_events_result' id='add_events_result'
        >تعریف نتیجه رویداد جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json(['output' => $output]);
        } else {
            return view('FrontEnd.EventsResult.index', compact('output', 'events_subjects'));
        }
    }

    public function post_data_events_result(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'events_subject_id' => 'required',
        ], [
            'name.required' => 'وارد کردن شرح نتیجه الزامی میباشد',
            'events_subject_id.required' => 'انتخاب موضوع رویداد الزامی میباشد',

        ]);
        if ($validator->passes()) {
            EventsResult::create([
                'name' => $request['name'],
                'events_subject_id' => $request['events_subject_id'],
            ]);
            return response()->json(['success' => 'مشخصات نتیجه رویداد با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_events_result(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_name' => 'required',
            'edit_events_subject_id' => 'required',
        ], [
            'edit_name.required' => 'وارد کردن شرح نتیجه الزامی میباشد',
            'edit_events_subject_id.required' => 'انتخاب موضوع رویداد الزامی میباشد',

        ]);
        if ($validator->passes()) {
            EventsResult::findOrFail($request->id)->update(
                [
                    'name' => $request['edit_name'],
                    'events_subject_id' => $request['edit_events_subject_id'],
                ]
            );
            return response()->json(['success' => 'مشخصات نتیجه رویداد با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_events_result(Request $request)
    {
        $data = EventsResult::findOrFail($request->id);
        $events_subjects = EventsSubject::orderBy('id', 'DESC')->get();
        return response()->json(['data' => $data, 'events_subjects' => $events_subjects]);
    }

    public function remove_events_result(Request $request)
    {
        EventsResult::findOrFail($request->id)->delete();
        return response()->json(['success' => 'نتیجه رویداد با موفقیت از سیستم حذف شد']);
    }
}
