<?php

namespace App\Http\Controllers;

use App\Models\Aeroport;
use App\Models\Annonce;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Liste extends Controller
{
    public function getanonces()
    {
        $annonces = Annonce::orderBy('created_at', 'ASC')->paginate(4);
        //paginate(5)->orderBy('created_at','desc');
        $annonces->transform(function($aeroport_d){
            $aeroport_d->aeroport_d = Aeroport::findOrFail($aeroport_d->aeroport_d);
            return $aeroport_d;
        });
        $annonces->transform(function($aeroport_a){
            $aeroport_a->aeroport_a = Aeroport::findOrFail($aeroport_a->aeroport_a);
            return $aeroport_a;
        });
        $annonces->transform(function($user){
            $user->creator = User::findOrFail($user->user_id);
            return $user;
        });

        return response()->json(['status' => 'success', 'data' => $annonces]);
    }


    public function show($id)
    {
        $annonce = Annonce::find($id);
        $aeroport_d = Aeroport::findOrFail($annonce->aeroport_d);
        $aeroport_a= Aeroport::findOrFail($annonce->aeroport_a);
        $creator = User::findOrFail($annonce->user_id);
        $annonce->user = $creator;
        $annonce->aeroport_d = $aeroport_d;
        $annonce->aeroport_a = $aeroport_a;


        if (!$annonce) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, annonce not found.'
            ], 400);
        }
        return response()->json(['status' => 'success', 'data' => $annonce]);

    }


    public function search(Request $request)
    {

        //return response()->json(['status' => 'success', 'data' => $request->aeroport_a]);

        $date_heur_d = $request->get('date_heur_d');
        $aeroport_a = $request->get('aeroport_a');
        $aeroport_d = $request->get('aeroport_d');
        $nb_kg = $request->get('nb_kg');
        $prix_kg = $request->get('prix_kg');
        $resistance = json_encode($request->get('resistance'));

        $anonces = Annonce::Select("annonces.*")->where(function ($query) use ($aeroport_a, $aeroport_d, $date_heur_d, $nb_kg, $prix_kg, $resistance) {

            $query->where('date_heur_d', 'LIKE', "%$date_heur_d%")
                ->where('aeroport_a', $aeroport_a)
                ->where('aeroport_d', $aeroport_d)
                ->where('nb_kg', 'LIKE', "%$nb_kg%")
                ->where('prix_kg', 'LIKE', "%$prix_kg%");
                //-> whereJsonContains('resistance', $resistance);
                //->whereRaw("JSON_CONTAINS(resistance, ' $resistance')");
            //->whereRaw("JSON_CONTAINS(resistance, '[\"$resistance\"]')");


        })->orderBy('created_at')->paginate(4);

        return response()->json(['status' => 'success', 'data' => $anonces]);

    }
}
