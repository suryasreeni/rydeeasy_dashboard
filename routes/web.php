<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\InspectionController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\FuelController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\IntegrationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;





use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'loginpost'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerpost'])->name('register');
});

Route::group(['middleware' => 'auth'], function () {
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/due-assignments', [HomeController::class, 'fetchDueAssignments'])->name('assignments.due');

});

// vehicles
Route::get('/VehicleList', [VehicleController::class, 'VehicleList'])->name('vehicle.vehicle');
Route::get('/AddVehicle', [VehicleController::class, 'AddVehicle'])->name('vehicle.addvehicle');
Route::post('/vehicle/store', [VehicleController::class, 'vehiclestore'])->name('vehicle.store');
Route::get('/vehicle-detail/{id}', [VehicleController::class, 'showAjax']);
Route::post('/vehicle/update/{id}', [VehicleController::class, 'update'])->name('vehicle.update');
Route::put('/vehicle/{id}/status', [VehicleController::class, 'updateStatus'])->name('vehicle.updateStatus');

Route::delete('/vehicle/delete/{id}', [VehicleController::class, 'destroy'])->name('vehicle.destroy');


Route::get('/VehicleAssignment', [VehicleController::class, 'VehicleAssignment'])->name('list.assignment');
Route::get('/AddAssignment', [VehicleController::class, 'AddAssignment'])->name('add.assignment');
Route::post('/assignments/store', [VehicleController::class, 'storeAssignment'])->name('assignments.store');
Route::put('/assignment/{id}', [VehicleController::class, 'updateAssignment'])->name('assignment.update');
Route::put('/VehicleAssignment/{id}', [VehicleController::class, 'completionUpdate'])->name('completion.update');
Route::delete('/assignmentdestroy/{id}', [VehicleController::class, 'destroyassignment'])->name('assignment.destroy');

// routes/web.php
Route::get('/get-contact-info/{id}', [ContactController::class, 'getContactInfo']);



Route::get('/MeterHistory', [VehicleController::class, 'MeterHistory']);

Route::get('/ExpenseHistory', [VehicleController::class, 'ExpenseHistory']);
Route::get('/ReplacementAnalysis', [VehicleController::class, 'ReplacementAnalysis']);
// tools
Route::get('/Tool', [ToolController::class, 'Tool']);
Route::get('/AddTool', [ToolController::class, 'AddTool']);

// inspection
Route::get('/InspectionHistory', [InspectionController::class, 'InspectionHistory']);
Route::get('/ItemFailure', [InspectionController::class, 'ItemFailure']);
Route::get('/Schedule', [InspectionController::class, 'Schedule']);
Route::get('/Form', [InspectionController::class, 'Form']);
// issues
Route::get('/Issue', [IssueController::class, 'Issue']);
Route::get('/Fault', [IssueController::class, 'Fault']);
Route::get('/Recall', [IssueController::class, 'Recall']);
// Reminder
Route::get('/ServiceReminder', [ReminderController::class, 'ServiceReminder'])->name('list.servicereminder');
Route::get('/AddServiceReminder', [ReminderController::class, 'AddServiceReminder'])->name('add.servicereminder');
Route::post('/StoreServiceReminder', [ReminderController::class, 'StoreServiceReminder'])->name('store.servicereminder');
Route::put('/UpdateServiceReminder/{id}', [ReminderController::class, 'UpdateServiceReminder'])->name('update.servicereminder');
Route::put('/DestroyServiceReminder/{id}', [ReminderController::class, 'DestroyServiceReminder'])->name('destroy.servicereminder');




Route::get('/VehicleRenewal', [ReminderController::class, 'VehicleRenewal']);
Route::get('/ContactRenewal', [ReminderController::class, 'ContactRenewal']);
// service
Route::get('/Service', [ServiceController::class, 'Service'])->name('service.list');
Route::get('/AddService', [ServiceController::class, 'AddService'])->name('service.add');
Route::post('/StoreService', [ServiceController::class, 'StoreService'])->name('service.store');
Route::put('/UpdateService/{id}', [ServiceController::class, 'UpdateService'])->name('service.update');
Route::post('/DeleteService/{id}', [ServiceController::class, 'DeleteService'])->name('service.delete');




// contact
Route::get('/Contact', [ContactController::class, 'Contact'])->name('contact.contact');
Route::get('/AddContact', [ContactController::class, 'AddContact'])->name('contact.addcontact');
Route::post('/PostContact', [ContactController::class, 'PostContact'])->name('contact.post');
Route::get('/contact-detail/{id}', [ContactController::class, 'showAjax']);
Route::post('/contacts/{id}', [ContactController::class, 'update'])->name('contact.update');
Route::post('/contact-delete/{id}', [ContactController::class, 'destroy'])->name('contact.delete');



