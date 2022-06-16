<?php

namespace App\Http\Controllers\BackEnd\LabelInventoryTransactionType;

use App\Http\Controllers\Controller;
use App\Models\LabelInventoryTransactionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LabelInventoryTransactionTypeController extends Controller
{
    public function index(Request $request)
    {
        $data = LabelInventoryTransactionType::orderBy('id', 'DESC')->get();
        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست تراکنشهای انبار لیبل</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>کد نوع تراکنش</th>
            <th>نوع تراکنش ثبتی</th>
            <th>شرح تراکنش</th>
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
             <td style='background-color: {$this->color_type($item->type)}'>{$this->type($item->type)}</td>
             <td>$item->text</td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_label_inventory_transaction_type' id='add_label_inventory_transaction_type'
        >تعریف نوع تراکنش جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json($output);
        } else {
            return view('FrontEnd.LabelInventoryTransactionType.index', compact('output'));
        }
    }

    public function post_data_label_inventory_transaction_type(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'type' => 'required',
            'text' => 'required',
        ], [
            'name.required' => 'وارد کردن کد تراکنش الزامی میباشد',
            'type.required' => 'وارد کردن نوع تراکنش الزامی میباشد',
            'text.required' => 'وارد کردن شرح تراکنش الزامی میباشد',
        ]);
        if ($validator->passes()) {
            LabelInventoryTransactionType::create([
                'code' => $request['code'],
                'type' => $request['type'],
                'text' => $request['text'],
            ]);
            return response()->json(['success' => 'مشخصات نوع تراکنش با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_label_inventory_transaction_type(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_code' => 'required',
            'edit_type' => 'required',
            'edit_text' => 'required',
        ], [
            'edit_name.required' => 'وارد کردن کد تراکنش الزامی میباشد',
            'edit_type.required' => 'وارد کردن نوع تراکنش الزامی میباشد',
            'edit_text.required' => 'وارد کردن شرح تراکنش الزامی میباشد',
        ]);
        if ($validator->passes()) {
            LabelInventoryTransactionType::findOrFail($request->id)->update(
                [
                    'code' => $request['edit_code'],
                    'type' => $request['edit_type'],
                    'text' => $request['edit_text'],
                ]
            );
            return response()->json(['success' => 'مشخصات نوع تراکنش با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_label_inventory_transaction_type(Request $request)
    {
        $permissions = LabelInventoryTransactionType::findOrFail($request->id);
        return response()->json($permissions);
    }

    public function remove_label_inventory_transaction_type(Request $request)
    {
        LabelInventoryTransactionType::findOrFail($request->id)->delete();
        return response()->json(['success' => 'نوع تراکنش با موفقیت از سیستم حذف شد ']);
    }

    public function type($val)
    {
        if ($val == 0){
            $type = "رسید";
        }else{
            $type = "حواله";
        }
        return $type;
    }
    public function color_type($val)
    {
        if ($val == 0){
            $background_color = "lightgreen";
        }else{
            $background_color = "#f2dede";
        }
        return $background_color;
    }
}
