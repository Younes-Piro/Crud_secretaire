@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card mt-5 mb-5">
                <div class="card-header align-middle text-center">
                    <h1>INFORMATION INVOICE</h1>
                </div>
            </div>
            <div class="card-body">
                <h1 ><span class="text-primary">ID INVOICE :</span> {{$invoice->id}}</h1>
                <h1><span class="text-primary">DATE INVOICE :</span> {{$invoice->invoice_date}}</h1>
                <h1 ><span class="text-primary">TVA INVOICE :</span> {{$invoice->invoice_amout_tva}} %</h1>
                <h1 ><span class="text-primary">TTC INVOICE :</span> {{$invoice->invoice_amout_ttc}} DRH</h1>
            </div>
        </div>  
        <div class="col-md-6 m-auto">
            <div class="card mt-5 mb-5">
                <div class="card-header align-middle text-center">
                    <h1>INFORMATION CLIENT</h1>
                </div>
            </div>
            <div class="card-body">
                <h1 ><span class="text-primary">ID CLIENT :</span> {{$invoice->client->id}}</h1>
                <h1> <span class="text-primary">NOM CLIENT :</span> {{$invoice->client->name}}</h1>
                <h1> <span class="text-primary">AGE CLIENT :</span> {{$invoice->client->age}}</h1>
                <h1 ><span class="text-primary">ADRESSE CLIENT :</span> {{$invoice->client->adresse}}</h1>
            </div>
        </div>  
    </div>
    <div class="row">    
        <div class="col-md-12 m-auto">
            <div class="card mt-5 mb-5">
                <div class="card-header align-middle text-center">
                    <h1>INFORMATION INVOICE LINE</h1>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">NAME SERVICE</th>
                                <th scope="col">DISCOUNT</th>
                                <th scope="col">QUANTITY SERVICE</th>
                                <th scope="col">PRICE SERVICE</th>
                                <th scope="col">TOTAL AMOUNT SERVICE</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($invoices_lines as $invoice_line)
                            <tr>
                                <th scope="row">{{$invoice_line->id}}</th>
                                <td>{{$invoice_line->services->name}}</td>
                                <td>{{$invoice_line->invoiceLine_discount}}</td>
                                <td>{{$invoice_line->invoiceLine_service_quantity}}</td>
                                <td>{{$invoice_line->invoiceLine_price_per_unit}}</td>
                                <td>{{($invoice_line->invoiceLine_service_quantity)*($invoice_line->invoiceLine_price_per_unit)}}</td>
                        
                            </tr>
                            @endforeach    
                        </tbody>
                    </div>  
                </table>  
            </div>
        </div>
    </div>
</div>
@endsection