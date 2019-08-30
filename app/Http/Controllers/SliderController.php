<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    public function index(){
        return view('admin.slider.add-slider');
    }
    public function imageUpload($request){
        $sliderImage = $request->file('slider_image');
        $fileType   =   $sliderImage->getClientOriginalExtension();
        $imageName  =   $request->title.'.'.$fileType;
        $directory = 'product-images/';
        $imageUrl   =   $directory.$imageName;
        Image::make($sliderImage)->save($imageUrl);
        return $imageUrl;
    }
    public function imageValidate($request){
        $this->validate($request, [
            'title'=>'required|max:225',
            'slider_image'=>'required|image',
        ]);
    }
    public function saveSlider(Request $request){
        $this->imageValidate($request);
        $imageUrl = $this->imageUpload($request);
        $slider =   new Slider();
        $slider->title  =   $request->title;
        $slider->slider_image  =   $imageUrl;
        $slider->publication_status  =   $request->publication_status;
        $slider->save();
        return redirect('/add-slider')->with('message','Slider Info Save Successfully');
    }
    public function manageSlider(){
        $sliders = Slider::orderby('id', 'desc')->paginate(5);
        return view('admin.slider.manage-slider',['sliders'=>$sliders]);
    }
    public function editSlider($id){
        $slider =   Slider::find($id);
        return view('admin.slider.edit-slider',['slider'=>$slider]);
    }

    public function slidertBasicInfoUpdate($slider,$request,$imageUrl=null ){
        $slider->title = $request->title;
        if($imageUrl){
            $slider->slider_image = $imageUrl;
        }
        $slider->publication_status = $request->publication_status;
        $slider->save();
    }
    public function updateSlider(Request $request){
        $sliderImage    =   $request->file('slider_image');
        $slider         =   Slider::find($request->id);
        if($sliderImage){
            unlink($slider->slider_image);
            $imageUrl = $this->imageUpload($request);
            $this->slidertBasicInfoUpdate($slider,$request,$imageUrl);
        }else{
            $this->slidertBasicInfoUpdate($slider, $request);
        }
        return redirect('/manage-slider')->with('message','Slider Info Updated Successfully');

    }
    public function unpublishedSlider($id){
        $slider = Slider::find($id);
        $slider->publication_status = 0;
        $slider->save();
        return redirect('/manage-slider')->with('message','unpublished successfully');
    }
    public function publishedSlider($id){
        $slider = Slider::find($id);
        $slider->publication_status = 1;
        $slider->save();
        return redirect('/manage-slider')->with('message','published successfully');
    }
}
