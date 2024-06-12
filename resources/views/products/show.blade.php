
@extends('layouts.app')
  
@section('title')
  
@section('contents')
    <h1 class="mb-0">Detail Courrier</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Num DSICG</label>
            <input type="text" name="NDSICG" class="form-control"  value="{{ $courrier->NDSICG }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Date DSICG</label>
            <input type="text" name="dateDSICG" class="form-control"  value="{{ $courrier->dateDSICG }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Num BO</label>
            <input type="text" name="NumBO" class="form-control"  value="{{ $courrier->NumBO }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Date BO</label>
            <input type="text" name="DateBO" class="form-control"  value="{{ $courrier->DateBO }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Type Expéditeur</label>
            <input type="text" name="typeExpiditeur" class="form-control" placeholder="Created At" value="{{ $courrier->typeExpiditeur }}" readonly>
        </div>
        @if($courrier->typeExpiditeur == 'Administration')
            <div class="col mb-3">
                <label class="form-label">Expéditeur Administration</label>
                <input type="text" name="expiditeurAD" class="form-control" value="{{ $courrier->expiditeurAD }}" readonly>
            </div>
        @elseif($courrier->typeExpiditeur == 'Personne')
            <div class="col mb-3">
                <label class="form-label">Expéditeur Personne</label>
                <input type="text" name="expiditeurPER" class="form-control" value="{{ $courrier->expiditeurPER }}" readonly>
            </div>
        @endif
    </div>
    
    <div class="row">    
        <div class="col mb-3">
            <label class="form-label">Objet</label>
            <input type="text" name="objet" class="form-control" value="{{ $courrier->objet }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Theme</label>
            <input type="text" name="theme" class="form-control"  value="{{ $courrier->theme }}" readonly>
        </div>
    </div>
    <div class="row">   
        <div class="col mb-3">
            <label class="form-label">Annex</label>
            <input type="text" name="Annex" class="form-control" value="{{ $courrier->Annex }}" readonly>
        </div> 
        <div class="col mb-3">
            <label class="form-label">Type</label>
            <input type="text" name="type" class="form-control" value="{{ $courrier->type }}" readonly>
        </div>
    </div> 
    <div class="row">   
        <div class="col mb-3">
            <label class="form-label">Observation</label>
            <textarea class="form-control" name="observation" placeholder="Descriptoin" readonly>{{ $courrier->observation }}</textarea>
        </div>
    </div>
    <div class="row">    
        <div class="col mb-3">
            <label class="form-label">Travail Effectue</label>
            <textarea class="form-control" name="travailEFF" placeholder="Descriptoin" readonly>{{ $courrier->travailEFF }}</textarea>
        </div>
    </div>
    
    <a href={{ route('products') }}>
        <button class="btn btn-primary">Retour à la liste des articles</button>
    </a>
@endsection