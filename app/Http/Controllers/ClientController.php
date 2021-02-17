<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Response;

class ClientController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('id','DESC')->get();
        return view('clients.index',compact('clients'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
 
        $clientId = $request->id;
 
        $client   =   Client::updateOrCreate(
                    [
                     'id' => $clientId
                    ],
                    [
                    'nom' => $request->nom, 
                    'prenom' => $request->prenom, 
                    'email' => $request->email,
                    'adresse' => $request->adresse,
                    'pays' => $request->pays,
                    'ville' => $request->ville,
                    'code_postal' => $request->code_postal,
                    'telephone' => $request->telephone
                    ]);    
                         
        return Response()->json($client);
 
    }

    public function addClient(Request $request)
    {  
        
                    $client  = new Client();
                    $client->nom = $request->nom; 
                    $client->prenom = $request->prenom; 
                    $client->email = $request->email;
                    $client->adresse = $request->adresse;
                    $client->pays = $request->pays;
                    $client->ville = $request->ville;
                    $client->code_postal = $request->code_postal;
                    $client->telephone = $request->telephone; 
                    $client->save();
                         
                  return Response()->json($client);
 
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {   
        $where = array('id' => $request->id);
        $client  = Client::where($where)->first();
      
        return Response()->json($client);
    }

       /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $client = Client::where('id',$request->id)->delete();
      
        return Response()->json($client);
    }

    public function getClientById($id)
    {
        $client = Client::find($id);
        return response()->json($client);

    }
 
    public function updateClient(Request $request)
    {
        $client = Client::find($request->id);
        $client->nom = $request->nom; 
        $client->prenom = $request->prenom; 
        $client->email = $request->email;
        $client->adresse = $request->adresse;
        $client->pays = $request->pays;
        $client->ville = $request->ville;
        $client->code_postal = $request->code_postal;
        $client->telephone = $request->telephone; 
        $client->save();
        return response()->json($client);
    }


    public function deleteClient($id)
    {

        $client = Client::find($id);
        $client->delete();
        return response()->json(['success'=>'Record has been deleted']);
    }


}
