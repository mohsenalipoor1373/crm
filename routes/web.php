<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->prefix('users')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\Users\UsersController::class, 'index'])->name('users_index');
    Route::post('post_data_user', [\App\Http\Controllers\BackEnd\Users\UsersController::class, 'post_data_user'])->name('post_data_user');
    Route::post('post_data_edit_user', [\App\Http\Controllers\BackEnd\Users\UsersController::class, 'post_data_edit_user'])->name('post_data_edit_user');
    Route::get('edit_users', [\App\Http\Controllers\BackEnd\Users\UsersController::class, 'edit_users'])->name('edit_users');
    Route::get('ban_users', [\App\Http\Controllers\BackEnd\Users\UsersController::class, 'ban_users'])->name('ban_users');
    Route::get('remove_users', [\App\Http\Controllers\BackEnd\Users\UsersController::class, 'remove_users'])->name('remove_users');
    Route::get('add_permission_to_users/{id?}', [\App\Http\Controllers\BackEnd\Users\UsersController::class, 'add_permission_to_users'])->name('add_permission_to_users');
    Route::post('post_data_permission_user', [\App\Http\Controllers\BackEnd\Users\UsersController::class, 'post_data_permission_user'])->name('post_data_permission_user');

});

Route::middleware('auth')->prefix('roles')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\Roles\RolesController::class, 'index'])->name('roles');
    Route::post('post_data_role', [\App\Http\Controllers\BackEnd\Roles\RolesController::class, 'post_data_role'])->name('post_data_role');
    Route::post('post_data_edit_role', [\App\Http\Controllers\BackEnd\Roles\RolesController::class, 'post_data_edit_role'])->name('post_data_edit_role');
    Route::get('edit_roles', [\App\Http\Controllers\BackEnd\Roles\RolesController::class, 'edit_roles'])->name('edit_roles');
    Route::get('remove_roles', [\App\Http\Controllers\BackEnd\Roles\RolesController::class, 'remove_roles'])->name('remove_roles');
    Route::get('add_roles_to_users/{id?}', [\App\Http\Controllers\BackEnd\Roles\RolesController::class, 'roles_to_users'])->name('add_roles_to_users');
    Route::post('post_data_permission_role', [\App\Http\Controllers\BackEnd\Roles\RolesController::class, 'post_data_permission_role'])->name('post_data_permission_role');

});

Route::middleware('auth')->prefix('permissions')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\Permissions\PermissionsController::class, 'index'])->name('permissions');
    Route::post('post_data_permissions', [\App\Http\Controllers\BackEnd\Permissions\PermissionsController::class, 'post_data_permissions'])->name('post_data_permissions');
    Route::post('post_data_edit_permissions', [\App\Http\Controllers\BackEnd\Permissions\PermissionsController::class, 'post_data_edit_permissions'])->name('post_data_edit_permissions');
    Route::get('edit_permissions', [\App\Http\Controllers\BackEnd\Permissions\PermissionsController::class, 'edit_permissions'])->name('edit_permissions');
    Route::get('remove_permissions', [\App\Http\Controllers\BackEnd\Permissions\PermissionsController::class, 'remove_permissions'])->name('remove_permissions');
});

Route::middleware('auth')->prefix('grouping')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\Grouping\GroupingController::class, 'index'])->name('grouping');
    Route::post('post_data_grouping', [\App\Http\Controllers\BackEnd\Grouping\GroupingController::class, 'post_data_grouping'])->name('post_data_grouping');
    Route::post('post_data_edit_grouping', [\App\Http\Controllers\BackEnd\Grouping\GroupingController::class, 'post_data_edit_grouping'])->name('post_data_edit_grouping');
    Route::get('edit_grouping', [\App\Http\Controllers\BackEnd\Grouping\GroupingController::class, 'edit_grouping'])->name('edit_grouping');
    Route::get('remove_grouping', [\App\Http\Controllers\BackEnd\Grouping\GroupingController::class, 'remove_grouping'])->name('remove_grouping');
});

Route::middleware('auth')->prefix('shift')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\Shift\ShiftController::class, 'index'])->name('shift');
    Route::post('post_data_shift', [\App\Http\Controllers\BackEnd\Shift\ShiftController::class, 'post_data_shift'])->name('post_data_shift');
    Route::post('post_data_edit_shift', [\App\Http\Controllers\BackEnd\Shift\ShiftController::class, 'post_data_edit_shift'])->name('post_data_edit_shift');
    Route::get('edit_shift', [\App\Http\Controllers\BackEnd\Shift\ShiftController::class, 'edit_shift'])->name('edit_shift');
    Route::get('remove_shift', [\App\Http\Controllers\BackEnd\Shift\ShiftController::class, 'remove_shift'])->name('remove_shift');
});

Route::middleware('auth')->prefix('product_type')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\ProductType\ProductTypeController::class, 'index'])->name('product_type');
    Route::post('post_data_product_type', [\App\Http\Controllers\BackEnd\ProductType\ProductTypeController::class, 'post_data_product_type'])->name('post_data_product_type');
    Route::post('post_data_edit_product_type', [\App\Http\Controllers\BackEnd\ProductType\ProductTypeController::class, 'post_data_edit_product_type'])->name('post_data_edit_product_type');
    Route::get('edit_product_type', [\App\Http\Controllers\BackEnd\ProductType\ProductTypeController::class, 'edit_product_type'])->name('edit_product_type');
    Route::get('remove_product_type', [\App\Http\Controllers\BackEnd\ProductType\ProductTypeController::class, 'remove_product_type'])->name('remove_product_type');
});

