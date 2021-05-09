@extends('layouts.app')

@section('content')
<script>
$(document).ready(function() {
    $('#addService').on('click', function () {
            addRow();
        });
    function addRow() {
            var addRow = '<tr>\n' +
                            '<td scope="row">\n'+
                                '<select name="service[]" id="service" class="form-control myService" >\n' +
                                    '@foreach($services as $service)\n' +
                                        '<option value="{{$service->id}}">{{$service->name}}</option>\n' +
                                    '  @endforeach\n' +
                                '</select>\n'+
                            '</td>\n' +
                            '<td>\n'+
                                '<input type="number" name="quantite[]" value="1" class="form-control">\n'+
                            '</td>\n' +
                            '<td>\n'+
                                '<input type="text" name="reduction[]" value="0" class="form-control" required>\n'+
                            '</td>\n' +
                            '<td>\n'+
                                '<button type="button" onclick="deleteRow(this)" class="btn btn-danger">Supprimer</button>\n'+
                            '</td>\n' +
                        '</tr>';
            $('#myTabBody').append(addRow);
        };
});
</script>
<script>
    function deleteRow(evn) {
    var myRow = evn.parentNode.parentNode.rowIndex;
    document.getElementById("myTab").deleteRow(myRow);
  }
</script>    
<div class="container">
    <div class="row">
        <div class="col-md-12 m-auto">
            <div class="card mt-5 mb-5">
                <div class="card-header align-middle text-center">
                    <h1>Creer votre facture</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('invoice')}}" id="myForm" method="POST">
                        @csrf
                        @method('GET')
                        <div id="menuSelect">
                            <div class="row">
                                <div class="col">
                                    <label for="client"> Select client </label>
                                    <select name="client" id="client" class="form-control">
                                        @foreach ($clients as $client)
                                        <option value="{{$client->id}}">{{$client->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="TVA">TVA</label>
                                    <input type="text" name="TVA" class="form-control" id="TVA" placeholder="ENTRER VOTRE TVA..." required>
                                </div>
                            </div>
                            
                            
                            <div class="col-md-9 m-auto">
                                <table class="table mt-3" id="myTab">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Service</td>
                                            <th scope="col">Quantite service</td>
                                            <th scope="col">Reduction</th>
                                            <th scope="col">Action </th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTabBody">    
                                        <tr>
                                            <th scope="row">
                                                <select name="service[]" id="service" class="form-control h-100">
                                                    @foreach ($services as $service)
                                                        <option value="{{$service->id}}">{{$service->name}}</option>
                                                    @endforeach
                                                </select>
                                            </th>
                                            <td>
                                                <input type="number" name="quantite[]" value="1" class="form-control" >
                                            </td>
                                            <td>
                                                <input type="text" name="reduction[]" value="0" class="form-control" required>
                                            </td>
                                            <td>
                                            <button type="button" onclick="deleteRow(this)" class="btn btn-danger">Supprimer</button>
                                            </td>
                                        </tr>
                                    </tbody> 
                                
                                </table>
                                <button type="button" id="addService" class="btn btn-primary  mb-4">ajouter service</button>
                            </div>
                        </div>   
                        <div class="card-footer d-flex flex-row mb-2">
                            
                            <p class="pt-3">Créer votre facture</p>
                            <div class="ms-auto p-2">
                                <button class="btn btn-outline-dark btn-light" type="submit" >CREER FACTURE</button>
                            </div> 
                        </div>    
                    </form>    
                </div>
            </div>
        </div>
    </div>
</div>              
@endsection

