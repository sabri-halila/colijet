<?php

namespace App\Http\Controllers;

use App\Models\colis;
use App\Models\Aeroport;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class ColisController extends Controller
{
    protected $user;


    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coliss = $this->user->coliss()->orderBy('created_at', 'ASC')->paginate(4);
        $coliss->transform(function($aeroport_d){
            $aeroport_d->aeroport_d = Aeroport::findOrFail($aeroport_d->aeroport_d);
            return $aeroport_d;
        });
        $coliss->transform(function($aeroport_a){
            $aeroport_a->aeroport_a = Aeroport::findOrFail($aeroport_a->aeroport_a);
            return $aeroport_a;
        });
        return response()->json([
            'success' => true,
            'message' => 'successfully',
            'data' => $coliss
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate data
        $validator = Validator::make($request->all(), [
            'ville' => 'required|min:3',
            'aeroport_d' => 'required',
            'aeroport_a' => 'required',
            'date_heur_d' => 'required',
            'date_heur_a' => 'required',
            'nb_kg' => 'required',
            'prix_kg' => 'required',

        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new colis
        $colis = $this->user->coliss()->create([
            'ville' => $request->ville,
            'aeroport_d' => $request->aeroport_d,
            'aeroport_a' => $request->aeroport_a,
            'date_heur_d' => $request->date_heur_d,
            'date_heur_a' => $request->date_heur_a,
            'nb_kg' => $request->nb_kg,
            'prix_kg' => $request->prix_kg,
            'resistance' => json_encode($request->resistance),
            'autre_information' => $request->autre_information
        ]);

        //Colis created, return success response
        return response()->json([
            'success' => true,
            'message' => 'Colis created successfully',
            'data' => $colis
        ], Response::HTTP_OK);
    }





    /**
     * Display the specified resource.
     *
     * @param \App\Models\Colis $colis
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $colis = $this->user->coliss()->find($id);

        if (!$colis) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, not found.'
            ], 400);
        }

        return $colis;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Colis $colis
     * @return \Illuminate\Http\Response
     */
    public function edit(Colis $colis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Colis $colis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Colis $colis)
    {
        //Validate data
        $validator = Validator::make($request->all(), [
            'ville' => 'required',
            'aeroport_d' => 'required',
            'aeroport_a' => 'required',
            'date_heur_d' => 'required',
            'date_heur_a' => 'required',
            'nb_kg' => 'required',
            'prix_kg' => 'required',
            'resistance' => 'required',
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, update colis
        $colis = $colis->update([
            'ville' => $request->ville,
            'aeroport_d' => $request->aeroport_d,
            'aeroport_a' => $request->aeroport_a,
            'date_heur_d' => $request->date_heur_d,
            'date_heur_a' => $request->date_heur_a,
            'nb_kg' => $request->nb_kg,
            'prix_kg' => $request->prix_kg,
            'resistance' => $request->resistance,
            'autre_information' => $request->autre_information
        ]);

        //Colis updated, return success response
        return response()->json([
            'success' => true,
            'message' => 'Colis updated successfully',
            'data' => $colis
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Colis $colis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Colis $colis)
    {
        $colis->delete();

        return response()->json([
            'success' => true,
            'message' => 'Colis deleted successfully'
        ], Response::HTTP_OK);
    }

}
