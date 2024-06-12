@extends('layouts.app')
  
@section('title',)
  
@section('contents')
    <h1 class="font-weight-bold mb-0" style="color: rgb(1, 1, 1);">{{ isset($annex) ? 'Modifie Annex' : 'Ajoute Annex' }}</h1>
    <style>
        .opacity-div {
            background-color: rgba(6, 6, 6, 0.392); /* Adjust the alpha value (0.5 for 50% opacity) as needed */
            border-radius: 10px; 
            padding: 20px;
        }
    </style>
    <hr />

    <form action="{{ isset($annex) ? route('admin.update', ['var' => 'annex', 'id' => $annex->idannex]) : route('admin.store', ['var' => 'annex']) }}" method="POST">
        @csrf
        @if(isset($annex))
            @method('PUT')
        @endif
        <div class="opacity-div">
            <h1>{{ isset($annex) ? 'Modifie Annex' : 'Ajoute Annex' }}</h1><br>
            <label for="annex">Annex</label>
            <input class="form-control" type="text" name="annex" value="{{ isset($annex) ? $annex->annex : '' }}" required><br>
            <input type="submit" class="btn btn-{{ isset($annex) ? 'warning' : 'primary' }} d-grid gap-2" value="{{ isset($annex) ? 'Modifie' : 'Ajouter' }}">
            @if(isset($annex))
                <a href="{{ route('admin.index', ['var' => 'annex']) }}" class="btn btn-secondary d-grid gap-2">Annuler</a>
            @endif
        </div>
    </form>
    
    
@endsection
