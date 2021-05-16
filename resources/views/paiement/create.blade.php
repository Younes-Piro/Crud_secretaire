@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
            <div class="card mt-5 mb-5">
                <div class="card-header align-middle text-center">
                    <h1>AJOUTER UN PAIEMENT</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('paiement.store')}}" method="POST">
                        @csrf
                        <div class="form-group form-outline mb-4">
                            <label for="client"> Select client </label>
                                <select name="client" id="client" class="form-control">
                                        @foreach ($clients as $client)
                                        <option value="{{$client->id}}">{{$client->name}}</option>
                                        @endforeach
                                </select>
                        </div>
                        <div class="form-group form-outline mb-4">
                            <label for="type"> Type de paiement </label>
                                <select name="type" id="type" class="form-control">
                                        <option value="cash">cash</option>
                                        <option value="virement">virement</option>
                                        <option value="cheque">cheque</option>
                                </select>
                        </div>
                        <div class="form-group form-outline mb-4">
                            <label for="adresse">Date paiement </label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>    
                        <button type="submit" class="btn btn-primary">CREER</button>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</div>




@endsection
