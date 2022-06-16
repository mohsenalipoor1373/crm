<?php

namespace App\Http\Controllers\BackEnd\EarlyMaterials;

use App\Http\Controllers\Controller;
use App\Models\EarlyMaterials;
use App\Models\Grade;
use App\Models\Material;
use App\Models\Petrochemical;
use App\Models\QualityMaterials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Exception;

class EarlyMaterialsController extends Controller
{
    public function index(Request $request)
    {
        $Materials = Material::all();
        $Grades = Grade::all();
        $Petrochemicals = Petrochemical::all();
        $QualityMaterials = QualityMaterials::all();
        $data = EarlyMaterials::orderBy('id', 'DESC')->get();
        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست مواد اولیه</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>نوع مواد</th>
            <th>نوع گرید</th>
            <th>پتروشیمی</th>
            <th>درجه کیفی</th>
            <th>نام</th>
            <th>قیمت فعلی</th>
            <th>قیمت قبلی</th>
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
             <td>{$item->material->name}</td>
             <td>{$item->grade->code}</td>
             <td>{$item->petrochemical->name}</td>
             <td>{$item->quality_material->name}</td>
             <td>$item->name</td>
             <td>$item->current_price</td>
             <td>{$this->previous_price($item->previous_price)}</td>
             <td>{$this->status($item->status)}</td>
             <td>
             <a href='#' class='fa fa-edit edit_early_materials' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_early_materials' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-exchange change_early_materials' data-id='{$item->id}' title='تغییر وضعیت' style='color: #0080ff !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_early_materials' id='add_early_materials'
        >تعریف مواد جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json($output);
        } else {
            return view('FrontEnd.EarlyMaterials.index', compact('output', 'Materials', 'QualityMaterials', 'Petrochemicals', 'Grades'));
        }
    }

    /**
     * @throws \Throwable
     */
    public function post_data_early_materials(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'material_id' => 'required',
            'grade_id' => 'required',
            'petrochemical_id' => 'required',
            'quality_materials_id' => 'required',
            'current_price' => 'required',
        ], [
            'material_id.required' => 'وارد کردن نوع مواد الزامی میباشد',
            'grade_id.required' => 'وارد کردن نوع گرید الزامی میباشد',
            'petrochemical_id.required' => 'وارد کردن پتروشیمی الزامی میباشد',
            'quality_materials_id.required' => 'وارد کردن درجه کیفی الزامی میباشد',
            'current_price.required' => 'وارد کردن قیمت الزامی میباشد',
        ]);

        if ($validator->passes()) {
            \DB::beginTransaction();
            try {
                $item = EarlyMaterials::create([
                    'material_id' => $request['material_id'],
                    'grade_id' => $request['grade_id'],
                    'petrochemical_id' => $request['petrochemical_id'],
                    'quality_materials_id' => $request['quality_materials_id'],
                    'current_price' => $request['current_price'],
                ]);
                $this->build_name($item->id, $item->material, $item->grade, $item->petrochemical, $item->quality_material);
                \DB::commit();
                return response()->json(['success' => 'مشخصات مواد با موفقیت ثبت شد', 'status' => 1]);
            } catch (Exception $exception) {
                \DB::rollBack();
            }

        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    /**
     * @throws \Throwable
     */
    public function post_data_edit_early_materials(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_material_id' => 'required',
            'edit_grade_id' => 'required',
            'edit_petrochemical_id' => 'required',
            'edit_quality_materials_id' => 'required',
            'edit_current_price' => 'required',
        ], [
            'edit_material_id.required' => 'وارد کردن نوع مواد الزامی میباشد',
            'edit_grade_id.required' => 'وارد کردن نوع گرید الزامی میباشد',
            'edit_petrochemical_id.required' => 'وارد کردن پتروشیمی الزامی میباشد',
            'edit_quality_materials_id.required' => 'وارد کردن درجه کیفی الزامی میباشد',
            'edit_current_price.required' => 'وارد کردن قیمت الزامی میباشد',
        ]);
        if ($validator->passes()) {
            \DB::beginTransaction();
            try {
                $item = EarlyMaterials::findOrFail($request->id);
                $item->update([
                    'material_id' => $request['edit_material_id'],
                    'grade_id' => $request['edit_grade_id'],
                    'petrochemical_id' => $request['edit_petrochemical_id'],
                    'quality_materials_id' => $request['edit_quality_materials_id'],
                    'current_price' => $request['edit_current_price'],
                    'previous_price' => $item->current_price,
                ]);
                $this->build_name($item->id, $item->material, $item->grade, $item->petrochemical, $item->quality_material);
                \DB::commit();
                return response()->json(['success' => 'مشخصات مواد با موفقیت ویرایش شد', 'status' => 1]);
            } catch (Exception $exception) {
                \DB::rollBack();
            }

        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_early_materials(Request $request)
    {
        $Materials = Material::all();
        $Grades = Grade::all();
        $Petrochemicals = Petrochemical::all();
        $QualityMaterials = QualityMaterials::all();
        $data = EarlyMaterials::find($request->id);
        return response()->json(['data' => $data, 'Materials' => $Materials
            , 'Grades' => $Grades, 'Petrochemicals' => $Petrochemicals, 'QualityMaterials' => $QualityMaterials]);
    }

    public function remove_early_materials(Request $request)
    {
        EarlyMaterials::find($request->id)->delete();
        return response()->json(['success' => 'مواد با موفقیت از سیستم حذف شد']);
    }

    public function change_early_materials(Request $request)
    {
        $item = EarlyMaterials::find($request->id);
        if ($item->status) {
            $status = "";
        } else {
            $status = 1;
        }
        $item->update([
            'status' => $status
        ]);
        return response()->json(['success' => 'وضعیت مواد با موفقیت در سیستم تغییر کرد']);
    }

    public function build_name($id, $material, $grade, $petrochemical, $quality_materials)
    {
        $name = $petrochemical->name . "-" . $quality_materials->name . "-" . $material->name . "-" . $grade->code;
        $check = EarlyMaterials::findOrFail($id)
            ->update([
                'name' => $name
            ]);
        return response()->json($check);

    }

    public function previous_price($val)
    {
        if ($val) {
            $previous_price = $val;
        } else {
            $previous_price = "---";
        }
        return $previous_price;
    }

    public function status($val)
    {
        if ($val) {
            $status = "غیرفعال";
        } else {
            $status = "فعال";
        }
        return $status;
    }
}
