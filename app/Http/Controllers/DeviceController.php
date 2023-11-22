<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class DeviceController extends Controller
{
    const PATH_VIEW = 'devices.';
    const PATH_UPLOAD = 'devices';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Device::query()->latest()->paginate(5);
        return view(self::PATH_VIEW.__FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view(self::PATH_VIEW.__FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       $request->validate([
        'name' =>'required',
        'serial' =>'required|max:255|unique:devices|',
        'img' =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'model' =>'required',
        'is_active' => [
            'required',
            Rule::in([
                Device::isactive,
                Device::is_active,
                ])
            ],

            'describe' =>'required',
       ]);
        $data = $request->except('img');
        if ($request->hasFile('img')) {
            $data['img'] = Storage::put(self::PATH_UPLOAD,$request->file('img'));
        }
        Device::query()->create($data);
        return back()->with('msg','thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Device $device)
    {
        //
        return view(self::PATH_VIEW.__FUNCTION__, compact('device'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Device $device)
    {
        //
        return view(self::PATH_VIEW.__FUNCTION__, compact('device'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Device $device)
    {
        //
        $data = $request->except('img');
        if ($request->hasFile('img')) {
            $data['img'] = Storage::put(self::PATH_UPLOAD,$request->file('img'));
        }
        $old = $device->img;

        $device->update($data);

        if($request->hasFile('img') && Storage::exists('img')) {
            Storage::delete($old);
        }
        return back()->with('msg','sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Device $device)
    {
        //
        $device->delete();
        if(Storage::exists('img')){
            Storage::delete('img');
        }
        return back()->with('msg','xóa thành công');
    }
}
