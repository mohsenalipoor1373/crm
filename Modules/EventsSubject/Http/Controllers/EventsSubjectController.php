<?php

namespace Modules\EventsSubject\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\EventsSubject\Entities\EventsSubject;
use Validator;

class EventsSubjectController extends Controller
{
    public function index(Request $request)
    {
        $data = EventsSubject::orderBy('id', 'DESC')->get();
        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست موضوع رویداد</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>شرح</th>
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
             <td>
             <a href='#' class='fa fa-edit edit_events_subject' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_events_subject' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_events_subject' id='add_events_subject'
        >تعریف موضوع جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json($output);
        } else {
            return view('eventssubject::index', compact('output'));
        }
    }

    public function post_data_events_subject(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], [
            'name.required' => 'وارد کردن شرح الزامی میباشد',
        ]);
        if ($validator->passes()) {
            EventsSubject::create([
                'name' => $request['name'],
            ]);
            return response()->json(['success' => 'مشخصات موضوع رویداد با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_events_subject(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_name' => 'required',
        ], [
            'edit_name.required' => 'وارد کردن شرح الزامی میباشد',
        ]);
        if ($validator->passes()) {
            EventsSubject::findOrFail($request->id)->update(
                [
                    'name' => $request->edit_name,
                ]
            );
            return response()->json(['success' => 'مشخصات موضوع رویداد با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_events_subject(Request $request)
    {
        $permissions = EventsSubject::findOrFail($request->id);
        return response()->json($permissions);
    }

    public function remove_events_subject(Request $request)
    {
        EventsSubject::findOrFail($request->id)->delete();
        return response()->json(['success' => 'موضوع رویداد با موفقیت از سیستم حذف شد']);
    }
}