// vendors
Route::get('/Vendor', action: [VendorController::class, 'Vendor'])->name('vendor.vendor');
Route::get('/AddVendor', action: [VendorController::class, 'AddVendor'])->name('vendor.add');
Route::post('/PostVendor', [VendorController::class, 'postVendor'])->name('vendor.post');
Route::post('/vendor/update/{id}', [VendorController::class, 'update'])->name('vendor.update');
Route::delete('/vendor/{id}', [VendorController::class, 'destroy'])->name('vendor.destroy');




// Fuel and Energy
Route::get('/FuelHistory', action: [FuelController::class, 'FuelHistory'])->name('fuel.fuelhistory');
Route::get('/AddFuelHistory', action: [FuelController::class, 'AddFuelHistory'])->name('fuel.addfuelhistory');

Route::get('/ChargingHistory', action: [FuelController::class, 'ChargingHistory'])->name('fuel.charginghistory');
;
Route::get('/AddChargingHistory', action: [FuelController::class, 'AddChargingHistory'])->name('fuel.addcharginghistory');
;

// parts
Route::get('/Part', action: [PartController::class, 'Part']);
Route::get('/AddPart', action: [PartController::class, 'AddPart']);

// places
Route::get('/Place', action: [PlaceController::class, 'Place'])->name('place.place');
Route::get('/AddPlace', action: [PlaceController::class, 'AddPlace'])->name('place.addplace');

// documents
Route::get(uri: '/Document', action: [DocumentController::class, 'Document']);
// integration
Route::get(uri: '/Integration', action: [IntegrationController::class, 'Integration']);
// report
Route::get(uri: '/Report', action: [ReportController::class, 'Report']);
// setting
Route::get(uri: '/Setting', action: [SettingController::class, 'Setting'])->name('setting.setting');
Route::post('/vehicle-status', [SettingController::class, 'storestatus'])->name('vehicle-status.store');
Route::put('/statuses/{id}', [SettingController::class, 'updatestatus'])->name('statuses.update');
Route::delete('/statuses/{id}', [SettingController::class, 'destroystatus'])->name('statuses.destroy');
Route::post(uri: 'Setting/storetype', action: [SettingController::class, 'storetype'])->name('type.store');
Route::put(uri: '/updatetype/{id}', action: [SettingController::class, 'updatetype'])->name('type.update');
Route::delete('Setting/destroytype/{id}', [SettingController::class, 'destroytype'])->name('type.destroy');

Route::post(uri: '/Setting/storeservicetask', action: [SettingController::class, 'storeservicetask'])->name('servicetask.store');
Route::put('/Setting/service-tasks/{id}', [SettingController::class, 'servicetaskupdate'])->name('service-tasks.update');
Route::delete('/destroyservicetask/{id}', [SettingController::class, 'servicetaskdestroy'])->name('servicetask.destroy');

Route::post(uri: '/Setting/storerenewaltype', action: [SettingController::class, 'storerenewaltype'])->name('renewaltype.store');
Route::put('/Setting/updaterenewaltype/{id}', [SettingController::class, 'updaterenewaltype'])->name('renewaltype.update');
Route::delete('Setting/destroyrenewaltype/{id}', [SettingController::class, 'renewaltypedestroy'])->name('renewaltype.destroy');

Route::get(uri: '/Setting/storebrand', action: [SettingController::class, 'storebrand'])->name('brand.store');
Route::delete('Setting/destroybrand/{id}', [SettingController::class, 'Destroybrand'])->name('brand.destroy');

Route::post(uri: '/Setting/storemodel', action: [SettingController::class, 'storemodel'])->name('model.store');
Route::get('/vehicle/models/fetch', [VehicleController::class, 'fetchModels'])->name('vehicle.models.fetch');
Route::delete('Setting/destroymodel/{id}', [SettingController::class, 'Destroymodel'])->name('model.destroy');


Route::get(uri: '/Setting/storefueltype', action: [SettingController::class, 'storefueltype'])->name('fueltype.store');
Route::delete('Setting/destroyfueltype/{id}', [SettingController::class, 'Destroyfueltype'])->name('fueltype.destroy');

Route::post(uri: '/Setting/storelocation', action: [SettingController::class, 'storelocation'])->name('location.store');
Route::get('/check-vin', function (\Illuminate\Http\Request $request) {
    $exists = \App\Models\Vehicle::where('vin', $request->vin)->exists();
    return response()->json(['exists' => $exists]);
});