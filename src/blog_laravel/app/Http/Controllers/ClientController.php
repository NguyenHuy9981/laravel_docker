<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ValidateClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    function index(Request $request) {
        switch($request['old']) {

            case('18-25'):
                $clients = Client::whereYear('birthday', '<=', '2004')->whereYear('birthday','>=', '1997')->get();
            break;
            case('26-30'):  
                $clients = Client::whereYear('birthday', '<=', '1996')->whereYear('birthday','>=', '1992')->get();
            break;
            case('31-45'):  
                $clients = Client::whereYear('birthday', '<=', '1991')->whereYear('birthday','>=', '1977')->get();
            break;
            case('46-60'):  
                $clients = Client::whereYear('birthday', '<=', '1976')->whereYear('birthday','>=', '1962')->get();
            break;
            
        default: 
            $clients = Client::paginate(10);

        }
        if(isset($request['search'])) {
            $searchValue = $request['search'];
            $clients = DB::table('clients')->where('name', 'LIKE', '%'.$searchValue.'%')->orWhere('phone', 'LIKE', '%'.$searchValue.'%')->get();
        }
        

        return view('client.index', compact('clients'));
    }

    

    function create() {
        
        return view('client.create');

    }

    function store(ValidateClient $request) {
        
        $client = Client::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'birthday' => $request['birthday']
        ]);

        return redirect(route('client.index'));
    }

    function edit($id) {
        $client = Client::find($id);
        return view('client.edit', compact('client'));

    }

    function update(ValidateClient $request, $id) {
        
        $client = Client::find($id)->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'birthday' => $request['birthday']
        ]);

        return redirect(route('client.index'));
    }


    function delete($id) {

        $client = Client::find($id)->delete();
        return response()->json([
            'code' => 200,
            'message' => 'success',
            
        ], 200);
        

    }

  
}