Route::middleware('auth')->prefix('product_shape')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\ProductShape\ProductShapeController::class, 'index'])->name('product_shape');
    Route::post('post_data_product_shape', [\App\Http\Controllers\BackEnd\ProductShape\ProductShapeController::class, 'post_data_product_shape'])->name('post_data_product_shape');
    Route::post('post_data_edit_product_shape', [\App\Http\Controllers\BackEnd\ProductShape\ProductShapeController::class, 'post_data_edit_product_shape'])->name('post_data_edit_product_shape');
    Route::get('edit_product_shape', [\App\Http\Controllers\BackEnd\ProductShape\ProductShapeController::class, 'edit_product_shape'])->name('edit_product_shape');
    Route::get('remove_product_shape', [\App\Http\Controllers\BackEnd\ProductShape\ProductShapeController::class, 'remove_product_shape'])->name('remove_product_shape');
});

Route::middleware('auth')->prefix('product_index')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\ProductIndex\ProductIndexController::class, 'index'])->name('product_index');
    Route::post('post_data_product_index', [\App\Http\Controllers\BackEnd\ProductIndex\ProductIndexController::class, 'post_data_product_index'])->name('post_data_product_index');
    Route::post('post_data_edit_product_index', [\App\Http\Controllers\BackEnd\ProductIndex\ProductIndexController::class, 'post_data_edit_product_index'])->name('post_data_edit_product_index');
    Route::get('edit_product_index', [\App\Http\Controllers\BackEnd\ProductIndex\ProductIndexController::class, 'edit_product_index'])->name('edit_product_index');
    Route::get('remove_product_index', [\App\Http\Controllers\BackEnd\ProductIndex\ProductIndexController::class, 'remove_product_index'])->name('remove_product_index');
});

Route::middleware('auth')->prefix('product_dim')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\ProductDim\ProductDimController::class, 'index'])->name('product_dim');
    Route::post('post_data_product_dim', [\App\Http\Controllers\BackEnd\ProductDim\ProductDimController::class, 'post_data_product_dim'])->name('post_data_product_dim');
    Route::post('post_data_edit_product_dim', [\App\Http\Controllers\BackEnd\ProductDim\ProductDimController::class, 'post_data_edit_product_dim'])->name('post_data_edit_product_dim');
    Route::get('edit_product_dim', [\App\Http\Controllers\BackEnd\ProductDim\ProductDimController::class, 'edit_product_dim'])->name('edit_product_dim');
    Route::get('remove_product_dim', [\App\Http\Controllers\BackEnd\ProductDim\ProductDimController::class, 'remove_product_dim'])->name('remove_product_dim');
});

Route::middleware('auth')->prefix('product')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\Product\ProductController::class, 'index'])->name('product');
    Route::post('post_data_product', [\App\Http\Controllers\BackEnd\Product\ProductController::class, 'post_data_product'])->name('post_data_product');
    Route::post('post_data_edit_product', [\App\Http\Controllers\BackEnd\Product\ProductController::class, 'post_data_edit_product'])->name('post_data_edit_product');
    Route::get('edit_product', [\App\Http\Controllers\BackEnd\Product\ProductController::class, 'edit_product'])->name('edit_product');
    Route::get('remove_product', [\App\Http\Controllers\BackEnd\Product\ProductController::class, 'remove_product'])->name('remove_product');
    Route::get('change_product', [\App\Http\Controllers\BackEnd\Product\ProductController::class, 'change_product'])->name('change_product');
});

Route::middleware('auth')->prefix('product_accessories')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\ProductAccessories\ProductAccessoriesController::class, 'index'])->name('product_accessories');
    Route::post('post_data_product_accessories', [\App\Http\Controllers\BackEnd\ProductAccessories\ProductAccessoriesController::class, 'post_data_product_accessories'])->name('post_data_product_accessories');
    Route::post('post_data_edit_product_accessories', [\App\Http\Controllers\BackEnd\ProductAccessories\ProductAccessoriesController::class, 'post_data_edit_product_accessories'])->name('post_data_edit_product_accessories');
    Route::get('edit_product_accessories', [\App\Http\Controllers\BackEnd\ProductAccessories\ProductAccessoriesController::class, 'edit_product_accessories'])->name('edit_product_accessories');
    Route::get('remove_product_accessories', [\App\Http\Controllers\BackEnd\ProductAccessories\ProductAccessoriesController::class, 'remove_product_accessories'])->name('remove_product_accessories');
});

Route::middleware('auth')->prefix('color')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\Color\ColorController::class, 'index'])->name('color');
    Route::post('post_data_color', [\App\Http\Controllers\BackEnd\Color\ColorController::class, 'post_data_color'])->name('post_data_color');
    Route::post('post_data_edit_color', [\App\Http\Controllers\BackEnd\Color\ColorController::class, 'post_data_edit_color'])->name('post_data_edit_color');
    Route::get('edit_color', [\App\Http\Controllers\BackEnd\Color\ColorController::class, 'edit_color'])->name('edit_color');
    Route::get('remove_color', [\App\Http\Controllers\BackEnd\Color\ColorController::class, 'remove_color'])->name('remove_color');
});

