@extends('layouts.app')

@section('content')
<script>
$(document).ready(function() {
    $('#client').select2();
});
</script>
<script>
var selectionCounter = 0
function add() {
  var select = document.getElementById("service");
  var clone = select.cloneNode(true);
  var name = select.getAttribute("name") + selectionCounter++;
  clone.id = name;
  clone.setAttribute("name", name);
  clone.classList.add("mt-1");
  document.getElementById("menuSelect").appendChild(clone);
}

</script>
<div class="container">
    <div class="form-group">
        <form action="{{route('invoice')}}" id="myForm" method="POST">
        @csrf
        @method('GET')
        <div id="menuSelect">
            <label for="client"> Select client </label>
            <select name="client" id="client" class="form-control">
                @foreach ($clients as $client)
                <option value="{{$client->id}}">{{$client->name}}</option>
                @endforeach
            </select>
            <label for="service" class="mt-5"> Select service </label>
            <select name="service[]" id="service" class="form-control ">
                @foreach ($services as $service)
                <option value="{{$service->id}}">{{$service->name}}</option>
                @endforeach
            </select>
        </div>    
        <div>
            
                <button class="btn btn-primary mt-5" type="submit" >CREER FACTURE</button>
            
            <button type="button" id="newService"class="btn btn-success mt-5" onclick="add();">Ajouter un service </button>
        </div>    
        </form>    

    </div>
</div>
@endsection

