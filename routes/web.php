<?php

use App\Models\Make;
use App\Models\Vehicle;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function() use ($app) {
    return $app->version();
});

$app->post('makes', function(Request $request) {
    $name = $request->input('name', '');
    if(!empty($name)) {
        $make = Make::create(['name'=>$name]);
        return response()->json($make, 201);
    }
    else
        return response('Bad query', 400);
});

$app->get('makes[/{id}]', function($id=null) {
    if($id)
        return response()->json(Make::findOrFail($id), 200);
    else
        return response()->json(['total_items'=>Make::all()->count(), 'items'=>Make::all()], 200);
});

$app->put('makes/{id}', function($id, Request $request) {
    $make = Make::findOrFail($id);
    $name = $request->input('name', '');
    if(!empty($name)) {
        $make->name = $name;
        $make->save();
        return response('', 204);
    }
    else
        return response('Bad query', 400);
});

$app->delete('makes/{id}', function($id) {
    $make = Make::findOrFail($id);
    $make->delete();
    return response('', 204);
});

$app->post('makes/{id}/models', function($id, Request $request) {
    $make = Make::findOrFail($id);
    $name = $request->input('name', '');
    if(!empty($name)) {
        $vehicle = new Vehicle();
        $vehicle->name = $name;
        $vehicle->make_id = $id;
        $vehicle->save();
        response()->json($vehicle, 201);
    }
    else
        return response('Bad query', 400);
});

$app->get('makes/{id}/models', function($id) {

    $make = Make::with('models')->findOrFail($id);
    return response()->json(['total_items'=> $make->count(), 'items' => $make], 200);
});

$app->get('vehicles', function() {
    return response()->json(['total_items' => Make::with('models')->count(), 'items' => Make::with('models')->get()], 200);
});