Route::middleware('auth')->prefix('masterbach')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\Masterbach\MasterbachController::class, 'index'])->name('masterbach');
    Route::post('post_data_masterbach', [\App\Http\Controllers\BackEnd\Masterbach\MasterbachController::class, 'post_data_masterbach'])->name('post_data_masterbach');
    Route::post('post_data_edit_masterbach', [\App\Http\Controllers\BackEnd\Masterbach\MasterbachController::class, 'post_data_edit_masterbach'])->name('post_data_edit_masterbach');
    Route::get('edit_masterbach', [\App\Http\Controllers\BackEnd\Masterbach\MasterbachController::class, 'edit_masterbach'])->name('edit_masterbach');
    Route::get('remove_masterbach', [\App\Http\Controllers\BackEnd\Masterbach\MasterbachController::class, 'remove_masterbach'])->name('remove_masterbach');

});

Route::middleware('auth')->prefix('color_masterbatch')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\ColorMasterbatch\ColorMasterbatchController::class, 'index'])->name('color_masterbatch');
    Route::post('post_data_color_masterbatch', [\App\Http\Controllers\BackEnd\ColorMasterbatch\ColorMasterbatchController::class, 'post_data_color_masterbatch'])->name('post_data_color_masterbatch');
    Route::post('post_data_edit_color_masterbatch', [\App\Http\Controllers\BackEnd\ColorMasterbatch\ColorMasterbatchController::class, 'post_data_edit_color_masterbatch'])->name('post_data_edit_color_masterbatch');
    Route::get('edit_color_masterbatch', [\App\Http\Controllers\BackEnd\ColorMasterbatch\ColorMasterbatchController::class, 'edit_color_masterbatch'])->name('edit_color_masterbatch');
    Route::get('remove_color_masterbatch', [\App\Http\Controllers\BackEnd\ColorMasterbatch\ColorMasterbatchController::class, 'remove_color_masterbatch'])->name('remove_color_masterbatch');
    Route::get('change_color_masterbatch', [\App\Http\Controllers\BackEnd\ColorMasterbatch\ColorMasterbatchController::class, 'change_color_masterbatch'])->name('change_color_masterbatch');
});

Route::middleware('auth')->prefix('material')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\Material\MaterialController::class, 'index'])->name('material');
    Route::post('post_data_material', [\App\Http\Controllers\BackEnd\Material\MaterialController::class, 'post_data_material'])->name('post_data_material');
    Route::post('post_data_edit_material', [\App\Http\Controllers\BackEnd\Material\MaterialController::class, 'post_data_edit_material'])->name('post_data_edit_material');
    Route::get('edit_material', [\App\Http\Controllers\BackEnd\Material\MaterialController::class, 'edit_material'])->name('edit_material');
    Route::get('remove_material', [\App\Http\Controllers\BackEnd\Material\MaterialController::class, 'remove_material'])->name('remove_material');
});

Route::middleware('auth')->prefix('grade')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\Grade\GradeController::class, 'index'])->name('grade');
    Route::post('post_data_grade', [\App\Http\Controllers\BackEnd\Grade\GradeController::class, 'post_data_grade'])->name('post_data_grade');
    Route::post('post_data_edit_grade', [\App\Http\Controllers\BackEnd\Grade\GradeController::class, 'post_data_edit_grade'])->name('post_data_edit_grade');
    Route::get('edit_grade', [\App\Http\Controllers\BackEnd\Grade\GradeController::class, 'edit_grade'])->name('edit_grade');
    Route::get('remove_grade', [\App\Http\Controllers\BackEnd\Grade\GradeController::class, 'remove_grade'])->name('remove_grade');
});

Route::middleware('auth')->prefix('petrochemical')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\Petrochemical\PetrochemicalController::class, 'index'])->name('petrochemical');
    Route::post('post_data_petrochemical', [\App\Http\Controllers\BackEnd\Petrochemical\PetrochemicalController::class, 'post_data_petrochemical'])->name('post_data_petrochemical');
    Route::post('post_data_edit_petrochemical', [\App\Http\Controllers\BackEnd\Petrochemical\PetrochemicalController::class, 'post_data_edit_petrochemical'])->name('post_data_edit_petrochemical');
    Route::get('edit_petrochemical', [\App\Http\Controllers\BackEnd\Petrochemical\PetrochemicalController::class, 'edit_petrochemical'])->name('edit_petrochemical');
    Route::get('remove_petrochemical', [\App\Http\Controllers\BackEnd\Petrochemical\PetrochemicalController::class, 'remove_petrochemical'])->name('remove_petrochemical');
});

Route::middleware('auth')->prefix('quality_materials')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\QualityMaterials\QualityMaterialsController::class, 'index'])->name('quality_materials');
    Route::post('post_data_quality_materials', [\App\Http\Controllers\BackEnd\QualityMaterials\QualityMaterialsController::class, 'post_data_quality_materials'])->name('post_data_quality_materials');
    Route::post('post_data_edit_quality_materials', [\App\Http\Controllers\BackEnd\QualityMaterials\QualityMaterialsController::class, 'post_data_edit_quality_materials'])->name('post_data_edit_quality_materials');
    Route::get('edit_quality_materials', [\App\Http\Controllers\BackEnd\QualityMaterials\QualityMaterialsController::class, 'edit_quality_materials'])->name('edit_quality_materials');
    Route::get('remove_quality_materials', [\App\Http\Controllers\BackEnd\QualityMaterials\QualityMaterialsController::class, 'remove_quality_materials'])->name('remove_quality_materials');
});

