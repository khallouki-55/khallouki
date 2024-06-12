@extends('layouts.app')
  
@section('title')
  
@section('contents')
    <h1 class="font-weight-bold mb-0" style="color: rgb(1, 1, 1);">{{ isset($expiditeur) ? 'Modifie Expiditeur' : 'Ajoute Expiditeur' }}</h1>
    <style>
        .opacity-div {
            background-color: rgba(6, 6, 6, 0.392); /* Adjust the alpha value (0.5 for 50% opacity) as needed */
            border-radius: 10px; 
            padding: 20px;
        }
        
    </style>
    <hr />
    <form action="{{ isset($expiditeur) ? route('admin.update', ['var' => 'typeEX', 'id' => $expiditeur->idEx]) : route('admin.store', ['var' => 'typeEX']) }}" method="POST">
        @csrf
        @if(isset($expiditeur))
            @method('PUT')
        @endif
        <div class="opacity-div">
            <h1>{{ isset($expiditeur) ? 'Modifie Expiditeur' : 'Ajoute Expiditeur' }}</h1><br>
            <label for="annex">Expiditeur</label>
            <input class="form-control" type="text" name="typeEX" value="{{ isset($expiditeur) ? $expiditeur->typeEX : '' }}" required><br>
            <input type="submit" class="btn btn-{{ isset($expiditeur) ? 'warning' : 'primary' }} d-grid gap-2" value="{{ isset($expiditeur) ? 'Modifie' : 'Ajouter' }}">
            @if(isset($expiditeur))
                <a href="{{ route('admin.index', ['var' => 'typeEX']) }}" class="btn btn-secondary d-grid gap-2">Annuler</a>
            @endif
        </div>
    </form>
    
@endsection
