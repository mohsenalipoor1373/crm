<?php

namespace App\Http\Controllers\BackEnd\LabelDesignVersions;

use App\Http\Controllers\Controller;
use App\Models\LabelDesign;
use App\Models\LabelDesignVersions;
use App\Models\User;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use Validator;

class LabelDesignVersionsController extends Controller
{

    public function index(Request $request)
    {
        $label_designs = LabelDesign::all();
        $designers = User::all();
        $data = LabelDesignVersions::orderBy('id', 'DESC')->get();
        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست ورژن لیبل</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>کد</th>
            <th>طرح لیبل</th>
            <th>تاریخ ثبت</th>
            <th>ثبت کننده</th>
            <th>طراح</th>
            <th>شکل</th>
            <th>اندازه</th>
            <th>مسیر</th>
            <th>نام فایل</th>
            <th>فایل پیوست</th>
            <th>توضیحات</th>
            <th>وضعیت</th>
            <th>ابزار</th>
        </tr>
        </thead>
        <tbody>
        ";
        $number = 1;
        foreach ($data as $item) {
            $date = Jalalian::forge($item->created_at)->format('Y/m/d');
            $output .= "
             <tr>
             <td style='background-color: #e5e5e5'>$number</td>
             <td>$item->code</td>
             <td>{$item->label_design->name}</td>
             <td>$date</td>
             <td>{$item->user->name} {$item->user->fname}</td>
             <td>{$item->designer->name} {$item->designer->fname}</td>
             <td>$item->shape</td>
             <td>$item->size</td>
             <td>$item->direction</td>
             <td>$item->name_file</td>
             <td><a href='#' class='see_file' data-id='{$item->id}'>مشاهده</a></td>
             <td>$item->text</td>
             <td>{$this->status($item->status)}</td>
             <td>
             <a href='#' class='fa fa-edit edit_label_design_version' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_label_design_version' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_label_design_version' id='add_label_design_version'
        >تعریف ورژن لیبل جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json($output);
        } else {
            return view('FrontEnd.LabelDesignVersions.index', compact('output',
                'label_designs', 'designers'));
        }
    }

    public function post_data_label_design_version(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'label_design_id' => 'required',
            'designer_id' => 'required',
            'shape' => 'required',
            'size' => 'required',
        ], [
            'code.required' => 'وارد کردن کد الزامی میباشد',
            'label_design_id.required' => 'وارد کردن کد طرح الزامی میباشد',
            'designer_id.required' => 'وارد کردن نام الزامی میباشد',
            'shape.required' => 'وارد کردن مشتری الزامی میباشد',
            'size.required' => 'وارد کردن نوع لیبل الزامی میباشد',
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file = $request->file('file')->move('public/file_label', $filename);
        } else {
            $file = "";
        }
        if ($validator->passes()) {
            LabelDesignVersions::create([
                'code' => $request['code'],
                'label_design_id' => $request['label_design_id'],
                'designer_id' => $request['designer_id'],
                'user_id' => auth()->user()->id,
                'shape' => $request['shape'],
                'size' => $request['size'],
                'direction' => $request['direction'],
                'name_file' => $request['name_file'],
                'file' => $file,
                'text' => $request['text'],
            ]);
            return response()->json(['success' => 'مشخصات ورژن لیبل با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_label_design_version(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_code' => 'required',
            'edit_label_design_id' => 'required',
            'edit_designer_id' => 'required',
            'edit_shape' => 'required',
            'edit_size' => 'required',
        ], [
            'edit_code.required' => 'وارد کردن کد الزامی میباشد',
            'edit_label_design_id.required' => 'وارد کردن کد طرح الزامی میباشد',
            'edit_designer_id.required' => 'وارد کردن نام الزامی میباشد',
            'edit_shape.required' => 'وارد کردن مشتری الزامی میباشد',
            'edit_size.required' => 'وارد کردن نوع لیبل الزامی میباشد',
        ]);
        $data = LabelDesignVersions::findOrFail($request->id);
        if ($request->hasFile('edit_file')) {
            $file = $request->file('edit_file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file = $request->file('edit_file')->move('public/file_label', $filename);
        } else {
            $file = $data->file;
        }
        if ($validator->passes()) {
            $data->update(
                [
                    'code' => $request['edit_code'],
                    'label_design_id' => $request['edit_label_design_id'],
                    'designer_id' => $request['edit_designer_id'],
                    'user_id' => auth()->user()->id,
                    'shape' => $request['edit_shape'],
                    'size' => $request['edit_size'],
                    'direction' => $request['edit_direction'],
                    'name_file' => $request['edit_name_file'],
                    'file' => $file,
                    'text' => $request['edit_text'],
                ]
            );
            return response()->json(['success' => 'مشخصات ورژن لیبل با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_label_design_version(Request $request)
    {
        $label_designs = LabelDesign::all();
        $designers = User::all();
        $data = LabelDesignVersions::findOrfail($request->id);
        return response()->json(['label_designs' => $label_designs,
            'designers' => $designers
            , 'data' => $data]);
    }

    public function see_file_label_design_version(Request $request)
    {
        $data = LabelDesignVersions::findOrfail($request->id);
        return response()->json(['data' => $data]);
    }

    public function remove_label_design_version(Request $request)
    {
        $date = LabelDesignVersions::findOrFail($request->id);
        $file_path = app_path($date->file);
        if (\File::exists($file_path)) \File::delete($file_path);
        $date->delete();
        return response()->json(['success' => 'ورژن لیبل با موفقیت از سیستم حذف شد ']);
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

}
