@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 m-auto">
            <div class="card mt-5 mb-5">
                <div class="card-header align-middle text-center">
                    <h1 >Affichage de la liste des paiements</h1>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">TYPE PAIEMENT</th>
                                <th scope="col">DATE PAIEMENT</th>
                                <th scope="col">NOM CLIENT</th>
                                <th scope="col">AGE CLIENT</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                            <tr>
                                <th scope="row">{{$payment->id}}</th>
                                <td>{{$payment->type_paiement}}</td>
                                <td>{{$payment->date_paiement}}</td>
                                <td>{{$payment->client->name}}</td>
                                <td>{{$payment->client->age}}</td>
                               
                                <td class="d-flex flex-row">
                                <div class="ps-2">
                                        <a class="btn btn-primary" href="" role="button"><i class="far fa-edit"></i>Afficher</a>  
                                    </div> 
                                    <div class="ps-2">
                                        <a class="btn btn-success" href="" role="button"><i class="far fa-edit"></i>Editer</a>  
                                    </div>    
                                    <form action="" method="POST" class="px-2">
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
                <p class="pt-3">Insérer un nouveau client :</p>
                <div class="ms-auto p-2">
                    <a href="{{route('paiement.create')}}" class="btn btn-outline-dark btn-light" style="text-align:right">Insérer</a>
                </div>  
            </div>
        </div>
    </div>
</div>

@endsection