Route::middleware('auth')->prefix('early_materials')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\EarlyMaterials\EarlyMaterialsController::class, 'index'])->name('early_materials');
    Route::post('post_data_early_materials', [\App\Http\Controllers\BackEnd\EarlyMaterials\EarlyMaterialsController::class, 'post_data_early_materials'])->name('post_data_early_materials');
    Route::post('post_data_edit_early_materials', [\App\Http\Controllers\BackEnd\EarlyMaterials\EarlyMaterialsController::class, 'post_data_edit_early_materials'])->name('post_data_edit_early_materials');
    Route::get('edit_early_materials', [\App\Http\Controllers\BackEnd\EarlyMaterials\EarlyMaterialsController::class, 'edit_early_materials'])->name('edit_early_materials');
    Route::get('remove_early_materials', [\App\Http\Controllers\BackEnd\EarlyMaterials\EarlyMaterialsController::class, 'remove_early_materials'])->name('remove_early_materials');
    Route::get('change_early_materials', [\App\Http\Controllers\BackEnd\EarlyMaterials\EarlyMaterialsController::class, 'change_early_materials'])->name('change_early_materials');
});

Route::middleware('auth')->prefix('essentials_packing_type')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\EssentialsPackingType\EssentialsPackingTypeController::class, 'index'])->name('essentials_packing_type');
    Route::post('post_data_essentials_packing_type', [\App\Http\Controllers\BackEnd\EssentialsPackingType\EssentialsPackingTypeController::class, 'post_data_essentials_packing_type'])->name('post_data_essentials_packing_type');
    Route::post('post_data_edit_essentials_packing_type', [\App\Http\Controllers\BackEnd\EssentialsPackingType\EssentialsPackingTypeController::class, 'post_data_edit_essentials_packing_type'])->name('post_data_edit_essentials_packing_type');
    Route::get('edit_essentials_packing_type', [\App\Http\Controllers\BackEnd\EssentialsPackingType\EssentialsPackingTypeController::class, 'edit_essentials_packing_type'])->name('edit_essentials_packing_type');
    Route::get('remove_essentials_packing_type', [\App\Http\Controllers\BackEnd\EssentialsPackingType\EssentialsPackingTypeController::class, 'remove_essentials_packing_type'])->name('remove_essentials_packing_type');
});

Route::middleware('auth')->prefix('essentials_packing')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\EssentialsPacking\EssentialsPackingController::class, 'index'])->name('essentials_packing');
    Route::post('post_data_essentials_packing', [\App\Http\Controllers\BackEnd\EssentialsPacking\EssentialsPackingController::class, 'post_data_essentials_packing'])->name('post_data_essentials_packing');
    Route::post('post_data_edit_essentials_packing', [\App\Http\Controllers\BackEnd\EssentialsPacking\EssentialsPackingController::class, 'post_data_edit_essentials_packing'])->name('post_data_edit_essentials_packing');
    Route::get('edit_essentials_packing', [\App\Http\Controllers\BackEnd\EssentialsPacking\EssentialsPackingController::class, 'edit_essentials_packing'])->name('edit_essentials_packing');
    Route::get('remove_essentials_packing', [\App\Http\Controllers\BackEnd\EssentialsPacking\EssentialsPackingController::class, 'remove_essentials_packing'])->name('remove_essentials_packing');
});

Route::middleware('auth')->prefix('essentials_dealers')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\EssentialsDealers\EssentialsDealersController::class, 'index'])->name('essentials_dealers');
    Route::post('post_data_essentials_dealers', [\App\Http\Controllers\BackEnd\EssentialsDealers\EssentialsDealersController::class, 'post_data_essentials_dealers'])->name('post_data_essentials_dealers');
    Route::post('post_data_edit_essentials_dealers', [\App\Http\Controllers\BackEnd\EssentialsDealers\EssentialsDealersController::class, 'post_data_edit_essentials_dealers'])->name('post_data_edit_essentials_dealers');
    Route::get('edit_essentials_dealers', [\App\Http\Controllers\BackEnd\EssentialsDealers\EssentialsDealersController::class, 'edit_essentials_dealers'])->name('edit_essentials_dealers');
    Route::get('remove_essentials_dealers', [\App\Http\Controllers\BackEnd\EssentialsDealers\EssentialsDealersController::class, 'remove_essentials_dealers'])->name('remove_essentials_dealers');
});

Route::middleware('auth')->prefix('product_packing')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\ProductPacking\ProductPackingController::class, 'index'])->name('product_packing');
    Route::post('post_data_product_packing', [\App\Http\Controllers\BackEnd\ProductPacking\ProductPackingController::class, 'post_data_product_packing'])->name('post_data_product_packing');
    Route::post('post_data_edit_product_packing', [\App\Http\Controllers\BackEnd\ProductPacking\ProductPackingController::class, 'post_data_edit_product_packing'])->name('post_data_edit_product_packing');
    Route::get('edit_product_packing', [\App\Http\Controllers\BackEnd\ProductPacking\ProductPackingController::class, 'edit_product_packing'])->name('edit_product_packing');
    Route::get('remove_product_packing', [\App\Http\Controllers\BackEnd\ProductPacking\ProductPackingController::class, 'remove_product_packing'])->name('remove_product_packing');
});

