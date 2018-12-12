<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Package;
use Validator;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Create user and save in database
        /*
        $User = new User();
        $User->name = 'Kevin';
        $User->email = 'kevramos95@gmail.com';
        $User->password ='12345678';
        $User->save();
        */
        
        //Find a user specified - Encontrar usuario especifico.
        // $user = User::find(1);
    
   
        //Create package with properties
        /*$package = new Package();
        $package->type_service = 'Cargo';
        $package->client_id = 1;
        $package->consigned_dni = '77167125';
        $package->consigned_name = 'Juan Carlos';
        $package->office_origin = 'Lima';
        $package->office_destination = 'Chiclayo';
        $package->type_pay = 'Cancelado';
        $package->price = '9.00'; //change type to double
        $package->user_id = 1;
        */
        
        //Save package relationship with user especified.
        //$user->packages()->save($package); 
        
        //Other example - Inverse -> busca este post con que user se relaciona belogsTo()
        /*$package = Package::find(1);
        $package->user;
        dd($package->user);*/
        
        //todas las encomiendas
        $package = Package::with('user')->get();
        
        
        return view('package.index',['package'=>$package]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
           'type_service' => 'required',
            'client_id' => 'required'
        ]);
        
        if($validator->fails()){
            return redirect('package/create')
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::find(1);
        
        $package = new Package();
        $package->type_service = $request->input('type_service');
        $package->client_id = $request->input('client_id');
        $package->consigned_dni = $request->input('consigned_dni');
        $package->consigned_name = $request->input('consigned_name');
        $package->office_origin = $request->input('office_origin');
        $package->office_destination = $request->input('office_destination');
        $package->type_pay = $request->input('type_pay');
        $package->price = $request->input('price'); //change type to double
        $package->user_id = $user->id;
        $package->save();
        
        return redirect('package/show/'.$package->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $package = Package::find($id);
        
        return view('package.show',['package' => $package]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $package = Package::findOrFail($id);
        return view('package.edit',['package' => $package]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find(1);
        
        $package = Package::findOrFail($id);
        $package->type_service = $request->input('type_service');
        $package->client_id = $request->input('client_id');
        $package->consigned_dni = $request->input('consigned_dni');
        $package->consigned_name = $request->input('consigned_name');
        $package->office_origin = $request->input('office_origin');
        $package->office_destination = $request->input('office_destination');
        $package->type_pay = $request->input('type_pay');
        $package->price = $request->input('price'); //change type to double
        $package->user_id = $user->id;
        $package->save();
        
        return redirect('package/index')->with('success', 'Stock has been updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = Package::find($id);
        $package->delete();

        return redirect('package/index')->with('success', 'Stock has been deleted Successfully');
    }
}
