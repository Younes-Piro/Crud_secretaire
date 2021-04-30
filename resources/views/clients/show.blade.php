@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
            <div class="card mt-5 mb-5">
                <div class="card-header align-middle text-center">
                    <h1><span class="text-primary">NOM CLIENT :</span>  {{$client->name}}</h1>
                </div>
                <div class="card-body">
                    <div>
                        <p><span class="text-primary">CLIENT ID :</span> {{$client->id}}</p>
                    </div>
                    <div>
                        <p><span class="text-primary">AGE CLIENT :</span> {{$client->age}}</p>
                    </div>
                    <div>
                        <p><span class="text-primary">ADRESSE CLIENT :</span> {{$client->adresse}}</p>
                    </div>
                    <div>
                        <p><span class="text-primary">SEXE CLIENT :</span> {{$client->sexe}}</p>
                    </div>
                    <div>
                        <p><span class="text-primary">DATE RENDEZ-VOUS CLIENT :</span>  {{$client->date_rendez_vous}}</p>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</div>


@endsection