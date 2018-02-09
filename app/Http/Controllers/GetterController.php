<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $sqlObject = Lokal::all();
        $finalData = array();

        foreach ($sqlObject as $obr) {


            $obrok = array(
                "id" => $obr['id'],
                "ime" => $obr['Ime'],
                "opis" => $obr['Opis']
            );
            array_push($finalData, $obrok);
        }


//        return $sqlObject;
        return $finalData;
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
        $sqlObject = Obrok::all();
        $finalData = array();

        foreach ($sqlObject as $obr) {


            $obrok = array(
                "id" => $obr['id'],
                "ime" => $obr['ime'],
                "lokal" => Lokal::where("id", $obr['lokal_id'])->first()->Ime,
                "cena" => $obr['cena'],
                "opis" => $obr['opis']
            );
            array_push($finalData, $obrok);
        }


//        return $sqlObject;
        return $finalData;
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
        //print_r('test');die;
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

    public function getOrders(Request $request) {
        $input = $request->input();
        $userId = (int) $input['user_id'];



//        $sqlObject = Order::whereUser_id(strtolower($input['user_id']));
        $sqlObject = Order::where("user_id", $userId)->get();

        return $sqlObject;
    }

    public function delOrder(Request $request) {
        if (empty($request->input())) {
            return response()->json(array(
                        "error" => true,
                        "message" => "input false"
            ));
        }

        $input = $request->input();
        $userId = $input['user_id'];


        //---------------------------------------------------------------------
        //
        //--------------------------------------------------------------------

        try {
            Order::where("user_id", $userId)->delete();
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

}
