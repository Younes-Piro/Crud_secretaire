<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use App\Models\Client;
use App\Models\Services;

class InvoicesController extends Controller
{
    public function index(){
        $clients=Client::all();
        $services=Services::all();
        return view('invoice',[
            'clients' => $clients,
            'services' => $services
        ]);
    }
    public function test(Request $request){
        //dd($request);

        $id=$request->input('client');

        $client = Client::find($id);
        $nom= $client->name;   
        $adresse=$client->adresse;
        $age= $client->age;

        $idService[]=$request->input('service');
        $quantite[]=$request->input('quantite');
        $remise[]=$request->input('reduction');
        for($i=0;$i<count($idService);$i++){
            $services = Services::find($idService[$i]);
            $quantites = $quantite[$i];
            $remises = $remise[$i];
            for($j=0;$j<count($quantites);$j++){
                $quantite = $quantites[$j];
                $service = $services[$j];
                $remise = $remises[$j];    
                    $nameService = $service->name;
                    $price = $service->price;
                    $item=(new InvoiceItem())->title($nameService)->pricePerUnit($price)->quantity($quantite)->discount($remise);
                    $items[]=$item;
            }
        }

        /*foreach( $idService as $id){
            $services = Services::find($id);
            foreach ($services as $service){
                $nameService = $service->name;
                $price = $service->price;
                $item=(new InvoiceItem())->title($nameService)->pricePerUnit($price);
                $items[]=$item;
            }
        }*/
        $tva = $request->input('TVA');
       
        
        $client = new Party([
            'name'          => 'Cabinet Kine',
            
            'custom_fields' => [
                'telephone'    => '06 66 66 66 66',
                'note'        => 'IDDQD',
                'business id' => '365#GG',
            ],
        ]);

        $customer = new Party([
            'name'          =>  $nom,
            'address'       =>  $adresse,
            'custom_fields' => [
                'age client ' => $age . " ans",
            ],
        ]);
        
        

        $invoice = Invoice::make()
            ->buyer($customer)
            ->seller($client)
            ->name("Facture") //nom de la facture
            //->discountByPercent(10) //reduction
            ->taxRate($tva) //tva 
            //->shipping(1.99) //price of ship
            ->currencySymbol('MAD')
            ->currencyCode('DRH')
            
            ->addItems($items);

        return $invoice->stream();
    }
}