Route::middleware('auth')->prefix('customers')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\Customers\CustomersController::class, 'index'])->name('customers');
    Route::post('post_data_customers', [\App\Http\Controllers\BackEnd\Customers\CustomersController::class, 'post_data_customers'])->name('post_data_customers');
    Route::post('post_data_edit_customers', [\App\Http\Controllers\BackEnd\Customers\CustomersController::class, 'post_data_edit_customers'])->name('post_data_edit_customers');
    Route::get('edit_customers', [\App\Http\Controllers\BackEnd\Customers\CustomersController::class, 'edit_customers'])->name('edit_customers');
    Route::get('change_customers', [\App\Http\Controllers\BackEnd\Customers\CustomersController::class, 'change_customers'])->name('change_customers');
    Route::get('remove_customers', [\App\Http\Controllers\BackEnd\Customers\CustomersController::class, 'remove_customers'])->name('remove_customers');

});

Route::middleware('auth')->prefix('customers_brands')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\CustomersBrands\CustomersBrandsController::class, 'index'])->name('customers_brands');
    Route::post('post_data_customers_brands', [\App\Http\Controllers\BackEnd\CustomersBrands\CustomersBrandsController::class, 'post_data_customers_brands'])->name('post_data_customers_brands');
    Route::post('post_data_edit_customers_brands', [\App\Http\Controllers\BackEnd\CustomersBrands\CustomersBrandsController::class, 'post_data_edit_customers_brands'])->name('post_data_edit_customers_brands');
    Route::get('edit_customers_brands', [\App\Http\Controllers\BackEnd\CustomersBrands\CustomersBrandsController::class, 'edit_customers_brands'])->name('edit_customers_brands');
    Route::get('remove_customers_brands', [\App\Http\Controllers\BackEnd\CustomersBrands\CustomersBrandsController::class, 'remove_customers_brands'])->name('remove_customers_brands');
});

Route::middleware('auth')->prefix('customers_agent')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\CustomersAgent\CustomersAgentController::class, 'index'])->name('customers_agent');
    Route::post('post_data_customers_agent', [\App\Http\Controllers\BackEnd\CustomersAgent\CustomersAgentController::class, 'post_data_customers_agent'])->name('post_data_customers_agent');
    Route::post('post_data_edit_customers_agent', [\App\Http\Controllers\BackEnd\CustomersAgent\CustomersAgentController::class, 'post_data_edit_customers_agent'])->name('post_data_edit_customers_agent');
    Route::get('edit_customers_agent', [\App\Http\Controllers\BackEnd\CustomersAgent\CustomersAgentController::class, 'edit_customers_agent'])->name('edit_customers_agent');
    Route::get('remove_customers_agent', [\App\Http\Controllers\BackEnd\CustomersAgent\CustomersAgentController::class, 'remove_customers_agent'])->name('remove_customers_agent');
});

Route::middleware('auth')->prefix('industrial')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\Industrial\IndustrialController::class, 'index'])->name('industrial');
    Route::post('post_data_industrial', [\App\Http\Controllers\BackEnd\Industrial\IndustrialController::class, 'post_data_industrial'])->name('post_data_industrial');
    Route::post('post_data_edit_industrial', [\App\Http\Controllers\BackEnd\Industrial\IndustrialController::class, 'post_data_edit_industrial'])->name('post_data_edit_industrial');
    Route::get('edit_industrial', [\App\Http\Controllers\BackEnd\Industrial\IndustrialController::class, 'edit_industrial'])->name('edit_industrial');
    Route::get('remove_industrial', [\App\Http\Controllers\BackEnd\Industrial\IndustrialController::class, 'remove_industrial'])->name('remove_industrial');
});

Route::middleware('auth')->prefix('state_city')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\StateCity\StateCityController::class, 'index'])->name('state_city');
    Route::post('post_data_state_city', [\App\Http\Controllers\BackEnd\StateCity\StateCityController::class, 'post_data_state_city'])->name('post_data_state_city');
    Route::post('post_data_edit_state_city', [\App\Http\Controllers\BackEnd\StateCity\StateCityController::class, 'post_data_edit_state_city'])->name('post_data_edit_state_city');
    Route::get('edit_state_city', [\App\Http\Controllers\BackEnd\StateCity\StateCityController::class, 'edit_state_city'])->name('edit_state_city');
    Route::get('remove_state_city', [\App\Http\Controllers\BackEnd\StateCity\StateCityController::class, 'remove_state_city'])->name('remove_state_city');
});

Route::middleware('auth')->prefix('events_type')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\EventsType\EventsTypeController::class, 'index'])->name('events_type');
    Route::post('post_data_events_type', [\App\Http\Controllers\BackEnd\EventsType\EventsTypeController::class, 'post_data_events_type'])->name('post_data_events_type');
    Route::post('post_data_edit_events_type', [\App\Http\Controllers\BackEnd\EventsType\EventsTypeController::class, 'post_data_edit_events_type'])->name('post_data_edit_events_type');
    Route::get('edit_events_type', [\App\Http\Controllers\BackEnd\EventsType\EventsTypeController::class, 'edit_events_type'])->name('edit_events_type');
    Route::get('remove_events_type', [\App\Http\Controllers\BackEnd\EventsType\EventsTypeController::class, 'remove_events_type'])->name('remove_events_type');
});

