<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Auth; 

class ServiceRequestController extends Controller
{
    public function index()
    {
        $requests = ServiceRequest::all();
        return view('service_requests.index', compact('requests'));
    }

    public function create()
    {
        return view('service_requests.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'device' => 'required',
            'model' => 'required',
            'service_type' => 'required',
            'problem_description' => 'required',
            'payment_method' => 'required',
        ]);

        ServiceRequest::create([
            'device' => $request->device,
            'model' => $request->model,
            'service_type' => $request->service_type,
            'problem_description' => $request->problem_description,
            'payment_method' => $request->payment_method,
            'user_id' => Auth::id(), // Asigna el ID del usuario que registró la solicitud
        ]);
    
        return redirect()->route('service_requests.index')->with('success', 'Solicitud creada, pronto contactarán con usted.');
    }
    public function show($id)
    {
        $serviceRequest = ServiceRequest::findOrFail($id);

        return view('service_requests.show', compact('serviceRequest'));
    }

    public function edit($id)
    {
        $request = ServiceRequest::findOrFail($id);
        return view('service_requests.edit', compact('request'));
    }

    public function update(Request $request, ServiceRequest $serviceRequest)
{
    $request->validate([
        'device' => 'required',
        'model' => 'required',
        'service_type' => 'required',
        'problem_description' => 'required',
        'payment_method' => 'required',
    ]);

    $serviceRequest->update([
        'device' => $request->device,
        'model' => $request->model,
        'service_type' => $request->service_type,
        'problem_description' => $request->problem_description,
        'payment_method' => $request->payment_method,
    ]);

    return redirect()->route('service_requests.index')->with('success', 'Servicio actualizado.');
}
    public function destroy($id)
    {
        $request = ServiceRequest::findOrFail($id);
        $request->delete();

        return redirect()->route('service_requests.index');
    }
}
