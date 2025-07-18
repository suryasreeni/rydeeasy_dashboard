<?php

namespace App\Http\Controllers;

use App\Models\Fuel_Type;
use Illuminate\Http\Request;
use App\Models\VehicleStatus;
use App\Models\ServiceTask;
use App\Models\RenewalType;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use App\Models\Location;




use App\Models\Vehicle;


use App\Models\Type;
class SettingController extends Controller
{

    public function Setting()
    {

        $statuses = VehicleStatus::all(); // Fetch all statuses from the DB
        $types = Type::all();
        $servicetasks = ServiceTask::all();
        $vehicle_brand = VehicleBrand::all();
        $vehicle_model = VehicleModel::with('brand')->get();
        $renewaltypes = RenewalType::all();
        $fueltypes = Fuel_Type::all();

        return view('setting.setting', compact('statuses', 'types', 'servicetasks', 'renewaltypes', 'vehicle_brand', 'vehicle_model', 'fueltypes'));
    }
    public function storestatus(Request $request)
    {
        $request->validate([
            'status_name' => 'required|string|max:255',
            'status_color' => 'required|string|max:7',
        ]);

        VehicleStatus::create([
            'status_name' => $request->status_name,
            'status_color' => $request->status_color,
        ]);

        return redirect()->to(route('setting.setting') . '#vehicle_status')
            ->with('success', 'Status added successfully!');
    }
    public function updatestatus(Request $request, $id)
    {
        $request->validate([
            'status_name' => 'required|string|max:255',
            'status_color' => 'required|string|max:7',
        ]);

        $status = VehicleStatus::findOrFail($id);
        $status->update([
            'status_name' => $request->status_name,
            'status_color' => $request->status_color,
        ]);

        return redirect()->route('setting.setting')
            ->with('scrollTo', 'vehicle_status')
            ->with('success', 'Status updated successfully!');


    }

    public function destroystatus($id)
    {
        VehicleStatus::destroy($id);
        return redirect(route('setting.setting') . '#vehicle_status')->with('success', 'Status deleted successfully!');
    }



    public function storetype(Request $request)
    {
        $request->validate([
            'type_name' => 'required|string|unique:types,type_name',
        ]);

        Type::create([
            'type_name' => $request->type_name,
        ]);

        return redirect()->to(route('setting.setting') . '#vehicle_type')
            ->with('success', 'Vehicle type added successfully.');

    }
    public function updatetype(Request $request, $id)
    {
        $request->validate([
            'type_name' => 'required|string|max:255',

        ]);

        $type = Type::findOrFail($id);
        $type->update([
            'type_name' => $request->type_name,

        ]);

        return redirect()->route('setting.setting')
            ->with('scrollTo', 'vehicle_type')
            ->with('success', 'Type updated successfully!');


    }
    public function destroytype($id)
    {
        Type::destroy($id);
        return redirect(route('setting.setting') . '#vehicle_type')->with('success', 'Type deleted successfully!');
    }

    public function storeservicetask(Request $request)
    {
        $request->validate([
            'service_task_name' => 'required|string',
        ]);

        ServiceTask::create([
            'service_task_name' => $request->service_task_name,
        ]);

        return redirect()->to(route('setting.setting') . '#service_reminder_setting')
            ->with('success', 'Service Task added successfully.');

    }
    public function servicetaskupdate(Request $request, $id)
    {
        $request->validate([
            'service_task_name' => 'required|string|max:255',
        ]);

        $task = ServiceTask::findOrFail($id);
        $task->service_task_name = $request->service_task_name;
        $task->save();

        return redirect()->to(route('setting.setting') . '#service_reminder_setting')
            ->with('success', 'Service Task updated successfully.');
    }
    public function servicetaskdestroy($id)
    {
        ServiceTask::destroy($id);
        return redirect(route('setting.setting') . '#service_reminder_setting')->with('success', 'Service Task deleted successfully!');
    }

    public function storerenewaltype(Request $request)
    {
        $request->validate([
            'service_renewal_name' => 'required|string',
        ]);

        RenewalType::create([
            'service_renewal_name' => $request->service_renewal_name,
        ]);

        return redirect()->to(route('setting.setting') . '#vehicle_renewal_type')
            ->with('success', 'Service Renewal Type added successfully.');

    }
    public function updaterenewaltype(Request $request, $id)
    {
        $request->validate([
            'service_renewal_name' => 'required|string|max:255',
        ]);

        $type = RenewalType::findOrFail($id);
        $type->service_renewal_name = $request->service_renewal_name;
        $type->save();

        return redirect()->to(route('setting.setting') . '#vehicle_renewal_type')
            ->with('success', 'Service Renewal Type updated successfully.');
    }
    public function renewaltypedestroy($id)
    {
        RenewalType::destroy($id);
        return redirect(route('setting.setting') . '#vehicle_renewal_type')->with('success', 'Renewal Type deleted successfully!');
    }

    public function Storebrand(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|string|max:255|unique:vehicle_brands,brand_name',
        ]);

        VehicleBrand::create([
            'brand_name' => $request->brand_name,
        ]);

        return redirect()->to(route('setting.setting') . '#vehicle_brand')
            ->with('success', 'Vehicle brand added successfully.');
    }

    public function Destroybrand($id)
    {
        VehicleBrand::destroy($id);
        return redirect(route('setting.setting') . '#vehicle_brand')->with('success', 'Brand deleted successfully!');
    }

    public function storemodel(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|exists:vehicle_brands,id',
            'model_name' => 'required|string|max:255|unique:vehicle_models,model_name',
        ]);

        VehicleModel::create([
            'brand_id' => $request->brand_id,
            'model_name' => $request->model_name,
        ]);

        return redirect(route('setting.setting') . '#vehicle_model')->with('success', 'Model deleted successfully!');
    }

    public function Destroymodel($id)
    {
        VehicleModel::destroy($id);
        return redirect(route('setting.setting') . '#vehicle_model')->with('success', 'Model deleted successfully!');
    }


    public function storefueltype(Request $request)
    {
        $request->validate([
            'fuel_type' => 'required|string|max:255',
        ]);

        Fuel_Type::create([
            'fuel_type' => $request->fuel_type,
        ]);

        return redirect()->to(route('setting.setting') . '#fuel_type')
            ->with('success', 'Fuel Type added successfully.');
    }


    public function Destroyfueltype($id)
    {
        Fuel_Type::destroy($id);
        return redirect(route('setting.setting') . '#fuel')->with('success', 'Fuel Type deleted successfully!');
    }

    public function storelocation(Request $request)
    {
        $request->validate([
            'location_name' => 'required|string|max:255',
        ]);

        Location::create([
            'location_name' => $request->location_name,
        ]);

        return redirect()->to(route('setting.setting') . '#location')
            ->with('success', 'Fuel Location successfully.');
    }

}