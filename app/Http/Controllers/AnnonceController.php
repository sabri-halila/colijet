<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Aeroport;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;


class AnnonceController extends Controller
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
        $annonces = $this->user->annonces()->orderBy('created_at', 'ASC')->paginate(4);
        $annonces->transform(function($aeroport_d){
            $aeroport_d->aeroport_d = Aeroport::findOrFail($aeroport_d->aeroport_d);
            return $aeroport_d;
        });
        $annonces->transform(function($aeroport_a){
            $aeroport_a->aeroport_a = Aeroport::findOrFail($aeroport_a->aeroport_a);
            return $aeroport_a;
        });
        return response()->json([
            'success' => true,
            'message' => 'successfully',
            'data' => $annonces
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
            'ville' => 'required',
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

        //Request is valid, create new annonce
        $annonce = $this->user->annonces()->create([
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

        //Annonce created, return success response
        return response()->json([
            'success' => true,
            'message' => 'Annonce created successfully',
            'data' => $annonce
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Annonce $annonce
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $annonce = $this->user->annonces()->find($id);

        if (!$annonce) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, annonce not found.'
            ], 400);
        }

        return $annonce;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Annonce $annonce
     * @return \Illuminate\Http\Response
     */
    public function edit(Annonce $annonce)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Annonce $annonce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Annonce $annonce)
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

        //Request is valid, update annonce
        $annonce = $annonce->update([
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

        //Annonce updated, return success response
        return response()->json([
            'success' => true,
            'message' => 'Annonce updated successfully',
            'data' => $annonce
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Annonce $annonce
     * @return \Illuminate\Http\Response
     */
    public function destroy(Annonce $annonce)
    {
        $annonce->delete();

        return response()->json([
            'success' => true,
            'message' => 'Annonce deleted successfully'
        ], Response::HTTP_OK);
    }


}