Route::middleware('auth')->prefix('events_subject')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\EventsSubject\EventsSubjectController::class, 'index'])->name('events_subject');
    Route::post('post_data_events_subject', [\App\Http\Controllers\BackEnd\EventsSubject\EventsSubjectController::class, 'post_data_events_subject'])->name('post_data_events_subject');
    Route::post('post_data_edit_events_subject', [\App\Http\Controllers\BackEnd\EventsSubject\EventsSubjectController::class, 'post_data_edit_events_subject'])->name('post_data_edit_events_subject');
    Route::get('edit_events_subject', [\App\Http\Controllers\BackEnd\EventsSubject\EventsSubjectController::class, 'edit_events_subject'])->name('edit_events_subject');
    Route::get('remove_events_subject', [\App\Http\Controllers\BackEnd\EventsSubject\EventsSubjectController::class, 'remove_events_subject'])->name('remove_events_subject');
});

Route::middleware('auth')->prefix('events_result')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\EventsResult\EventsResultController::class, 'index'])->name('events_result');
    Route::post('post_data_events_result', [\App\Http\Controllers\BackEnd\EventsResult\EventsResultController::class, 'post_data_events_result'])->name('post_data_events_result');
    Route::post('post_data_edit_events_result', [\App\Http\Controllers\BackEnd\EventsResult\EventsResultController::class, 'post_data_edit_events_result'])->name('post_data_edit_events_result');
    Route::get('edit_events_result', [\App\Http\Controllers\BackEnd\EventsResult\EventsResultController::class, 'edit_events_result'])->name('edit_events_result');
    Route::get('remove_events_result', [\App\Http\Controllers\BackEnd\EventsResult\EventsResultController::class, 'remove_events_result'])->name('remove_events_result');
});

Route::middleware('auth')->prefix('events_result_reason')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\EventsResultReason\EventsResultReasonController::class, 'index'])->name('events_result_reason');
    Route::post('post_data_events_result_reason', [\App\Http\Controllers\BackEnd\EventsResultReason\EventsResultReasonController::class, 'post_data_events_result_reason'])->name('post_data_events_result_reason');
    Route::post('post_data_edit_events_result_reason', [\App\Http\Controllers\BackEnd\EventsResultReason\EventsResultReasonController::class, 'post_data_edit_events_result_reason'])->name('post_data_edit_events_result_reason');
    Route::get('edit_events_result_reason', [\App\Http\Controllers\BackEnd\EventsResultReason\EventsResultReasonController::class, 'edit_events_result_reason'])->name('edit_events_result_reason');
    Route::get('remove_events_result_reason', [\App\Http\Controllers\BackEnd\EventsResultReason\EventsResultReasonController::class, 'remove_events_result_reason'])->name('remove_events_result_reason');
});

Route::middleware('auth')->prefix('setting_company')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\SettingCompany\SettingCompanyController::class, 'index'])->name('setting_company');
    Route::post('post_data_setting_company', [\App\Http\Controllers\BackEnd\SettingCompany\SettingCompanyController::class, 'post_data_setting_company'])->name('post_data_setting_company');
    Route::post('post_data_edit_setting_company', [\App\Http\Controllers\BackEnd\SettingCompany\SettingCompanyController::class, 'post_data_edit_setting_company'])->name('post_data_edit_setting_company');
    Route::get('edit_setting_company', [\App\Http\Controllers\BackEnd\SettingCompany\SettingCompanyController::class, 'edit_setting_company'])->name('edit_setting_company');
    Route::get('remove_setting_company', [\App\Http\Controllers\BackEnd\SettingCompany\SettingCompanyController::class, 'remove_setting_company'])->name('remove_setting_company');
});

Route::middleware('auth')->prefix('setting_checkout')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\SettingCheckout\SettingCheckoutController::class, 'index'])->name('setting_checkout');
    Route::post('post_data_setting_checkout', [\App\Http\Controllers\BackEnd\SettingCheckout\SettingCheckoutController::class, 'post_data_setting_checkout'])->name('post_data_setting_checkout');
    Route::post('post_data_edit_setting_checkout', [\App\Http\Controllers\BackEnd\SettingCheckout\SettingCheckoutController::class, 'post_data_edit_setting_checkout'])->name('post_data_edit_setting_checkout');
    Route::get('edit_setting_checkout', [\App\Http\Controllers\BackEnd\SettingCheckout\SettingCheckoutController::class, 'edit_setting_checkout'])->name('edit_setting_checkout');
    Route::get('remove_setting_checkout', [\App\Http\Controllers\BackEnd\SettingCheckout\SettingCheckoutController::class, 'remove_setting_checkout'])->name('remove_setting_checkout');
});

Route::middleware('auth')->prefix('printing_house')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\PrintingHouse\PrintingHouseController::class, 'index'])->name('printing_house');
    Route::post('post_data_printing_house', [\App\Http\Controllers\BackEnd\PrintingHouse\PrintingHouseController::class, 'post_data_printing_house'])->name('post_data_printing_house');
    Route::post('post_data_edit_printing_house', [\App\Http\Controllers\BackEnd\PrintingHouse\PrintingHouseController::class, 'post_data_edit_printing_house'])->name('post_data_edit_printing_house');
    Route::get('edit_printing_house', [\App\Http\Controllers\BackEnd\PrintingHouse\PrintingHouseController::class, 'edit_printing_house'])->name('edit_printing_house');
    Route::get('remove_printing_house', [\App\Http\Controllers\BackEnd\PrintingHouse\PrintingHouseController::class, 'remove_printing_house'])->name('remove_printing_house');
});

