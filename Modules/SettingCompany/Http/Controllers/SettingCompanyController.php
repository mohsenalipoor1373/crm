<?php

namespace Modules\SettingCompany\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SettingCompany\Entities\SettingCompany;
use Validator;

/**
 * @method static findOrFail(mixed $id)
 */
class SettingCompanyController extends Controller
{
    public function index(Request $request)
    {
        $data = SettingCompany::orderBy('id', 'DESC')->get();
        $output = "
       <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست تنظیمات شرکت</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>ردیف</th>
            <th>نام</th>
            <th>تلفن دفتر مرکزی</th>
            <th>فاکس دفتر مرکزی</th>
            <th>ایمیل دفتر</th>
            <th>آدرس دفتر مرکزی</th>
            <th>تلفن اصلی کارخانه</th>
            <th>فاکس کارخانه</th>
            <th>ایمیل کارخانه</th>
            <th>آدرس کارخانه</th>
            <th>لوگو صفحه اصلی</th>
            <th>لوگو گزارشات</th>
            <th>سایر تلفن های دفتر</th>
            <th>سایر تلفن های کارخانه</th>
            <th>ابزار</th>
        </tr>
        </thead>
        <tbody>
        ";
        $number = 1;
        foreach ($data as $item) {
            if ($item->home_logo) {
                $home_logo = $item->home_logo;
            } else {
                $home_logo = "";
            }
            if ($item->logo_reports) {
                $logo_reports = $item->logo_reports;
            } else {
                $logo_reports = "";
            }
            $output .= "
             <tr>
             <td style='background-color: #e5e5e5'>$number</td>
             <td>$item->name</td>
             <td>$item->tel_central_office</td>
             <td>$item->fax_central_office</td>
             <td>$item->office_email</td>
             <td>$item->address_central_office</td>
             <td>$item->factory_main_phone</td>
             <td>$item->factory_fox</td>
             <td>$item->factory_email</td>
             <td>$item->factory_address</td>
             <td>
             <img src='$home_logo' width='30'>
             </td>
             <td>
             <img src='$logo_reports' width='30'>
             </td>
             <td>$item->other_office_phone</td>
             <td>$item->other_factory_phone</td>
             <td>
             <a href='#' class='fa fa-edit edit_setting_company' title='ویرایش' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_setting_company' data-id='{$item->id}' title='حذف' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a style='margin-top: -72px' class='btn btn-primary add_setting_company' id='add_setting_company'
        >تعریف تنظیمات جدید</a>
        ";
        if ($request->ajax()) {
            return response()->json($output);
        } else {
            return view('settingcompany::index', compact('output'));
        }
    }

    public function post_data_setting_company(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], [
            'name.required' => 'وارد کردن نام الزامی میباشد',
        ]);

        if ($request->hasFile('logo_reports')) {
            $file = $request->file('logo_reports');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $logo_reports = $request->file('logo_reports')->move('settings/logo_reports', $filename);
        } else {
            $logo_reports = "";
        }


        if ($request->hasFile('home_logo')) {
            $file = $request->file('home_logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $home_logo = $request->file('home_logo')->move('settings/home_logo', $filename);
        } else {
            $home_logo = "";
        }

        if ($validator->passes()) {
            SettingCompany::create([
                'name' => $request['name'],
                'tel_central_office' => $request['tel_central_office'],
                'fax_central_office' => $request['fax_central_office'],
                'office_email' => $request['office_email'],
                'address_central_office' => $request['address_central_office'],
                'factory_main_phone' => $request['factory_main_phone'],
                'factory_fox' => $request['factory_fox'],
                'factory_email' => $request['factory_email'],
                'factory_address' => $request['factory_address'],
                'home_logo' => $home_logo,
                'logo_reports' => $logo_reports,
                'other_office_phone' => $request['other_office_phone'],
                'other_factory_phone' => $request['other_factory_phone']
            ]);
            return response()->json(['success' => 'مشخصات تنظمیات با موفقیت ثبت شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function post_data_edit_setting_company(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_name' => 'required',
        ], [
            'edit_name.required' => 'وارد کردن نام الزامی میباشد',
        ]);
        $setting_company = SettingCompany::findOrFail($request->id);
        if ($request->hasFile('logo_reports')) {
            $file = $request->file('logo_reports');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $logo_reports = $request->file('logo_reports')->move('settings/logo_reports', $filename);
        } else {
            $logo_reports = $setting_company->logo_reports;
        }


        if ($request->hasFile('home_logo')) {
            $file = $request->file('home_logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $home_logo = $request->file('home_logo')->move('settings/home_logo', $filename);
        } else {
            $home_logo = $setting_company->home_logo;
        }
        if ($validator->passes()) {
            $setting_company->update(
                [
                    'name' => $request['edit_name'],
                    'tel_central_office' => $request['edit_tel_central_office'],
                    'fax_central_office' => $request['edit_fax_central_office'],
                    'office_email' => $request['edit_office_email'],
                    'address_central_office' => $request['edit_address_central_office'],
                    'factory_main_phone' => $request['edit_factory_main_phone'],
                    'factory_fox' => $request['edit_factory_fox'],
                    'factory_email' => $request['edit_factory_email'],
                    'factory_address' => $request['edit_factory_address'],
                    'home_logo' => $home_logo,
                    'logo_reports' => $logo_reports,
                    'other_office_phone' => $request['edit_other_office_phone'],
                    'other_factory_phone' => $request['edit_other_factory_phone']
                ]
            );
            return response()->json(['success' => 'مشخصات تنظیمات با موفقیت ویرایش شد', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_setting_company(Request $request)
    {
        $permissions = SettingCompany::findOrFail($request->id);
        return response()->json($permissions);
    }

    public function remove_setting_company(Request $request)
    {
        SettingCompany::findOrFail($request->id)->delete();
        return response()->json(['success' => 'تنظیمات شرکت با موفقیت از سیستم حذف شد']);
    }
}
