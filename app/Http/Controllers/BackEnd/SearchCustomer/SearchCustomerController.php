<?php

namespace App\Http\Controllers\BackEnd\SearchCustomer;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\CustomersAgent;
use App\Models\CustomersBrands;
use App\Models\EventsResult;
use App\Models\EventsResultReason;
use App\Models\EventsCustomers;
use App\Models\EventsSubject;
use App\Models\EventsType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Morilog\Jalali\Jalalian;

class SearchCustomerController extends Controller
{
    public function index()
    {

    }

    public function search_customer_index(Request $request)
    {
        if ($request->input) {
            $filterData = \DB::table('customers')
                ->where('name', 'LIKE', '%' . $request->input . '%')
                ->get();
        } else {
            $filterData = "";
        }

        return response()->json($filterData);

    }

    public function customer_page($id, Request $request)
    {
        $customer = Customers::findOrFail($id);
        $customer_all = Customers::all();
        $customers_brands = CustomersBrands::whereCustomer_id($id)->get();
        $customers_agents = CustomersAgent::whereCustomer_id($id)->get();
        $events_types = EventsType::all();
        $events_subjects = EventsSubject::all();
        $events_results = EventsResult::all();
        $events_customers = EventsCustomers::whereCustomer_id($id)->orderBy('id', 'DESC')->get();
        $users = User::all();
        $events_result_reasons = EventsResultReason::all();
        $output = "

<section class='content' style='font-family: Shabnam !important;'>
 <div class='row'>
              <div class='col-md-3'>

          <div class='box box-primary' style='height: 300px !important;'>
            <div class='box-body box-profile' style='overflow-x: clip !important;overflow:scroll; height:300px;'>
              <img class='profile-user-img img-responsive img-circle' src='" . asset('/public/img/icon_customer.png') . "' alt='User profile picture'>
              <h3 class='profile-username text-center' style='font-family: Shabnam !important;'>$customer->name
               <a href='#' class='add_reminder'
               data-id='{$customer->id}'>
            <i class='fa fa-bell-o'></i>
                    </a></h3>
              <p class='text-muted text-center' style='font-family: Shabnam !important;'>{$customer->industrial->name}</p>
              <ul class='list-group list-group-unbordered'>
                <li class='list-group-item'>
                  <b>??????????</b> <a class='pull-left'>{$customer->state_city->country}_{$customer->state_city->state}_{$customer->state_city->city}</a>
                </li>
                <li class='list-group-item'>
                  <b>???? ??????</b> <a class='pull-left'>$customer->national_code</a>
                </li>
                <li class='list-group-item'>
                  <b>?????? ???????? ??????</b> <a class='pull-left'>$customer->open_account_ceiling</a>
                </li>
                <li class='list-group-item'>
                  <b>?????? ????????????</b> <a class='pull-left'>$customer->credit_limit</a>
                </li>
              </ul>
    </div>
          </div>
        </div>

       <div class='col-md-9 content_events_customers'>



          <div class='box box-primary' style='height: 300px !important;overflow-x: clip !important;overflow:auto;white-space: nowrap'>
 <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>???????? ???????????? ????</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th>??????</th>
            <th>??????????</th>
            <th>??????????</th>
            <th>??????????</th>
            <th>??????????</th>
        </tr>
        </thead>
       <tbody>";
        $number = 1;
        foreach ($events_customers as $events_customer) {
            $icon = asset('/public/'.$events_customer->events_type->icon);
            $output .= "
             <tr>
             <td width='1'><img src='" . $icon . "' width='30'></td>
             <td>{$events_customer->date}</td>
             <td>{$events_customer->events_subject->name}</td>
             <td>{$events_customer->events_result->name}</td>

             <td>
             <a href='#' class='fa fa-edit edit_events_customers' title='????????????' data-id='{$events_customer->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_events_customers' data-id='{$events_customer->id}' title='??????' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a class='btn btn-primary add_events' id='add_events'
        >?????????? ???????????? ????????</a>



        </div>

      </div>



       <div class='row'>
              <div class='col-md-6'>

          <div class='box box-primary' style='height: 400px !important;'>
        <canvas id='ChartComplaints' width='400' height='200'></canvas>

          </div>
        </div>
              <div class='col-md-6'>

          <div class='box box-primary' style='height: 400px !important;'>
        <canvas id='ChartSale' width='400' height='200'></canvas>

          </div>
        </div>


      </div>





             <div class='row'>
              <div class='col-md-4'>

          <div class='box box-primary' style='height: 300px !important;overflow-x: clip !important;overflow:auto;white-space: nowrap'>
          <div class='nav-tabs-custom'>
  <ul class='nav nav-tabs'>
              <li class='active'><a href='#activity' data-toggle='tab'>??????????</a></li>
    <li><a href='#timeline' data-toggle='tab'>???????? ????</a></li>
              <li><a href='#settings' data-toggle='tab'>?????????????? ??????????</a></li>
            </ul>
              <div class='tab-content'>
               <div class='active tab-pane' id='activity'>
 <table id='data-table' class='table table-bordered table-striped text-center' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>???????????? ??????????</th>
        </tr>
        <tr>
            <th width='2' style='background-color: #e5e5e5'>????</th>
            <td>$customer->code</td>

        </tr>
        <tr >
            <th style='background-color: #e5e5e5'>??????</th>
<td>$customer->name</td>
        </tr>
         <tr >
            <th style='background-color: #e5e5e5'>??????????????</th>
<td>{$customer->seller->name} {$customer->seller->fname}</td>
        </tr>
         <tr >
            <th style='background-color: #e5e5e5'>????????</th>
<td>{$customer->designer->name} {$customer->designer->fname}</td>
        </tr>
         <tr >
            <th style='background-color: #e5e5e5'>????????</th>
<td>{$customer->industrial->name}</td>
        </tr>
        <tr >
            <th style='background-color: #e5e5e5'>??????????</th>
             <td>{$customer->state_city->country}_{$customer->state_city->state}_{$customer->state_city->city}</td>
        </tr>
         <tr >
            <th style='background-color: #e5e5e5'>???? ??????</th>
             <td>{$customer->national_code}</td>
        </tr>
         <tr >
            <th style='background-color: #e5e5e5'>?????????? ??????</th>
<td>{$this->date($customer->created_at)}</td>        </tr>
         <tr >
            <th style='background-color: #e5e5e5'>??????????</th>
             <td>{$this->status($customer->status)}</td>
        </tr>

        </thead>

         </table>
<a class='btn btn-primary edit_customers' id='edit_customers' data-id='$id'
        >???????????? ???????????? ??????????</a>

</div>


<div class='tab-pane' id='timeline'>
 <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>?????????????? ??????????</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th>????????</th>
            <th>????????</th>
            <th>??????????</th>
        </tr>
        </thead>
        <tbody>";
        $number = 1;
        foreach ($customers_brands as $customers_brand) {
            $output .= "
             <tr>
             <td style='background-color: #e5e5e5'>$number</td>
             <td>{$customers_brand->name}</td>


             <td>
             <a href='#' class='fa fa-edit edit_customers_brands' title='????????????' data-id='{$customers_brand->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_customers_brands' data-id='{$customers_brand->id}' title='??????' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a class='btn btn-primary add_customers_brands' id='add_customers_brands'
        >?????????? ???????? ????????</a>




</div>




<div class='tab-pane' id='settings'>
 <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>?????????????? ??????????</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th>??????</th>
            <th>??????</th>
            <th>?????????? ????????</th>
            <th>??????????</th>
        </tr>
        </thead>
       <tbody>";
        foreach ($customers_agents as $customers_agent) {
            $output .= "
             <tr>
             <td>{$customers_agent->name}</td>
             <td>{$customers_agent->side}</td>
             <td>{$customers_agent->phone}</td>


             <td>
             <a href='#' class='fa fa-edit edit_customers_agent' title='????????????' data-id='{$customers_agent->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_customers_agent' data-id='{$customers_agent->id}' title='??????' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a class='btn btn-primary add_customers_agent' id='add_customers_agent'
        >?????????? ?????????????? ????????</a>
</div>

</div>
          </div>

          </div>
        </div>
       <div class='col-md-8'>



          <div class='box box-primary' style='height: 300px !important;overflow-x: clip !important;overflow:auto;white-space: nowrap'>
 <table id='data-table' class='table table-bordered table-striped text-center data-tablee' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>???????????? ????????</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>????</th>
            <th>??????????</th>
            <th>??????????</th>
            <th>??????</th>
            <th>??????????</th>
            <th>????????</th>
            <th>??????????</th>
            <th>??????????</th>
        </tr>
        </thead>
        <tbody>


         </tbody>
         </table>
  <a class='btn btn-primary add_color' id='add_color'
        >?????? ????????????</a>
          </div>
          </div>
        </div>


      </div>


      </section>



    ";
        if ($request->ajax()) {
            return response()->json($output);
        } else {
            return view('FrontEnd.SearchCustomer.index', compact('output', 'events_types'
                , 'events_subjects', 'events_results', 'events_result_reasons', 'users', 'id', 'customer_all'));
        }


    }

    public function events_customers_attach(Request $request)
    {

        $EventsCustomers = EventsCustomers::orderBy('id', 'DESC')->first();
        $size = $_FILES['file']['size'][0];
        if ($size > 0) {
            $count = count($_FILES['file']['name']);
            for ($i = 0; $i < $count; $i++) {
                $filename = rand(0000, 9999) . '_' . $_FILES['file']['name'][$i];
                $sourcePath = $_FILES['file']['tmp_name'][$i];
                $targetPath = "events_customers_attach/" . $filename;

                if (move_uploaded_file($sourcePath, $targetPath)) {
                    $uploadedFile = $filename;
                } else {
                    $uploadedFile = '';
                }
                \DB::table('events_customers_attach')
                    ->insert([
                        'events_customers_id' => $EventsCustomers->id,
                        'file' => $uploadedFile
                    ]);
            }
        }
    }

    public function events_customers_detail_attach(Request $request)
    {

        $EventsCustomers = \DB::table('events_customers_detail')
            ->orderBy('id', 'DESC')->first();
        $size = $_FILES['file']['size'][0];
        if ($size > 0) {
            $count = count($_FILES['file']['name']);
            for ($i = 0; $i < $count; $i++) {
                $filename = rand(0000, 9999) . '_' . $_FILES['file']['name'][$i];
                $sourcePath = $_FILES['file']['tmp_name'][$i];
                $targetPath = "events_customers_detail_attach/" . $filename;

                if (move_uploaded_file($sourcePath, $targetPath)) {
                    $uploadedFile = $filename;
                } else {
                    $uploadedFile = '';
                }
                \DB::table('events_customers_detail_attach')
                    ->insert([
                        'events_customers_detail_id' => $EventsCustomers->id,
                        'file' => $uploadedFile
                    ]);
            }
            $data = \DB::table('events_customers_detail')
                ->where('events_customers_id', $EventsCustomers->events_customers_id)
                ->get();
            $output = "
                           <table id='data-table' class='table table-bordered table-striped text-center data-tablee'
                               style='width:100%'>
                            <thead>
                            <tr>
                                <th class='text-center' colspan='20' style='background-color: #cddbf6'>???????????? ????????????
                                </th>
                            </tr>
                            <tr style='background-color: #e5e5e5'>
                                <th>????????</th>
                                <th>??????</th>
                                <th>??????????</th>
                                <th>??????????</th>
                            </tr>
                            </thead>
                            <tbody>
        <tbody>
        ";
            $number = 1;
            foreach ($data as $item) {
                $count = \DB::table('events_customers_detail_attach')
                    ->where('events_customers_detail_id', $item->id)
                    ->count();
                $output .= "
             <tr>
             <td style='background-color: #e5e5e5'>$number</td>
             <td>$item->text</td>
             <td>
             <a href='#' class='see_detail' title='????????????' data-id='{$item->id}'>
             $count
             </a>
             </td>
             <td>
             <a href='#' class='fa fa-edit edit_events_customers_detail_attach_all' title='????????????' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_events_customers_detail_attach_all' data-id='{$item->id}'
              title='??????' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
                $number++;
            }
            $output .= "
         </tbody>
         </table>
        <a class='btn btn-primary add_events_customer_attach' id='add_events_customer_attach'
                        >????????????</a>
        ";
            return response()->json($output);
        }

    }

    public function remove_events_customers(Request $request)
    {

        $events_customers_attachs = \DB::table('events_customers_attach')
            ->where('events_customers_id', $request->id)
            ->get();
        $events_customers_details = \DB::table('events_customers_detail')
            ->where('events_customers_id', $request->id)
            ->get();
        foreach ($events_customers_attachs as $events_customers_attach) {

            $file_path = app_path("events_customers_attach/{$events_customers_attach->file}");
            if(\File::exists($file_path)) \File::delete($file_path);
        }

        foreach ($events_customers_details as $events_customers_detail) {
            $events_customers_detail_attachs = \DB::table('events_customers_detail_attach')
                ->where('events_customers_detail_id', $events_customers_detail->id)
                ->get();
            foreach ($events_customers_detail_attachs as $events_customers_detail_attach) {
                $file_path = app_path("events_customers_detail_attach/{$events_customers_detail_attach->file}");
                if(\File::exists($file_path)) \File::delete($file_path);
            }
        }


        EventsCustomers::findOrFail($request->id)->delete();
        return response()->json(['success' => '???????????? ?????????? ???? ???????????? ???? ?????????? ?????? ????']);
    }

    public function edit_events_customers(Request $request)
    {
        $events_customers = EventsCustomers::find($request->id);
        $events_customers_attach = \DB::table('events_customers_attach')
            ->where('events_customers_id', $request->id)
            ->get();
        $events_types = EventsType::all();
        $events_subjects = EventsSubject::all();
        $events_results = EventsResult::all();
        $events_result_reasons = EventsResultReason::all();
        $users = User::all();

        $data = \DB::table('events_customers_detail')
            ->where('events_customers_id', $request->id)
            ->get();
        $output = "
                           <table id='data-table' class='table table-bordered table-striped text-center data-table'
                               style='width:100%'>
                            <thead>
                            <tr>
                                <th class='text-center' colspan='20' style='background-color: #cddbf6'>???????????? ????????????
                                </th>
                            </tr>
                            <tr style='background-color: #e5e5e5'>
                                <th>????????</th>
                                <th>??????</th>
                                <th>??????????</th>
                                <th>??????????</th>
                            </tr>
                            </thead>
                            <tbody>
        <tbody>
        ";
        $number = 1;
        foreach ($data as $item) {
            $count = \DB::table('events_customers_detail_attach')
                ->where('events_customers_detail_id', $item->id)
                ->count();
            $output .= "
             <tr>
             <td style='background-color: #e5e5e5'>$number</td>
             <td>$item->text</td>
             <td>
              <a href='#' class='see_detail' title='????????????' data-id='{$item->id}'>
             $count
             </a>
</td>
             <td>
             <a href='#' class='fa fa-edit edit_events_customers_detail_attach_all' title='????????????' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_events_customers_detail_attach_all' data-id='{$item->id}' title='??????' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a class='btn btn-primary add_events_customer_attach' id='add_events_customer_attach'
                        >????????????</a>
        ";


        return response()->json(['data' => $events_customers, 'events_types' => $events_types
            , 'events_subjects' => $events_subjects, 'events_results' => $events_results
            , 'events_result_reasons' => $events_result_reasons, 'users' => $users
            , 'events_customers_attach' => $events_customers_attach, 'output' => $output]);
    }

    public function edit_events_customers_attach(Request $request)
    {

        $events_customers_detail_attachs = \DB::table('events_customers_attach')
            ->where('events_customers_id', $request->id)
            ->get();
        foreach ($events_customers_detail_attachs as $events_customers_detail_attach) {

            $file_path = app_path("events_customers_attach/{$events_customers_detail_attach->file}");
            if(\File::exists($file_path)) \File::delete($file_path);

        }


        \DB::table('events_customers_attach')
            ->where('events_customers_id', $request->id)
            ->delete();

        $size = $_FILES['file']['size'][0];
        if ($size > 0) {
            $count = count($_FILES['file']['name']);
            for ($i = 0; $i < $count; $i++) {
                $filename = rand(0000, 9999) . '_' . $_FILES['file']['name'][$i];
                $sourcePath = $_FILES['file']['tmp_name'][$i];
                $targetPath = "events_customers_attach/" . $filename;

                if (move_uploaded_file($sourcePath, $targetPath)) {
                    $uploadedFile = $filename;
                } else {
                    $uploadedFile = '';
                }
                \DB::table('events_customers_attach')
                    ->insert([
                        'events_customers_id' => $request->id,
                        'file' => $uploadedFile
                    ]);
            }
        }


        return response()->json();

    }

    public function see_customers_events_detail(Request $request)
    {

        $data = \DB::table('events_customers_detail_attach')
            ->where('events_customers_detail_id', $request->id)
            ->get();
        $output = "
                           <table id='data-table' class='table table-bordered table-striped text-center data-tabled'
                               style='width:100%'>
                            <thead>
                            <tr>
                                <th class='text-center' colspan='20' style='background-color: #cddbf6'>?????????????? ?????????? ???????????? ????????????
                                </th>
                            </tr>
                            <tr style='background-color: #e5e5e5'>
                                <th>????????</th>
                                <th>??????????</th>
                                <th>??????????</th>
                            </tr>
                            </thead>
                            <tbody>
        <tbody>
        ";
        $number = 1;
        foreach ($data as $item) {
            $output .= "
             <tr>
             <td style='background-color: #e5e5e5'>$number</td>
             <td>
             <a target='_blank' href='" . url('/public/events_customers_detail_attach', $item->file) . "'>????????????</a>

</td>

             <td>
             <a href='#' class='fa fa-trash remove_events_customers_detail_attach' data-id='{$item->id}' title='??????' style='color: red !important;'></a>&nbsp;&nbsp;
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

    public function remove_customers_events_detail(Request $request)
    {
        $events_customers_detail_attach = \DB::table('events_customers_detail_attach')
            ->where('id', $request->id)
            ->first();

        $file_path = app_path("events_customers_detail_attach/{$events_customers_detail_attach->file}");
        if(\File::exists($file_path)) \File::delete($file_path);

        \DB::table('events_customers_detail_attach')
            ->where('id', $request->id)->delete();

        $data = \DB::table('events_customers_detail_attach')
            ->where('events_customers_detail_id', $events_customers_detail_attach->events_customers_detail_id)
            ->get();
        $output = "
                           <table id='data-table' class='table table-bordered table-striped text-center data-tabled'
                               style='width:100%'>
                            <thead>
                            <tr>
                                <th class='text-center' colspan='20' style='background-color: #cddbf6'>?????????????? ?????????? ???????????? ????????????
                                </th>
                            </tr>
                            <tr style='background-color: #e5e5e5'>
                                <th>????????</th>
                                <th>??????????</th>
                                <th>??????????</th>
                            </tr>
                            </thead>
                            <tbody>
        <tbody>
        ";
        $number = 1;
        foreach ($data as $item) {
            $output .= "
             <tr>
             <td style='background-color: #e5e5e5'>$number</td>
             <td>
             <a target='_blank' href='" . url('/public/events_customers_detail_attach', $item->file) . "'>????????????</a>

</td>

             <td>
             <a href='#' class='fa fa-trash remove_events_customers_detail_attach' data-id='{$item->id}' title='??????' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>

        ";

        return response()->json(['success' => '???????? ???? ???????????? ???? ?????????? ?????? ????', 'output' => $output]);
    }

    public function remove_events_customers_detail_attach_all(Request $request)
    {
        $events_customers_detail = \DB::table('events_customers_detail')
            ->where('id', $request->id)
            ->first();

        $events_customers_detail_attachs = \DB::table('events_customers_detail_attach')
            ->where('events_customers_detail_id', $events_customers_detail->id)
            ->get();
        foreach ($events_customers_detail_attachs as $events_customers_detail_attach) {
            $file_path = app_path("events_customers_detail_attach/{$events_customers_detail_attach->file}");
            if(\File::exists($file_path)) \File::delete($file_path);

        }


        \DB::table('events_customers_detail')
            ->where('id', $request->id)
            ->delete();


        $data = \DB::table('events_customers_detail')
            ->where('events_customers_id', $events_customers_detail->events_customers_id)
            ->get();
        $output = "
                           <table id='data-table' class='table table-bordered table-striped text-center data-tablee'
                               style='width:100%'>
                            <thead>
                            <tr>
                                <th class='text-center' colspan='20' style='background-color: #cddbf6'>???????????? ????????????
                                </th>
                            </tr>
                            <tr style='background-color: #e5e5e5'>
                                <th>????????</th>
                                <th>??????</th>
                                <th>??????????</th>
                                <th>??????????</th>
                            </tr>
                            </thead>
                            <tbody>
        <tbody>
        ";
        $number = 1;
        foreach ($data as $item) {
            $count = \DB::table('events_customers_detail_attach')
                ->where('events_customers_detail_id', $item->id)
                ->count();
            $output .= "
             <tr>
             <td style='background-color: #e5e5e5'>$number</td>
             <td>$item->text</td>
             <td>
             <a href='#' class='see_detail' title='????????????' data-id='{$item->id}'>
             $count
             </a>
             </td>
             <td>
             <a href='#' class='fa fa-edit edit_events_customers_detail_attach_all' title='????????????' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_events_customers_detail_attach_all' data-id='{$item->id}'
              title='??????' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
            $number++;
        }
        $output .= "
         </tbody>
         </table>
        <a class='btn btn-primary add_events_customer_attach' id='add_events_customer_attach'
                        >????????????</a>
        ";
        return response()->json(['success' => '???????????? ???????????? ???? ???????????? ???? ?????????? ?????? ????', 'output' => $output]);

    }

    public function edit_events_customer_attach(Request $request)
    {

        $events_customers_detail = \DB::table('events_customers_detail')
            ->where('id', $request->id)
            ->first();
        $events_customers_detail_attach = \DB::table('events_customers_detail_attach')
            ->where('events_customers_detail_id', $request->id)
            ->get();

        return response()->json(['events_customers_detail' => $events_customers_detail,
            'events_customers_detail_attach' => $events_customers_detail_attach]);
    }

    public function post_data_edit_events_customer_attach(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'edit_text' => 'required',
        ], [
            'edit_text.required' => '???????? ???????? ?????? ???????????? ????????????',
        ]);
        if ($validator->passes()) {
            \DB::table('events_customers_detail')
                ->where('id', $request->edit_id_events_customers)
                ->update([
                    'text' => $request['edit_text'],
                ]);
            return response()->json(['success' => '???????????? ???????????? ???????????? ???? ???????????? ???????????? ????', 'status' => 1]);
        }
        return response()->json(['errors' => $validator->errors(), 'status' => 0]);
    }

    public function edit_events_customers_attach_detail(Request $request)
    {
        $events_customers_detail = \DB::table('events_customers_detail')
            ->where('id', $request->id)
            ->first();
        $events_customers_detail_attachs = \DB::table('events_customers_detail_attach')
            ->where('events_customers_detail_id', $request->id)
            ->get();
        foreach ($events_customers_detail_attachs as $events_customers_detail_attach) {

            $file_path = app_path("events_customers_detail_attach/{$events_customers_detail_attach->file}");
            if(\File::exists($file_path)) \File::delete($file_path);


        }

        \DB::table('events_customers_detail_attach')
            ->where('events_customers_detail_id', $request->id)
            ->delete();

        $size = $_FILES['file']['size'][0];
        if ($size > 0) {
            $count = count($_FILES['file']['name']);
            for ($i = 0; $i < $count; $i++) {
                $filename = rand(0000, 9999) . '_' . $_FILES['file']['name'][$i];
                $sourcePath = $_FILES['file']['tmp_name'][$i];
                $targetPath = "events_customers_detail_attach/" . $filename;

                if (move_uploaded_file($sourcePath, $targetPath)) {
                    $uploadedFile = $filename;
                } else {
                    $uploadedFile = '';
                }
                \DB::table('events_customers_detail_attach')
                    ->insert([
                        'events_customers_detail_id' => $request->id,
                        'file' => $uploadedFile
                    ]);
            }
            $data = \DB::table('events_customers_detail')
                ->where('events_customers_id', $events_customers_detail->events_customers_id)
                ->get();
            $output = "
                           <table id='data-table' class='table table-bordered table-striped text-center data-tablee'
                               style='width:100%'>
                            <thead>
                            <tr>
                                <th class='text-center' colspan='20' style='background-color: #cddbf6'>???????????? ????????????
                                </th>
                            </tr>
                            <tr style='background-color: #e5e5e5'>
                                <th>????????</th>
                                <th>??????</th>
                                <th>??????????</th>
                                <th>??????????</th>
                            </tr>
                            </thead>
                            <tbody>
        <tbody>
        ";
            $number = 1;
            foreach ($data as $item) {
                $count = \DB::table('events_customers_detail_attach')
                    ->where('events_customers_detail_id', $item->id)
                    ->count();
                $output .= "
             <tr>
             <td style='background-color: #e5e5e5'>$number</td>
             <td>$item->text</td>
             <td>
             <a href='#' class='see_detail' title='????????????' data-id='{$item->id}'>
             $count
             </a>
             </td>
             <td>
             <a href='#' class='fa fa-edit edit_events_customers_detail_attach_all' title='????????????' data-id='{$item->id}'></a>&nbsp;&nbsp;
             <a href='#' class='fa fa-trash remove_events_customers_detail_attach_all' data-id='{$item->id}'
              title='??????' style='color: red !important;'></a>&nbsp;&nbsp;
             </td>
             </tr>
        ";
                $number++;
            }
            $output .= "
         </tbody>
         </table>
        <a class='btn btn-primary add_events_customer_attach' id='add_events_customer_attach'
                        >????????????</a>
        ";
        }

        return response()->json($output);

    }

    public function status($val)
    {
        if ($val == 1) {
            $status = "????????";
        } else {
            $status = "??????????????";
        }
        return $status;
    }

    public function date($val)
    {
        $date = Jalalian::forge($val)->format('Y/m/d');
        return $date;
    }
}
