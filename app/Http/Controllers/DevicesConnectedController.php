<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DevicesConnected;

class DevicesConnectedController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'user_id' => 'required|unique:devices_connecteds',
            'token' => 'required',
        ]);

        $data = $request->json()->all();
        DevicesConnected::create([
            'user_id' => $data['user_id'],
            'token' => $data['token'],
        ]);
        return true;
    }

    public function show(Request $request){
        $request->validate([
            'user_id' => 'required',
            // 'token' => 'required',
        ]);

        $data = $request->json()->all();
        return !("[]" == json_encode(DevicesConnected::where('user_id', $data['user_id'])
            ->get()));
    }

    public function delete(Request $request){
        $request->validate([
            'user_id' => 'required',
            'token' => 'required',
        ]);
        $data = $request->json()->all();
        DevicesConnected::where('user_id', $data['user_id'])
            ->where('token', $data['token'])
            ->delete();
        return true;
    }
}