Route::middleware('auth')->prefix('search_customer')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\SearchCustomer\SearchCustomerController::class, 'index'])->name('search_customer');
    Route::get('search_customer_index', [\App\Http\Controllers\BackEnd\SearchCustomer\SearchCustomerController::class, 'search_customer_index'])->name('search_customer_index');
    Route::get('customer_page/{id?}', [\App\Http\Controllers\BackEnd\SearchCustomer\SearchCustomerController::class, 'customer_page'])->name('customer_page');
    Route::post('events_customers_attach', [\App\Http\Controllers\BackEnd\SearchCustomer\SearchCustomerController::class, 'events_customers_attach'])->name('events_customers_attach');
    Route::post('events_customers_detail_attach', [\App\Http\Controllers\BackEnd\SearchCustomer\SearchCustomerController::class, 'events_customers_detail_attach'])->name('events_customers_detail_attach');
    Route::get('remove_events_customers', [\App\Http\Controllers\BackEnd\SearchCustomer\SearchCustomerController::class, 'remove_events_customers'])->name('remove_events_customers');
    Route::get('edit_events_customers', [\App\Http\Controllers\BackEnd\SearchCustomer\SearchCustomerController::class, 'edit_events_customers'])->name('edit_events_customers');
    Route::post('edit_events_customers_attach', [\App\Http\Controllers\BackEnd\SearchCustomer\SearchCustomerController::class, 'edit_events_customers_attach'])->name('edit_events_customers_attach');
    Route::post('edit_events_customers_attach_detail', [\App\Http\Controllers\BackEnd\SearchCustomer\SearchCustomerController::class, 'edit_events_customers_attach_detail'])->name('edit_events_customers_attach_detail');
    Route::get('see_customers_events_detail', [\App\Http\Controllers\BackEnd\SearchCustomer\SearchCustomerController::class, 'see_customers_events_detail'])->name('see_customers_events_detail');
    Route::get('remove_customers_events_detail', [\App\Http\Controllers\BackEnd\SearchCustomer\SearchCustomerController::class, 'remove_customers_events_detail'])->name('remove_customers_events_detail');
    Route::get('remove_events_customers_detail_attach_all', [\App\Http\Controllers\BackEnd\SearchCustomer\SearchCustomerController::class, 'remove_events_customers_detail_attach_all'])->name('remove_events_customers_detail_attach_all');
    Route::post('edit_events_customer_attach', [\App\Http\Controllers\BackEnd\SearchCustomer\SearchCustomerController::class, 'edit_events_customer_attach'])->name('edit_events_customer_attach');
    Route::post('post_data_edit_events_customer_attach', [\App\Http\Controllers\BackEnd\SearchCustomer\SearchCustomerController::class, 'post_data_edit_events_customer_attach'])->name('post_data_edit_events_customer_attach');

});

Route::middleware('auth')->prefix('reminder')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\Reminder\ReminderController::class, 'index'])->name('reminder');
    Route::post('post_data_reminder', [\App\Http\Controllers\BackEnd\Reminder\ReminderController::class, 'post_data_reminder'])->name('post_data_reminder');
    Route::get('remove_reminder', [\App\Http\Controllers\BackEnd\Reminder\ReminderController::class, 'remove_reminder'])->name('remove_reminder');
    Route::get('edit_reminder', [\App\Http\Controllers\BackEnd\Reminder\ReminderController::class, 'edit_reminder'])->name('edit_reminder');
    Route::post('post_edit_data_reminder', [\App\Http\Controllers\BackEnd\Reminder\ReminderController::class, 'post_edit_data_reminder'])->name('post_edit_data_reminder');

});

Route::middleware('auth')->prefix('events_customers')->group(function () {
    Route::get('/', 'EventsCustomersController@index');
    Route::post('post_data_events_customers', [\App\Http\Controllers\BackEnd\EventsCustomers\EventsCustomersController::class, 'post_data_events_customers'])->name('post_data_events_customers');
    Route::post('post_data_events_customers_detail', [\App\Http\Controllers\BackEnd\EventsCustomers\EventsCustomersController::class, 'post_data_events_customers_detail'])->name('post_data_events_customers_detail');
    Route::post('post_edit_events_customers', [\App\Http\Controllers\BackEnd\EventsCustomers\EventsCustomersController::class, 'post_edit_events_customers'])->name('post_edit_events_customers');
});

Route::middleware('auth')->prefix('stores_type')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\StoresType\StoresTypeController::class, 'index'])->name('stores_type');
    Route::post('post_data_stores_type', [\App\Http\Controllers\BackEnd\StoresType\StoresTypeController::class, 'post_data_stores_type'])->name('post_data_stores_type');
    Route::post('post_data_edit_stores_type', [\App\Http\Controllers\BackEnd\StoresType\StoresTypeController::class, 'post_data_edit_stores_type'])->name('post_data_edit_stores_type');
    Route::get('edit_stores_type', [\App\Http\Controllers\BackEnd\StoresType\StoresTypeController::class, 'edit_stores_type'])->name('edit_stores_type');
    Route::get('remove_stores_type', [\App\Http\Controllers\BackEnd\StoresType\StoresTypeController::class, 'remove_stores_type'])->name('remove_stores_type');
});

