<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Category;
use App\Models\Apparatus;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApparatusController extends Controller
{
    // index page student list
    public function apparatus()
    {
        $apparatuses = Apparatus::all();

        return view('apparatus.apparatus',compact('apparatuses'));
    }

    // student add page
    public function apparatusAdd()
    {
        $apparatuses = Apparatus::all();
        $categories = Category::all();
        return view('apparatus.add-apparatus',['Apparatus' => $apparatuses , 'Categories' => $categories]);
    }

    // student add page
    public function apparatusSave(Request $request)
    {
        DB::beginTransaction();
        try {
            $apparatus = new Apparatus();
            $apparatus->categories_id = $request->category;
            $apparatus->name = $request->name;
            $apparatus->location = $request->location;
            $apparatus->qty = $request->qty;
            $apparatus->borrowed = 0;
            $apparatus->description = $request->description;
            $apparatus->status ='Available';


            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('apparatus', $image, $filename);
                $apparatus->image = $filename;
            }
            $apparatus->category()->attach($request->category);

            $apparatus->save();
            Toastr::success('Has been add successfully :)','Success');
            DB::commit();
            return redirect()->back();

        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('An error occurred: '.$e->getMessage(), 'Error');
            return redirect()->back();
        }
    }



}
