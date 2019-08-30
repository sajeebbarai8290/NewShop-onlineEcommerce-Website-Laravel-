<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;

class ManufacturerController extends Controller
{
    public function index(){
        return view('admin.manufacturer.add-manufacturer');
    }
    
    public function saveManufacturerInfo(Request $request){
        
        $manufacturer = new Manufacturer();
        $this->validate($request,[
            'manufacturer_name'=>'required',
            'manufacturer_description'=>'required'
        ]);
        $manufacturer->manufacturer_name = $request->manufacturer_name;
        $manufacturer->manufacturer_description = $request->manufacturer_description;
        $manufacturer->publication_status = $request->publication_status;
        $manufacturer->save();
        return redirect('/manufacturer/add')->with('message','Manufacturer Info Save Successfully');
    }
    public function manageManufacturerInfo(){
        $manufacturers = Manufacturer::all();
        //return $manufacturers;
        return view('admin.manufacturer.manage-manufacturer',['manufacturers'=>$manufacturers]);
    }
    
    public function unpublishedManufacturerInfo($id){
        $manufacturerById = Manufacturer::find($id);
        $manufacturerById->publication_status=0;
        $manufacturerById->save();
        return redirect('/manufacturer/manage')->with('message','Manufacturer Info unpublished Successfully');
    }
    public function publishedManufacturerInfo($id){
        $manufacturerById = Manufacturer::find($id);
        $manufacturerById->publication_status=1;
        $manufacturerById->save();
        return redirect('/manufacturer/manage')->with('message','Manufacturer Info published Successfully');
    }
    public function editManufacturerInfo($id){
        $manufacture = Manufacturer::find($id);
        return view('admin.manufacturer.edit-manufacturer',['manufacture'=>$manufacture]);
    }
    public function updateManufacturerInfo(Request $request){
        $manufacturer = Manufacturer::find($request->manufacturer_id);
        $manufacturer->manufacturer_name = $request->manufacturer_name;
        $manufacturer->manufacturer_description = $request->manufacturer_description;
        $manufacturer->publication_status = $request->publication_status;
        $manufacturer->save();
        return redirect('/manufacturer/manage')->with('message','Manufacturer Info Update Successfully');
    }
    public function deleteManufacturerInfo($id){
        $manufacturer = Manufacturer::find($id);
        $manufacturer->delete();
        return redirect('/manufacturer/manage')->with('message','Manufacturer Info Delete Successfully');
        
    }
}
