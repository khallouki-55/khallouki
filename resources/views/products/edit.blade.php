
@extends('layouts.app')
  
@section('title')
  
@section('contents')
    <h1 class="mb-0">Modification du Courrier</h1>
    <hr />
    <form action="{{ route('products.update', $courrier->NDSICG) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3 mt-3">
            <div class="col" >
                <label for="">Num BO :</label>
                <input type="text" name="NumBO" value="{{ $courrier->NumBO }}">
            </div>      
            <div class="col">
                <label for="">Date BO :</label>
                <input type="date" name="DateBO"  value="{{ $courrier->DateBO }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
              <label for="exampleSelect">Type Expiditeur :</label>
            </div>
            <div class="col-md-8">
              <select class="form-control" name="typeExpiditeur" id="typeExpiditeurSelect" required>
                <option value="Administration" @if($courrier->typeExpiditeur == "Administration") selected @endif>Administration</option>
                <option value="Personne" @if($courrier->typeExpiditeur == "Personne") selected @endif>Personne</option>
              </select>
            </div>
        </div>
        <div id="adminDiv" class="row mb-3 mt-3" @if($courrier->expiditeurAD > 0) style="display: block;" @else style="display: none;" @endif>
            <div class="row mb-3 mt-3">
                <div class="col-md-4">
                    <label for="exampleSelect">Expiditeur Administration :</label>
                </div>
                <div class="col-md-8">
                    <select class="form-control" name="expiditeurAD"  required>
                    @foreach($expiditeur as $expiditeurs)
                    <option value="{{ $expiditeurs->typeEX }}">{{ $expiditeurs->typeEX }}</option>
                    @endforeach  
                    </select>
                </div>
            </div>
        </div>    
        <div id="personneDiv" class="row mb-3 mt-3" @if($courrier->expiditeurPER > 0) style="display: block;" @else style="display: none;" @endif>
            <div class="row mb-3 mt-3">
                <div class="col-md-4">
                    <label for="exampleSelect">Nom Expiditeur Personne :</label>
                </div>
                <div class="col-md-8">
                    <input type="text" name="expiditeurPER" value="{{ $courrier->expiditeurPER }}" class="form-control">
                </div>
            </div>
        </div>
        <div class="row mb-3 mt-3">
            <div class="col-md-4">
                <label for="exampleSelect">Annex administrative :</label>
            </div>
            <div class="col-md-8">
                <select class="form-control" name="Annex" value="{{ $courrier->Annex }}" id="exampleSelect">
                  <option selected disabled>{{ $courrier->Annex }}</option>
                  @foreach($annex as $annexes)
                  <option value="{{ $annexes->annex }}">{{ $annexes->annex }}</option>
                  @endforeach  
                </select>
            </div>
        </div>
        <div class="row mb-3 mt-3">
            <div class="col-md-4">
                <label for="exampleSelect">Objet :</label>
              </div>
              <div class="col-md-8">
                <input type="text" name="objet" value="{{ $courrier->objet }}" class="form-control"  >
            </div>
        </div>
        <div class="row mb-3 mt-3">
            <div class="col-md-4">
                <label for="exampleSelect">Theme :</label>
            </div>
            <div class="col-md-8">
                <select class="form-control" value="{{ $courrier->theme }}" name="theme" id="exampleSelect">
                  <option selected disabled>{{ $courrier->theme }}</option>
                  @foreach($theme as $themes)
                  <option value="{{ $themes->theme }}">{{ $themes->theme }}</option>
                  @endforeach  
                </select>
            </div>
        </div>
        <div class="row mb-3 mt-3">
            <div class="col-md-4">
                <label for="exampleSelect">Type :</label>
            </div>
            <div class="col-md-8">
                <select class="form-control" value="{{ $courrier->type }}" name="type" id="exampleSelect">
                  <option selected disabled>{{ $courrier->type }}</option>
                  @foreach($type as $types)
                  <option value="{{ $themes->theme }}">{{ $themes->theme }}</option>
                  @endforeach 
                </select>
            </div>
        </div>
        <div class="row mb-3 mt-3">
            <div class="col-md-4">
                <label for="exampleSelect">Observation :</label>
            </div>
            <div class="col-md-8">
                <textarea class="form-control" value="{{ $courrier->observation }}" name="observation" id="exampleTextarea" rows="3">{{ $courrier->observation }}</textarea>
            </div>
        </div>
        <div class="row mb-3 mt-3">
            <div class="col-md-4">
                <label for="exampleSelect">Travail effectue :</label>
            </div>
            <div class="col-md-8">
                <textarea class="form-control" value="{{ $courrier->travailEFF }}" name="travailEFF" id="exampleTextarea" rows="3">{{ $courrier->travailEFF }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Modifie</button>
                <a href={{ route('products') }}>
                    <button class="btn btn-primary">Retour à la liste des articles</button>
                </a>
            </div>
        </div>
        
    </form>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var typeExpiditeurSelect = document.getElementById("typeExpiditeurSelect");
            var adminDiv = document.getElementById("adminDiv");
            var personneDiv = document.getElementById("personneDiv");
    
            typeExpiditeurSelect.addEventListener("change", function () {
                if (typeExpiditeurSelect.value === "Administration") {
                    adminDiv.style.display = "block";
                    personneDiv.style.display = "none";
                } else if (typeExpiditeurSelect.value === "Personne") {
                    adminDiv.style.display = "none";
                    personneDiv.style.display = "block";
                } else {
                    adminDiv.style.display = "none";
                    personneDiv.style.display = "none";
                }
            });
        });
    </script>
@endsection
