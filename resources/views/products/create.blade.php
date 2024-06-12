@extends('layouts.app')
  
@section('title')
  
@section('contents')
    <h1 class="mb-0">Ajoute Courrier</h1>
    <hr />
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row mb-3 mt-3">
            <div class="col" >
                <label for="">Num BO :</label>
                <input type="text" placeholder="Num BO" value="{{ old('NumBO') }}" class="form-control" name="NumBO" required>
            </div>      
            <div class="col">
                <label for="">Date BO :</label>
                <input type="date"  class="form-control" value="{{ old('DateBO') }}" name="DateBO"  required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
              <label for="exampleSelect">Type Expiditeur :</label>
            </div>
            <div class="col-md-8">
              <select class="form-control"  name="typeExpiditeur" id="exampleSelect" required>
                <option selected value="" disabled>Type Expiditeur</option>
                <option value="Administration">Administration</option>
                <option value="Personne">Personne</option>
              </select>
            </div>
        </div>
        <div id="adminDiv" class="row mb-3 mt-3" style="display: none;">
            <div class="row mb-3 mt-3">
                <div class="col-md-4">
                    <label for="exampleSelect" id="adminDiv">Expiditeur Administration :</label>
                </div>
                <div class="col-md-8">
                    <select class="form-control"  name="expiditeurAD" id="q" required placeholder="test">
                        <option selected value="" disabled>Choisir Expiditeur Administration</option>
                    @foreach($expiditeur as $expiditeurs)
                    <option value="{{ $expiditeurs->typeEX }}">{{ $expiditeurs->typeEX }}</option>
                    @endforeach  
                    </select>
                </div>
            </div>
        </div>    
        <div id="personneDiv" class="row mb-3 mt-3" style="display: none;">
            <div class="row mb-3 mt-3">
                <div class="col-md-4">
                    <label  id="personneDiv">Nom Expiditeur Personne :</label>
                </div>
                <div class="col-md-8">
                    <input type="text" value="{{ old('expiditeurPER') }}" name="expiditeurPER" id="expiditeurPER" class="form-control"  required>
                </div>
            </div>
        </div>
        <div class="row mb-3 mt-3">
            <div class="col-md-4">
                <label for="exampleSelect">Annex administrative :</label>
            </div>
            <div class="col-md-8">
                <select class="form-control"  name="Annex" id="exampleSelect" required>
                    <option selected value="" disabled>Annex administrative</option>
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
                <input type="text" name="objet" value="{{ old('objet') }}" placeholder="Objet" class="form-control" required >
            </div>
        </div>
        <div class="row mb-3 mt-3">
            <div class="col-md-4">
                <label for="exampleSelect">Theme :</label>
            </div>
            <div class="col-md-8">
                <select class="form-control"  name="theme" id="exampleSelect" required>
                    <option selected value="" disabled>Theme</option>
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
                <select class="form-control"  name="type" id="exampleSelect" required>
                    <option selected value="" disabled>Type</option>
                    @foreach($type as $types)
                  <option value="{{ $types->type }}">{{ $types->type }}</option>
                  @endforeach 
                </select>
            </div>
        </div>
        <div class="row mb-3 mt-3">
            <div class="col-md-4">
                <label for="exampleSelect">Observation :</label>
            </div>
            <div class="col-md-8">
                <textarea class="form-control"  name="observation" placeholder="Observation" id="exampleTextarea" rows="3"></textarea>
            </div>
        </div>
        <div class="row mb-3 mt-3">
            <div class="col-md-4">
                <label for="exampleSelect">Travail effectue :</label>
            </div>
            <div class="col-md-8">
                <textarea class="form-control"  placeholder="Travail effectue" name="travailEFF" id="exampleTextarea" rows="3"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Ajoute</button>
            </div>
        </div>
    </form>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var typeExpiditeurSelect = document.getElementById("exampleSelect");
            var adminDiv = document.getElementById("adminDiv");
            var personneDiv = document.getElementById("personneDiv");
            var expiditeurPERInput = document.getElementById("expiditeurPER");
    
            typeExpiditeurSelect.addEventListener("change", function () {
                if (typeExpiditeurSelect.value === "Administration") {
                    adminDiv.style.display = "block";
                    personneDiv.style.display = "none";
                    expiditeurPERInput.removeAttribute("required");
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