Route::middleware('auth')->prefix('stores')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\Stores\StoresController::class, 'index'])->name('stores');
    Route::post('post_data_stores', [\App\Http\Controllers\BackEnd\Stores\StoresController::class, 'post_data_stores'])->name('post_data_stores');
    Route::post('post_data_edit_stores', [\App\Http\Controllers\BackEnd\Stores\StoresController::class, 'post_data_edit_stores'])->name('post_data_edit_stores');
    Route::get('edit_stores', [\App\Http\Controllers\BackEnd\Stores\StoresController::class, 'edit_stores'])->name('edit_stores');
    Route::get('remove_stores', [\App\Http\Controllers\BackEnd\Stores\StoresController::class, 'remove_stores'])->name('remove_stores');
    Route::get('change_stores', [\App\Http\Controllers\BackEnd\Stores\StoresController::class, 'change_stores'])->name('change_stores');
});

Route::middleware('auth')->prefix('material_inventory_transaction_type')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\MaterialInventoryTransactionType\MaterialInventoryTransactionTypeController::class, 'index'])->name('material_inventory_transaction_type');
    Route::post('post_data_material_inventory_transaction_type', [\App\Http\Controllers\BackEnd\MaterialInventoryTransactionType\MaterialInventoryTransactionTypeController::class, 'post_data_material_inventory_transaction_type'])->name('post_data_material_inventory_transaction_type');
    Route::post('post_data_edit_material_inventory_transaction_type', [\App\Http\Controllers\BackEnd\MaterialInventoryTransactionType\MaterialInventoryTransactionTypeController::class, 'post_data_edit_material_inventory_transaction_type'])->name('post_data_edit_material_inventory_transaction_type');
    Route::get('edit_material_inventory_transaction_type', [\App\Http\Controllers\BackEnd\MaterialInventoryTransactionType\MaterialInventoryTransactionTypeController::class, 'edit_material_inventory_transaction_type'])->name('edit_material_inventory_transaction_type');
    Route::get('remove_material_inventory_transaction_type', [\App\Http\Controllers\BackEnd\MaterialInventoryTransactionType\MaterialInventoryTransactionTypeController::class, 'remove_material_inventory_transaction_type'])->name('remove_material_inventory_transaction_type');
});

Route::middleware('auth')->prefix('product_inventory_transaction_type')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\ProductInventoryTransactionType\ProductInventoryTransactionTypeController::class, 'index'])->name('product_inventory_transaction_type');
    Route::post('post_data_product_inventory_transaction_type', [\App\Http\Controllers\BackEnd\ProductInventoryTransactionType\ProductInventoryTransactionTypeController::class, 'post_data_product_inventory_transaction_type'])->name('post_data_product_inventory_transaction_type');
    Route::post('post_data_edit_product_inventory_transaction_type', [\App\Http\Controllers\BackEnd\ProductInventoryTransactionType\ProductInventoryTransactionTypeController::class, 'post_data_edit_product_inventory_transaction_type'])->name('post_data_edit_product_inventory_transaction_type');
    Route::get('edit_product_inventory_transaction_type', [\App\Http\Controllers\BackEnd\ProductInventoryTransactionType\ProductInventoryTransactionTypeController::class, 'edit_product_inventory_transaction_type'])->name('edit_product_inventory_transaction_type');
    Route::get('remove_product_inventory_transaction_type', [\App\Http\Controllers\BackEnd\ProductInventoryTransactionType\ProductInventoryTransactionTypeController::class, 'remove_product_inventory_transaction_type'])->name('remove_product_inventory_transaction_type');
});

Route::middleware('auth')->prefix('label_inventory_transaction_type')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\LabelInventoryTransactionType\LabelInventoryTransactionTypeController::class, 'index'])->name('label_inventory_transaction_type');
    Route::post('post_data_label_inventory_transaction_type', [\App\Http\Controllers\BackEnd\LabelInventoryTransactionType\LabelInventoryTransactionTypeController::class, 'post_data_label_inventory_transaction_type'])->name('post_data_label_inventory_transaction_type');
    Route::post('post_data_edit_label_inventory_transaction_type', [\App\Http\Controllers\BackEnd\LabelInventoryTransactionType\LabelInventoryTransactionTypeController::class, 'post_data_edit_label_inventory_transaction_type'])->name('post_data_edit_label_inventory_transaction_type');
    Route::get('edit_label_inventory_transaction_type', [\App\Http\Controllers\BackEnd\LabelInventoryTransactionType\LabelInventoryTransactionTypeController::class, 'edit_label_inventory_transaction_type'])->name('edit_label_inventory_transaction_type');
    Route::get('remove_label_inventory_transaction_type', [\App\Http\Controllers\BackEnd\LabelInventoryTransactionType\LabelInventoryTransactionTypeController::class, 'remove_label_inventory_transaction_type'])->name('remove_label_inventory_transaction_type');
});

Route::middleware('auth')->prefix('label_type')->group(function () {
    Route::get('/', [\App\Http\Controllers\BackEnd\LabelType\LabelTypeController::class, 'index'])->name('label_type');
    Route::post('post_data_label_type', [\App\Http\Controllers\BackEnd\LabelType\LabelTypeController::class, 'post_data_label_type'])->name('post_data_label_type');
    Route::post('post_data_edit_label_type', [\App\Http\Controllers\BackEnd\LabelType\LabelTypeController::class, 'post_data_edit_label_type'])->name('post_data_edit_label_type');
    Route::get('edit_label_type', [\App\Http\Controllers\BackEnd\LabelType\LabelTypeController::class, 'edit_label_type'])->name('edit_label_type');
    Route::get('remove_label_type', [\App\Http\Controllers\BackEnd\LabelType\LabelTypeController::class, 'remove_label_type'])->name('remove_label_type');
});







