<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE App\Models\Timestamps;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class TimestampsController extends Controller
{   
    public function store(Request $request){
        $request->validate([
            'user_id' => [
                'required',
                Rule::unique('timestamps')->where(function ($query) use ($request) {
                    return $query
                        ->whereUserId($request->user_id)
                        ->whereContentId($request->content_id);
                }),
            ],
            // 'user_id' => 'required',
            'content_id' => 'required',
            'time' => 'required|integer',
        ], ['user_id.unique' => 'The timestamp already exist, maybe with different time.'],);

        $data = $request->json()->all();
        Timestamps::create([
            'user_id' => $data['user_id'],
            'content_id' => $data['content_id'],
            'time' => $data['time'],
        ]);
        return true;
    }

    public function update(Request $request){
        $request->validate([
            'user_id' => 'required',
            'content_id' => 'required',
            'time' => 'required|integer',
        ]);

        $data = $request->json()->all();
        Timestamps::where('user_id', $data['user_id'])
            ->where('content_id', $data['content_id'])
            ->update([
                'time' => $data['time'],
        ]);
        return true;
    }

    public function show(Request $request){
        $request->validate([
            'user_id' => 'required',
            'content_id' => 'required',
        ]);

        $data = $request->json()->all();
        return json_encode(Timestamps::where('user_id', $data['user_id'])
            ->where('content_id', $data['content_id'])
            ->get('time')
        );
    }

    public function delete(Request $request){
        $request->validate([
            'user_id' => 'required',
            'content_id' => 'required',
        ]);
        $data = $request->json()->all();
        Timestamps::where('user_id', $data['user_id'])
            ->where('content_id', $data['content_id'])
            ->delete();
        return true;
    }
}
