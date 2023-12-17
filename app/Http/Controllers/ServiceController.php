<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ServiceRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as AddService;



class ServiceController extends Controller
{
    public function showService($employeeId){
        $admin = employee::find($employeeId);
        $service = DB::table('service')->get();
        return view('service', ['employeeId' => $employeeId], compact('admin', 'service'));
    }
    
    public function showaddserviceform($employeeId)
    {
        $admin = employee::find($employeeId);
        return view('addservice', ['employeeId' => $employeeId], compact('admin'));
    }


    // Tambah service
    public function store(Request $request, $employeeId)
    {
        $validator = Validator::make($request->all(), [
            'svc_name' => 'required',
            'svc_priceperkilo' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            $data = $validator->validated();
    
            $existingService = service::where('svc_name', $data['svc_name'])->first();
            if ($existingService) {
                return redirect()->back()->withInput()->withErrors(['svc_name' => 'The service already exists. Please create a different service.']);
            }            
    
            $maxId = service::max('svc_id');
            $newsvcId = $maxId + 1;
    
            service::create([
                'svc_id' => DB::raw("($newsvcId + (SELECT COUNT(*) FROM service WHERE svc_id >= $newsvcId))"),
                'svc_name' => $data['svc_name'],
                'svc_priceperkilo' => $data['svc_priceperkilo'],
            ]);
    
            // print("Service added");
            
            return redirect()->route('admin.service', ['employeeId' => $employeeId]);
    
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // Tampilkan service
    public function show($id)
    {
        $serviceController = new ServiceController();
        $serviceController->show(1);

        $service = Service::find($id);
        if ($service) {
            return view('service', compact('service'));
        } else {
            return redirect()->back()->withErrors(['service_not_found' => 'Service not found.']);
        }
    }

    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }


    // Menghapus service
    public function deleteService($id)
    {
        try {
            $service = Service::find($id);
    
            if ($service) {
                $service->delete();
                print("Service deleted");
            } else {
                print("Service not found");
            }
    
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    // Created at status
    public function updateTimestamps(){
        $services = service::all();

        foreach($services as $service){
            $service->update([
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        return "Timestamps updated for all employees.";    
    }
}
