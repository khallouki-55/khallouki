
@extends('layouts.app')

@section('title')

@section('contents')
<style>
    .table-container {
        overflow-x: auto;
    }
    .opacity-div {
      background-color: rgba(6, 6, 6, 0.392);
      border-radius: 10px; 
      padding: 20px;
    }
    .opacity {
      background-color: rgba(95, 27, 27, 0.613); 
      border-radius: 10px; 
      padding: 20px;
    }
    .text {
        color: aqua
    }
    
    


</style>
@if(Session::has('errrrrr'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('errrrrr') }}
        </div>
    @endif
    <div >
        <h1 class="font-weight-bold mb-0" style="color: rgb(1, 1, 1);">List des Courriers</h1>
    </div>
    <div class="d-flex align-items-center justify-content-between">
            <form id="filterForm" action="{{ route('products') }}"  method="get"> 

                @csrf
                <div class="opacity-div text-light d-flex flex-wrap">
                    <div class="display-content mb-3" style="flex-basis: 33.33%;">
                        <label for="numBO">Num BO :</label><br>
                        <input type="number"  value="{{ old('NumBO') }}" name="NumBO" placeholder="Num BO" class="input-field" style="margin-bottom: 10px;width:200px;"><br>
                    </div>
                
                    <div class="display-content mb-3" style="flex-basis: 33.33%;">
                        <label for="dateBO">Date BO :</label><br>
                        <input type="date" id="dateBO" name="DateBO" class="input-field" style="margin-bottom: 10px;width:200px;"><br>
                    </div>
                
                    <div class="display-content mb-3" style="flex-basis: 33.33%;">
                        <label for="annexSelect">Annex administrative :</label><br>
                        <select name="Annex" id="annexSelect" class="input-field" style="margin-bottom: 10px;width:200px;">
                            <option selected disabled>Annex administrative</option>
                            @foreach($annexes as $annex)
                                <option value="{{ $annex->annex }}">{{ $annex->annex }}</option>
                            @endforeach
                        </select><br>
                    </div>
                
                    <div class="display-content mb-3" style="flex-basis: 33.33%;">
                        <label for="objet">Objet :</label><br>
                        <input type="text" id="objet" name="objet" placeholder="Objet" class="input-field" style="margin-bottom: 10px;width:200px;"><br>
                    </div>
                
                    <div class="display-content mb-3" style="flex-basis: 33.33%;">
                        <label for="themeSelect">Theme :</label><br>
                        <select name="theme" id="themeSelect" class="input-field" style="margin-bottom: 10px;width:200px;">
                            <option selected disabled>Theme</option>
                            @foreach($themes as $theme)
                                <option value="{{ $theme->theme }}">{{ $theme->theme }}</option>
                            @endforeach  
                        </select><br>
                    </div>
                
                    <div class="display-content mb-3" style="flex-basis: 33.33%;">
                        <label for="typeSelect">Type :</label><br>
                        <select name="type" id="typeSelect" class="input-field" style="margin-bottom: 10px;width:200px;">
                            <option selected disabled>Type</option>
                            @foreach($types as $type)
                                <option value="{{ $type->type }}">{{ $type->type }}</option>
                            @endforeach 
                        </select><br>
                    </div>
                
                    <div class="display-content mb-3" style="flex-basis: 33.33%;">
                        <label for="typeExpiditeurSelect">Type Expiditeur :</label><br>
                        <select name="typeExpiditeur" id="typeExpiditeurSelect" class="input-field" style="margin-bottom: 10px;width:200px;">
                            <option selected disabled>Type Expiditeur</option>
                            <option value="Administration">Administration</option>
                            <option value="Personne">Personne</option>
                        </select><br>
                    </div>
                </div>
                
                
                <button type="submit"  class="btn btn-info">Filtrer</button>
                <a href="{{ route('products.create') }}" class="btn bg-gradient-primary text-light">Ajoute Courrier</a>
                <button type="button" class="btn btn-secondary" onclick="clearInputValuesAndSubmit();">Afficher Tout</button>
                <button id="exportButton" class="btn btn-lg btn-success clearfix"><span class="fa fa-file-excel-o"></span> Exporter Excel</button> 
            </form> 

    </div>
    
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    
    <link rel="stylesheet" type="text/css" href="/Content/font-awesome/css/font-awesome.min.css" />
    <div class="table-container" id="table-container">
        <table class="table table-hover opacity-div" id="exportTable">
            <thead class=" opacity text-light">
                <tr>
                    <th class="align-middle text-center ">Num DSICG</th>
                    <th class="align-middle text-center">Date DSICG</th>
                    <th class="align-middle text-center">Num BO</th>
                    <th class="align-middle text-center">Date BO</th>
                    <th class="align-middle text-center">Type Expiditeur</th>
                    <th class="align-middle text-center">Expiditeur Administration</th>
                    <th class="align-middle text-center">Expiditeur Personne</th>
                    <th class="align-middle text-center">Annex </th>
                    <th class="align-middle text-center">Objet</th>
                    <th class="align-middle text-center">Theme</th>
                    <th class="align-middle text-center">Type</th>
                    <th class="align-middle text-center">Observation</th>
                    <th class="align-middle text-center">Travail Effectue</th>
                    <th class="align-middle text-center">Actions</th>
                </tr>
            </thead>
            <tbody >
                @if($courrier->count() > 0)
                    @foreach($courrier as $cr)
                        <tr class="scrolling-wrapper text-light" >
                            <td class="align-middle text-center">{{ $cr->NDSICG }}</td>
                            <td class="align-middle text-center">{{ $cr->dateDSICG }}</td>
                            <td class="align-middle text-center">{{ $cr->NumBO }}</td>
                            <td class="align-middle text-center">{{ $cr->DateBO }}</td>
                            <td class="align-middle text-center">{{ $cr->typeExpiditeur }}</td>  
                            @if($cr->expiditeurAD)
                                <td class="align-middle text-center">{{ $cr->expiditeurAD }}</td>
                            @else
                                <td class="align-middle text-center"></td>
                            @endif
                            @if($cr->expiditeurPER)
                                <td class="align-middle text-center">{{ $cr->expiditeurPER }}</td>
                            @else
                                <td class="align-middle text-center"></td>
                            @endif 
                            <td class="align-middle text-center">{{ $cr->Annex }}</td>  
                            <td class="align-middle text-center">{{ $cr->objet }}</td>  
                            <td class="align-middle text-center">{{ $cr->theme }}</td>  
                            <td class="align-middle text-center">{{ $cr->type }}</td>  
                            <td class="align-middle text-center">{{ $cr->observation }}</td>  
                            <td class="align-middle text-center">{{ $cr->travailEFF }}</td>  
                            <td class="align-middle text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('products.show', $cr->NDSICG) }}" type="button" class="btn btn-secondary">Détail</a>
                                    <a href="{{ route('products.edit', $cr->NDSICG)}}" type="button" class="btn btn-warning">Modifier</a>
                                    <form action="{{ route('products.destroy', $cr->NDSICG) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger m-0">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                
                @else
                        <tr>
                            <td class="text-center" colspan="14">Product not found</td>
                        </tr>
                @endif
            </tbody>
            
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    document.getElementById("exportButton").addEventListener("click", function () {
                        var table = document.getElementById("exportTable");
                        var html = table.outerHTML;
            
                        var tableClone = table.cloneNode(true);
                        var actionColumnIndex = Array.from(tableClone.querySelectorAll('th')).findIndex(th => th.textContent.trim() === 'Actions');
                        if (actionColumnIndex !== -1) {
                            tableClone.querySelectorAll('tr').forEach(row => row.removeChild(row.children[actionColumnIndex]));
                        }
            
                        var url = 'data:application/vnd.ms-excel,' + encodeURIComponent(tableClone.outerHTML);
                        var downloadLink = document.createElement("a");
                        document.body.appendChild(downloadLink);
                        downloadLink.href = url;
                        downloadLink.download = "CourrierExcel.xls";
                        downloadLink.click();
                        document.body.removeChild(downloadLink);
                    });
                });
            </script>
            <script>
                function saveInputValues() {
                    var inputs = document.querySelectorAll('input[type="text"], input[type="date"], select');
                    inputs.forEach(input => {
                        localStorage.setItem(input.id, input.value);
                    });
                }
            
                function loadInputValues() {
                    var inputs = document.querySelectorAll('input[type="text"], input[type="date"], select');
                    inputs.forEach(input => {
                        var storedValue = localStorage.getItem(input.id);
                        if (storedValue) {
                            input.value = storedValue;
                        }
                    });
                }
            
                document.addEventListener("DOMContentLoaded", function () {
                    loadInputValues();
            
                    document.getElementById("filterForm").addEventListener("submit", function () {
                        saveInputValues();
                    });
                });

                function clearInputValues() {
                    var inputs = document.querySelectorAll('input[type="text"], input[type="date"], select');
                    inputs.forEach(input => {
                        localStorage.removeItem(input.id);
                    });
                }   
                function clearInputValuesAndSubmit() {
                    var inputs = document.querySelectorAll('input[type="text"], input[type="date"], select');
                    inputs.forEach(input => {
                        input.value = ''; 
                        localStorage.removeItem(input.id); 
                    });
                    document.getElementById('filterForm').submit(); 
                }        
            </script>
            
            
        </table>
    </div>   
@endsection 
