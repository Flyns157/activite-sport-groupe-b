<?php
namespace App\Http\Controllers\Api;

use App\Http\Requests\SalleRequest;
use App\Http\Resources\SalleResource;
use App\Http\Resources\SalleCollection;
use App\Models\Salle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    public function index()
    {
        return new SalleCollection(Salle::all());
    }

    public function store(SalleRequest $request)
    {
        $salle = Salle::create($request->validated());
        return new SalleResource($salle);
    }

    public function show(Salle $salle)
    {
        return new SalleResource($salle);
    }

    public function update(SalleRequest $request, Salle $salle)
    {
        $salle->update($request->validated());
        return new SalleResource($salle);
    }

    public function destroy(Salle $salle)
    {
        $salle->delete();
        return response()->noContent();
    }
}
