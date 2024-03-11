<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    
    public function getWelcomePage()
    {


        $databases = DB::select("SHOW DATABASES LIKE 'child%'");

        $databaseNames = [];

        foreach ($databases as $database) {
            $databaseNames[] = $database->{'Database (child%)'};
        }

        return view('test')->with('databases', $databaseNames);

    }


    // selectDatabase

    public function selectDatabase(Request $request){

        $database = $request->database;

        if ($database === 'child_a') {
            session(['selected_database' => 'second_mysql']);
        } elseif ($database === 'child_b') {
            session(['selected_database' => 'third_mysql']);
        } else {
            // Handle invalid database selection
            return response()->json(['error' => 'Invalid database selection'], 400);
        }
    
        return response()->json(['message' => 'Database selection successful'], 200);
    }


    public function showData(Request $request)
    {


        $data = DB::table('test')->get();


        $masterUsers = User::all();

        
        return [
            'data' => $data,
            'masterUsers' => $masterUsers
        ];
    }









}
