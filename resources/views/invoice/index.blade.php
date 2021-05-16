@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 m-auto">
            <div class="card mt-5 mb-5">
                <div class="card-header align-middle text-center">
                    <h1 >Affichage de la liste des factures</h1>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">DATE</th>
                                <th scope="col">PRIX</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $invoice)
                            <tr>
                                <th scope="row">{{$invoice->id}}</th>
                                <td>{{$invoice->invoice_date}}</td>
                                <td>{{$invoice->invoice_amout_ttc}}</td>
                               
                                <td class="d-flex flex-row">
                                <div class="ps-2">
                                        <a class="btn btn-primary" href="{{route('invoice.show',$invoice->id)}}" role="button"><i class="far fa-edit"></i>Afficher</a>  
                                    </div> 
                                    <div class="ps-2">
                                        <a class="btn btn-warning" href="{{route('invoice.pdf',$invoice->id)}}" role="button"><i class="far fa-edit"></i>Afficher facture</a>  
                                    </div>
                                    <div class="ps-2">
                                        <a class="btn btn-info" href="{{route('invoice.telecharger',$invoice->id)}}" role="button"><i class="far fa-edit"></i>telecharger facture</a>  
                                    </div>     
                                    <form action="{{route('invoice.destroy',$invoice->id)}}" method="POST" class="px-2">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit" >Effacer</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach    
                        </tbody>
                    </div>  
                </table>  
            </div>
            <div class="card-footer d-flex flex-row mb-2">
                <p class="pt-3">Insérer une nouvelle facture:</p>
                <div class="ms-auto p-2">
                    <a href="{{route('invoice.create')}}" class="btn btn-outline-dark btn-light" style="text-align:right">Insérer</a>
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection