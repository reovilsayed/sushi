<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Storage;

class SliderController extends Controller
{
    public function sliderList()
    {
        $sliders = Slider::latest()->get();
        return view('pages.slider.list', compact('sliders'));
    }
    public function sliderCreate()
    {
        return view('pages.slider.create');
    }
    public function sliderStore(Request $request)
    {

        $request->validate([
            'heading_ae' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $slider = new Slider;
        $slider->title = $request->title;
        $slider->heading = $request->heading;
        $slider->heading_end = $request->heading_end;
        
        $slider->title_ae = $request->title_ae;
        $slider->heading_ae = $request->heading_ae;
        $slider->heading_end_ae = $request->heading_end_ae;
        if ($request->hasFile('image')) {
            $slider->image = $request->file('image')->store('uploads', 'public');
        }
        // Save the new slider
        $slider->save();

        return redirect(route('slider.list'))->with('success', 'Slider has been successfully added');
    }
    public function sliderEdit(Slider $slider)
    {
        return view('pages.slider.edit', compact('slider'));
    }
    public function sliderUpdate(Request $request, Slider $slider)
    {
        $slider->title = $request->title;
        $slider->heading = $request->heading;
        $slider->heading_end = $request->heading_end;
        
        $slider->title_ae = $request->title_ae;
        $slider->heading_ae = $request->heading_ae;
        $slider->heading_end_ae = $request->heading_end_ae;
        if ($request->hasFile('image')) {
            if ($slider->image && Storage::exists($slider->image)) {
                Storage::delete($slider->image);
            }
            $slider->image = $request->file('image')->store('uploads', 'public');
        }
        $slider->save();
        return redirect(route('slider.list'))->with('success', 'Slider Has been successfully Updated');
    }
    public function sliderDelete(Slider $slider)
    {
        if ($slider->image && Storage::exists($slider->image)) {
            Storage::delete($slider->image);
        }
        $slider->delete();
        return redirect(route('slider.list'))->with('success', 'slider deleted');
    }
}
