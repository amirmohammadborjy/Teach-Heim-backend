<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactusValidation;
use App\Http\Resources\ContactusResource;
use App\Models\Contactus;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    //

    public function store(ContactusValidation $contactusValidation){

        $Contactus=Contactus::create($contactusValidation->toArray());
        return response()->json(['data'=>new ContactusResource($Contactus),'messages'=>'success'],200);
    }
    public function show($id)
    {
        $Contactus=Contactus::find($id);
        if(!$Contactus){
            return response()->json(['error'=>'Contactus not found']);
        }
        return response()->json($Contactus);
    }
    public function index()
    {
        $Contactus = Contactus::all();
        return response()->json($Contactus);
    }

    public function destroy($id){
        $Contactus=Contactus::find($id);
        if(!$Contactus){
            return response()->json(['error'=>'Contactus not found']);
        }
        $Contactus->delete();
        return response()->json(['success'=>'You have successfully delete Contactus.']);
    }
}
