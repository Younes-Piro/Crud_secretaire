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

        $id=$request->input('client');

        $client = Client::find($id);
        $nom= $client->name;   
        $adresse=$client->adresse;
        $age= $client->age;

        $idService[]=$request->input('service');
        foreach( $idService as $id){
            $services = Services::find($id);
            foreach ($services as $service){
                $nameService = $service->name;
                $price = $service->price;
                $item=(new InvoiceItem())->title($nameService)->pricePerUnit($price);
                $items[]=$item;
            }
        }
        
       
        
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
            //->taxRate(15) //tva
            //->shipping(1.99) //price of a 
            ->currencySymbol('MAD')
            ->currencyCode('DRH')
            ->addItems($items);

        return $invoice->stream();
    }
}
