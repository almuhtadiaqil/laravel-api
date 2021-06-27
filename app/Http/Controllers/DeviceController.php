<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
{
    function list($id = null)
    {
        return $id ? Device::find($id) : [
            'device' => Device::all()
        ];
    }

    function add(Request $request)
    {
        $rules = [
            'member_id' => 'required|min:2|max:4'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {
            $result = Device::create([
                'name' => $request->name,
                'member_id' => $request->member_id
            ]);
            if ($result) {
                return ['Result' => 'Data has been saved'];
            } else {
                return ['Result' => 'Operation failed'];
            }
        }
    }

    function update(Request $req)
    {
        Device::where('id', $req->id)->update([
            'name' => $req->name,
            'member_id' => $req->member_id
        ]);
        return ["result" => "data is updated"];
    }

    function search($name = null)
    {
        return $name ? Device::where("name", "like", "%" . $name . "%")->get() : [Device::all()];
    }

    function delete($id)
    {
        Device::find($id)->delete();
        return ['result' => 'Data has been deleted'];
    }
}
