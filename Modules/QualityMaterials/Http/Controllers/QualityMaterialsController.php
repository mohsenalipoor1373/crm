<?php

namespace Modules\QualityMaterials\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\QualityMaterials\Entities\QualityMaterials;
use Validator;

class QualityMaterialsController extends Controller
{
    public function index(Request $request)
    {
        $data = QualityMaterials::orderBy('id', 'DESC')->get();
        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست درجه کیفی مواد</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>کد</th>
            <th>نام</th>
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
             <td>
             <a href='#' class='fa fa-edit edit_quality_materials' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_quality_materials' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_quality_materials' id='add_quality_materials'
        >تعریف درجه کیفی جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json($output);
        } else {
            return view('qualitymaterials::index', compact('output'));
        }
    }

    public function post_data_quality_materials(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code' => 'required',
        ], [
            'name.required' => 'وارد کردن نام الزامی میباشد',
            'code.required' => 'وارد کردن کد الزامی میباشد',
        ]);
        if ($validator->passes()) {
            QualityMaterials::create([
                'name' => $request['name'],
                'code' => $request['code'],
            ]);
            return response()->json(['success' => 'مشخصات درجه کیفی با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_quality_materials(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_name' => 'required',
            'edit_code' => 'required',
        ], [
            'edit_name.required' => 'وارد کردن نام الزامی میباشد',
            'edit_code.required' => 'وارد کردن کد الزامی میباشد',
        ]);
        if ($validator->passes()) {
            QualityMaterials::findOrFail($request->id)->update(
                [
                    'name' => $request->edit_name,
                    'code' => $request->edit_code,
                ]
            );
            return response()->json(['success' => 'مشخصات درجه کیفی با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_quality_materials(Request $request)
    {
        $data = QualityMaterials::find($request->id);
        return response()->json($data);
    }

    public function remove_quality_materials(Request $request)
    {
        QualityMaterials::find($request->id)->delete();
        return response()->json(['success' => 'درجه کیفی با موفقیت از سیستم حذف شد']);
    }
}
