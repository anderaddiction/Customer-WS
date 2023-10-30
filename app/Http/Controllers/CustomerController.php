<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Commun;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $commun   = Commun::where('id_com', $request->id_com)
            ->where('id_reg', $request->id_reg)
            ->with('region')
            ->first();

        if ($commun) {
            $customer = Customer::create($request->validated());
            return response()->json([
                "success"   =>  true,
                'message'   => 'Datos registrados exitosamente.',
                'customer'  => $customer
            ], 200);
        } else {
            return response()->json([
                "success" =>  false,
                'message' => 'Comunidades y regiones no están relacionadas. Verifíque e intente de nuevo.',
            ], 402);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($customer)
    {
        $data = Customer::where('dni', $customer)
            ->where('status', 'A')
            ->with(['commun', 'region'])
            ->first();

        if (!$data) {
            return response()->json([
                "success"   =>  false,
                'message'   => 'Datos no encontrado. Intente de nuevo'
            ], 401);
        } else {
            $client = [
                'name'      => $data->name,
                'last_name' => $data->last_name,
                'address'   => $data->address,
                'commune'   => $data->commun->description,
                'region'    => $data->region->description

            ];
            return response()->json([
                "success"   =>  true,
                'message'   => 'Datos registrados exitosamente.',
                'customer'  => $client
            ], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($customer)
    {

        $data = Customer::where('dni', $customer)
            ->with(['commun', 'region'])
            ->first();

        if (!$data) {
            return response()->json([
                "success"   =>  false,
                'message'   => 'Datos no encontrados. Intente de nevo'
            ], 401);
        } elseif ($data->status == 'trash') {
            return response()->json([
                "success"   =>  false,
                'message'   => 'Registro no existe'
            ], 402);
        } else {
            Customer::where('dni', $customer)
                ->with(['commun', 'region'])->update(['status' => 'trash']);
            return response()->json([
                "success"   =>  true,
                'message'   => 'Datos eliminados exitosamente.'
            ], 200);
        }
    }
}
