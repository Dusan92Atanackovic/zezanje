<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lokal;
use App\Obrok;
use App\User;
use App\Order;

class GetterController extends Controller {

    public function addLokal(Request $request) {
        if (empty($request->input())) {
            return response()->json(array(
                        "error" => true,
                        "message" => "input false"
            ));
        }

        foreach ($request->input() as $input) {

            $sqlObject = new Lokal;
            $sqlObject->Ime = strtolower($input['ime']);
            $sqlObject->Opis = $input['opis'];

            try {
                $sqlObject->save();
            } catch (\Illuminate\Database\QueryException $exc) {
                $status = $exc->getCode();
                return response()->json(array(
                            'message' => $status
                ));
            }
        }
        return response()->json(array(
                    "message" => "sql insertion SUCCESSFUL"
        ));
    }

    public function getLokals() {
        $lokal = Lokal::all();

        return $lokal;
    }

    public function addObrok(Request $request) {
        if (empty($request->input())) {
            return response()->json(array(
                        "error" => true,
                        "message" => "input false"
            ));
        }

        foreach ($request->input() as $input) {

            $sqlObject = new Obrok;
            $sqlObject->ime = strtolower($input['ime']);
            $sqlObject->cena = strtolower($input['cena']);
            $sqlObject->opis = $input['opis'];
            $sqlObject->lokal_id = Lokal::whereIme(strtolower($input['lokal']))->first()->id;

//

            try {
                $sqlObject->save();
            } catch (\Illuminate\Database\QueryException $exc) {
                $status = $exc->getCode();
                return response()->json(array(
                            'message' => $status
                ));
            }
        }
        return response()->json(array(
                    "message" => "sql insertion SUCCESS"
        ));
    }

    public function getObroks() {
        $sqlObject = Lokal::all();

        return $sqlObject;
    }

    public function addUser(Request $request) {
        if (empty($request->input())) {
            return response()->json(array(
                        "error" => true,
                        "message" => "input false"
            ));
        }
        $this->validate($request, [
            'ime' => 'required',
            'prezime' => 'required',
            'email' => 'required|string|email|max:255',
            'password' => 'required'
        ]);

        $input = $request->input();
        $sqlObject = new User;
        $sqlObject->ime = $input['ime'];
        $sqlObject->prezime = $input['prezime'];
        $sqlObject->email = $input['email'];
        $sqlObject->password = hash("sha256", $input['password']);

        try {
            $sqlObject->save();
        } catch (\Illuminate\Database\QueryException $exc) {
            $status = $exc->getCode();
            return response()->json(array(
                        'message' => $status
            ));
        }

        return response()->json(array(                    
                    "message" => "sql insertion SUCCESSFUL"
        ));
    }

    public function addOrder(Request $request) {
        if (empty($request->input())) {
            return response()->json(array(
                        "error" => true,
                        "message" => "input false"
            ));
        }
        foreach ($request->input() as $input) {

            $sqlObject = new Order;
            $sqlObject->obrok_id = $input['obrok_id'];
            $sqlObject->user_id = $input['user_id'];
            $sqlObject->prilozi = $input['prilozi'];

            try {
                $sqlObject->save();
            } catch (\Illuminate\Database\QueryException $exc) {
                $status = $exc->getCode();
                return response()->json(array(
                            'message' => $status
                ));
            }
        }
        return response()->json(array(
                    "message" => "sql insertion SUCCESSFUL"
        ));
    }

}
