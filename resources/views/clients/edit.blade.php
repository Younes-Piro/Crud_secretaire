@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
            <div class="card mt-5 mb-5">
                <div class="card-header align-middle text-center">
                    <h1>MODIFIER VOTRE CLIENT</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('client.update',$client->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group form-outline mb-4">
                            <label for="name">Nom : </label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $client->name}}">
                        </div>
                        <div class="form-group form-outline mb-4">
                            <label for="age">Age : </label>
                            <input type="text" class="form-control" id="age" name="age" value="{{ $client->age}}">
                        </div>
                        <div class="form-group form-outline mb-4">
                            <label for="adresse">Adresse : </label>
                            <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $client->adresse}}">
                        </div>
                        <div class="form-group d-flex flex-row"> SEXE :
                            <div class="form-check form-outline ms-4">
                                <input type="radio" class="form-check-input" id="homme" name="sexe" value="M" {{ $client->sexe == "M" ? 'checked' : '' }}>
                                <label class="form-check-label" for="homme"> H </label>
                            </div>
                            <div class="form-check form-outline mb-4 ms-4">    
                                <input type="radio"  class="form-check-input" name="sexe" id="femme" value="F"{{ $client->sexe == "F" ? 'checked' : '' }}> 
                                <label class="form-check-label" for="femme"> F</label>
                            </div>
                        </div>    
                        <div class="form-group form-outline mb-4">
                            <label for="date">Date du rendez-vous: </label>
                            <input type="datetime-local" class="form-control" id="date" name="date"  value="{{ date('Y-m-d\TH:i', strtotime($client->date_rendez_vous)) }}">

                        </div>
                        <button type="submit" class="btn btn-success">EDITER</button>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</div>

@endsection


