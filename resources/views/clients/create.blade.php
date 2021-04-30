@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
            <div class="card mt-5 mb-5">
                <div class="card-header align-middle text-center">
                    <h1>AJOUTER VOTRE CLIENT</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('client.store')}}" method="POST">
                        @csrf
                        <div class="form-group form-outline mb-4">
                            <label for="name">Nom : </label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Entrer le nom du client ...">
                        </div>
                        <div class="form-group form-outline mb-4">
                            <label for="age">Age : </label>
                            <input type="text" class="form-control" id="age" name="age" placeholder="Entrer l'age du client ...">
                        </div>
                        <div class="form-group form-outline mb-4">
                            <label for="adresse">Adresse : </label>
                            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Entrer l'adresse du client ...">
                        </div>
                        <div class="form-group d-flex flex-row"> SEXE :
                            <div class="form-check form-outline ms-4">
                                <input type="radio" class="form-check-input" id="homme" name="sexe" value="M">
                                <label class="form-check-label" for="homme"> H </label>
                            </div>
                            <div class="form-check form-outline mb-4 ms-4">    
                                <input type="radio"  class="form-check-input" name="sexe" id="femme" value="F"> 
                                <label class="form-check-label" for="femme"> F</label>
                            </div>
                        </div>    
                        <div class="form-group form-outline mb-4">
                            <label for="date">Date du rendez-vous: </label>
                            <input type="datetime-local" class="form-control" id="date" name="date" >
                        </div>
                        <button type="submit" class="btn btn-primary">CREER</button>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</div>
@endsection