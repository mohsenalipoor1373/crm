<?php

namespace Modules\SearchCustomer\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Customers\Entities\Customers;

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


    public function customer_page($id)
    {
        $customer = Customers::findOrFail($id);
        $output = "
            <section style='font-family: Shabnam !important;' class='content-header'>
      <h1 style='font-family: Shabnam !important;'>
        CRM مشتری
      </h1>
    </section>
<section class='content' style='font-family: Shabnam !important;'>
 <div class='row'>
              <div class='col-md-3'>

          <div class='box box-primary' style='height: 300px !important;'>
            <div class='box-body box-profile' style='overflow:scroll; height:300px;'>
              <img class='profile-user-img img-responsive img-circle' src='" . asset('img/icon_customer.png') . "' alt='User profile picture'>

              <h3 class='profile-username text-center' style='font-family: Shabnam !important;'>$customer->name</h3>

              <p class='text-muted text-center' style='font-family: Shabnam !important;'>{$customer->industrial->name}</p>

              <ul class='list-group list-group-unbordered'>
                <li class='list-group-item'>
                  <b>منطقه</b> <a class='pull-left'>{$customer->state_city->country}_{$customer->state_city->state}_{$customer->state_city->city}</a>
                </li>
                <li class='list-group-item'>
                  <b>کد ملی</b> <a class='pull-left'>$customer->national_code</a>
                </li>
                <li class='list-group-item'>
                  <b>سقف حساب باز</b> <a class='pull-left'>$customer->open_account_ceiling</a>
                </li>
                <li class='list-group-item'>
                  <b>سقف اعتبار</b> <a class='pull-left'>$customer->credit_limit</a>
                </li>
              </ul>

    </div>
          </div>
        </div>

       <div class='col-md-9'>



          <div class='box box-primary' style='height: 300px !important;scroll-direction:horizontal;overflow:auto;white-space: nowrap'>
 <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>لیست رویداد ها</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th>کد</th>
            <th>تاریخ</th>
            <th>نوع</th>
            <th>موضوع</th>
            <th>نتیجه</th>
            <th>ابزار</th>
        </tr>
        </thead>
        <tbody>
       <tr>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
</tr>
             <tr>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
</tr>
       <tr>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
</tr>
       <tr>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
</tr>
       <tr>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
</tr>
       <tr>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
</tr>
       <tr>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
</tr>
       <tr>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
</tr>
       <tr>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
</tr>
       <tr>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
</tr>
       <tr>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
</tr>
       <tr>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
       <td>1</td>
</tr>

         </tbody>
         </table>

          </div>
        </div>

      </div>



       <div class='row'>
              <div class='col-md-6'>

          <div class='box box-primary' style='height: 300px !important;'>
        <canvas id='ChartComplaints' width='400' height='200'></canvas>

          </div>
        </div>
              <div class='col-md-6'>

          <div class='box box-primary' style='height: 300px !important;'>
        <canvas id='ChartSale' width='400' height='200'></canvas>

          </div>
        </div>


      </div>





             <div class='row'>
              <div class='col-md-3'>

          <div class='box box-primary' style='height: 300px !important;'>
          <div class='nav-tabs-custom'>
  <ul class='nav nav-tabs'>
              <li class='active'><a href='#activity' data-toggle='tab'>1</a></li>
    <li><a href='#timeline' data-toggle='tab'>2</a></li>
              <li><a href='#settings' data-toggle='tab'>3</a></li>
            </ul>
          </div>

          </div>
        </div>
       <div class='col-md-9'>



          <div class='box box-primary' style='height: 300px !important;'>
 <table id='data-table' class='table table-bordered table-striped text-center data-table' style='width:100%'>
        <thead>
        <tr>
            <th class='text-center' colspan='20' style='background-color: #cddbf6'>جزییات فروش</th>
        </tr>
        <tr style='background-color: #e5e5e5'>
            <th width='1'>کد</th>
            <th>تاریخ</th>
            <th>نوع</th>
            <th>موضوع</th>
            <th>نتیجه</th>
            <th>دلایل</th>
            <th>مذاکره کننده</th>
            <th>ابزار</th>
        </tr>
        </thead>
        <tbody>


         </tbody>
         </table>

          </div>
        </div>


      </div>


      </section>



    ";
        return view('searchcustomer::index', compact('output'));

    }


}
