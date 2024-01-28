<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class payment extends Controller
{
    public function payment(Request $request)
    {
        // Calculate montant based on selected duration
        $montant = $request->input('duration') === 'three' ? 100 : ($request->input('duration') === 'six' ? 150 : 250);

        $query = DB::table('payment')->insert([
            'id_user' => $request->input('id'),
            'duration' => $request->input('duration'),
            'montant' => $montant,
            'statut' => 'en cour', 
            'name_card' => $request->input('name_card'),
            'number_card' => $request->input('number_card'),
            'exp_month' => $request->input('exp_month'),
            'exp_year' => $request->input('exp_year'),
            'cvv' => $request->input('CVV'),
            
        ]);

        return Redirect::route('dashboard');
    }
    public function readPayments()
    {
        $user_id = Auth::id();
        // Retrieve records from the payment table where statut is 'en cour'
        $payments = DB::table('payment')
            ->where('id_user', $user_id)
            ->where('statut', 'en cour')
            ->get();

        // Pass the payment data to a view and render the view
        return view('dashboard', ['payments' => $payments]);
    }
    public function virefiedPayments()
    {
        $user_id = Auth::id();
        // Retrieve records from the payment table where statut is 'en cour'
        $payments = DB::table('payment')
            ->where('id_user', $user_id)
            ->where('statut', 'virefied')
            ->get();

        // Pass the payment data to a view and render the view
        return view('history', ['payments' => $payments]);
    }
}
