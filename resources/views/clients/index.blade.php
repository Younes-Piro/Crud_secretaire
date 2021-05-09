@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 m-auto">
            <div class="card mt-5 mb-5">
                <div class="card-header align-middle text-center">
                    <h1 >Affichage de la liste des clients</h1>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">NOM</th>
                                <th scope="col">AGE</th>
                                <th scope="col">ADRESSE</th>
                                <th scope="col">SEXE</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                            <tr>
                                <th scope="row">{{$client->id}}</th>
                                <td>{{$client->name}}</td>
                                <td>{{$client->age}}</td>
                                <td>{{$client->adresse}}</td>
                                <td>{{$client->sexe}}</td>
                               
                                <td class="d-flex flex-row">
                                <div class="ps-2">
                                        <a class="btn btn-primary" href="{{route('client.show',$client->id)}}" role="button"><i class="far fa-edit"></i>Afficher</a>  
                                    </div> 
                                    <div class="ps-2">
                                        <a class="btn btn-success" href="{{route('client.edit',$client->id)}}" role="button"><i class="far fa-edit"></i>Editer</a>  
                                    </div>    
                                    <form action="{{route('client.destroy',$client->id)}}" method="POST" class="px-2">
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
                    <a href="{{route('client.create')}}" class="btn btn-outline-dark btn-light" style="text-align:right">Insérer</a>
                </div>  
            </div>
        </div>
    </div>
</div>  
@endsection