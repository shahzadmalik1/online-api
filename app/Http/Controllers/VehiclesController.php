<?php

namespace App\Http\Controllers;

use App\Models\Vehicles\Vehicles;
use Exception;
use Illuminate\Http\Request;

class VehiclesController extends Controller
{
    public function get()
    {
        try{
            $vehicles = Vehicles::get()->toArray();
            return apiResponse('Vehicles loaded successfully',$vehicles);

        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
   
    public function create(Request $request)
   {
        $input = $request->json()->all();
        try{
            Vehicles::create([
                'name'      =>  $input['vehicle_name'],
                'type'      =>  $input['type'],
                'model'     =>  $input['model'],
                'company'   =>  $input['company'],
                'color'     =>  $input['color'],
                'description'=>  $input['description'],
            ]);
            return apiResponse('Vehicle added successfully');
        }
        catch(Exception $e){
            return $e->getMessage();
        }
   }

   public function update(Request $request, $id)
   {
        $input = $request->json()->all();
        try{
            $vehicle = Vehicles::where('name',$input['vehicle_name'])->where('id',"!=",$id);
            if( $vehicle->exists()){
                return apiResponse('Vehicle already exist');
            }
            Vehicles::where('id',$id)->update([
                'name'      =>  $input['vehicle_name'],
                'type'      =>  $input['type'],
                'model'     =>  $input['model'],
                'company'   =>  $input['company'],
                'color'     =>  $input['color'],
                'description'=>  isset($input['description']) ? $input['description']: "",
            ]);
            return apiResponse('Vehicle added successfully');
        }
        catch(Exception $e){
            return $e->getMessage();
        }
        
        
   }
}
