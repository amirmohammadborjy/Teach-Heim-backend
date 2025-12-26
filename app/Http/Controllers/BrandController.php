<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandValidation;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    //

    public function store(BrandValidation $brandValidation){


        $brand=Brand::create($brandValidation->except('logoURL'));
        $logoURL=Storage::putFile('/brand',$brandValidation->logoURL);
        $brand->update(['logoURL'=>$logoURL]);
        return response()->json(['data'=>new BrandResource($brand)]);
    }
    public function show($id)
    {
        $brand=Brand::find($id);
        if(!$brand){
            return response()->json(['error'=>'brand not found']);
        }
        return response()->json($brand);

    }
    public function index()
    {
        $brand=Brand::all();
        return response()->json($brand);
    }



    public function update(BrandValidation $brandValidation,$id){

        $brand=Brand::find($id);
        if(!$brand){
            return response()->json(['error'=>'brand not found']);
        }
        $brand->update($brandValidation->all());
        return response()->json(['success'=>'Data updated successfully.']);
    }
    public function destroy($id){
        $brand=Brand::find($id);
        if(!$brand){
            return response()->json(['error'=>'brand not found'],404);
        }
        $brand->delete();
        return response()->json(['success'=>'Data deleted successfully.']);
    }
}
