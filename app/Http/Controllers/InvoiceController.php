<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoices;
use App\Models\Client;
use App\Models\Services;
use App\Models\InvoiceLine;
use Redirect;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use Carbon\Carbon;
class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoices::all();
        return view('invoice.index',[
            'invoices' => $invoices
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients=Client::all();
        $services=Services::all();
        return view('invoice.create',[
            'clients' => $clients,
            'services' => $services
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $total=0;
        $tva=$request->input('TVA');
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
                $price = $service->price;
                $total += ($price * $quantite) - $remise ;
            }
        }   
        $total= ($total + ($total*$tva)/100); 
    	$invoice = new Invoices;

        $invoice->invoice_date = $request->input('date');
        $invoice->invoice_amout_tva = $tva;
        $invoice->invoice_amout_ttc = $total;
        $invoice->client_id = $request->input('client');

        $invoice->save();
        
        for($i=0;$i<count($idService);$i++){
            
            for($j=0;$j<count($quantites);$j++){
                $quantite = $quantites[$j];
                $service = $services[$j];
                $remise = $remises[$j]; 
                    $price = $service->price;
                    $id = $service->id;  
                    //dd($total);
                    $invoiceLine = InvoiceLine::create([
                        'services_id' => $id,
                        'invoice_id' => $invoice->id,
                        'invoiceLine_discount' => $remise ,
                        'invoiceLine_service_quantity' => $quantite,
                        'invoiceLine_price_per_unit' => $price
                    ]);
            }
        }
        return Redirect::route('invoice.index'); 
    }
    public function show($id)
    {
        $invoice = Invoices::find($id);
        $invoices_lines = InvoiceLine::where('invoice_id',$id)->get();
        return view('invoice.show',
        [
            'invoice' => $invoice,
            'invoices_lines' => $invoices_lines
            
        ]);
    }
    public function destroy($id){
        Invoices::destroy($id);
        return redirect('/invoice');
    }


    public function pdf($id){
        $invoice = Invoices::find($id);
        $invoices_lines = InvoiceLine::where('invoice_id',$id)->get();        
        $nom= $invoice->client->name;   
        $adresse=$invoice->client->adresse;
        $age= $invoice->client->age;
        $tva = $invoice->invoice_amout_tva;
        $date = $invoice->invoice_date;
        for($i=0;$i<count($invoices_lines);$i++){
            $invoice_line = $invoices_lines[$i];
            $nameService= $invoice_line->services->name;
            $price = $invoice_line->invoiceLine_price_per_unit;
            $quantite = $invoice_line->invoiceLine_service_quantity;
            $remise = $invoice_line->invoiceLine_discount;
            $item=(new InvoiceItem())->title($nameService)->pricePerUnit($price)->quantity($quantite)->discount($remise);
            $items[]=$item;
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
        
        $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);

        $invoice = Invoice::make()
            ->buyer($customer)
            ->seller($client)
            ->date(Carbon::parse($date))
            ->dateFormat('d/m/Y')
            ->name("Facture") //nom de la facture
            //->discountByPercent(10) //reduction
            ->taxRate($tva) //tva 
            //->shipping(1.99) //price of ship
            ->currencySymbol('MAD')
            ->currencyCode('DRH')
            
            ->addItems($items);

        return $invoice->stream();
    }
    public function pdfDowload($id){
        $invoice = Invoices::find($id);
        $invoices_lines = InvoiceLine::where('invoice_id',$id)->get();        
        $nom= $invoice->client->name;   
        $adresse=$invoice->client->adresse;
        $age= $invoice->client->age;
        $tva = $invoice->invoice_amout_tva;
        $date = $invoice->invoice_date;
        for($i=0;$i<count($invoices_lines);$i++){
            $invoice_line = $invoices_lines[$i];
            $nameService= $invoice_line->services->name;
            $price = $invoice_line->invoiceLine_price_per_unit;
            $quantite = $invoice_line->invoiceLine_service_quantity;
            $remise = $invoice_line->invoiceLine_discount;
            $item=(new InvoiceItem())->title($nameService)->pricePerUnit($price)->quantity($quantite)->discount($remise);
            $items[]=$item;
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
        
        $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);

        $invoice = Invoice::make()
            ->buyer($customer)
            ->seller($client)
            ->date(Carbon::parse($date))
            ->dateFormat('d/m/Y')
            ->name("Facture") //nom de la facture
            //->discountByPercent(10) //reduction
            ->taxRate($tva) //tva 
            //->shipping(1.99) //price of ship
            ->currencySymbol('MAD')
            ->currencyCode('DRH')
            
            ->addItems($items);

        return $invoice->download();
    }
}
