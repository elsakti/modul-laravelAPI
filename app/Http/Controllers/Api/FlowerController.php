<?php

namespace App\Http\Controllers\Api;
    
use App\Http\Controllers\Controller;
use App\Models\Flower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FlowerController extends Controller
{
    public function index()
    {
        $dataFlowers = Flower::all(['id', 'name', 'color']);
        return response()->json(['dataJSON' => $dataFlowers], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'color' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 422);
        }

        $newFlower = Flower::create($request->all());
        return response()->json(['dataJSON' => $newFlower], 201);
    }

    public function show($id)
    {
        $eachFlower = Flower::find($id);
        if (!$eachFlower) {
            return response()->json(['error' => 'Not Found'], 404);
        }
        return response()->json(['dataJSON' => $eachFlower], 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'color' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 422);
        }

        $eachFlower = Flower::find($id);
        if (!$eachFlower) {
            return response()->json(['error' => 'Not Found'], 404);
        }

        $eachFlower->update($request->all());
        return response()->json(['dataJSON' => $eachFlower], 200);
    }

    public function destroy($id)
    {
        $eachFlower = Flower::find($id);
        if (!$eachFlower) {
            return response()->json(['error' => 'Not Found'], 404);
        }
        $eachFlower->delete();
        return response()->json(['message' => 'Deleted'], 200);
    }


}
