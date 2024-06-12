@extends('layouts.app')
  
@section('title')
  
@section('contents')
    <h1 class="font-weight-bold mb-0" style="color: rgb(1, 1, 1);">{{ isset($type) ? 'Modifie Type' : 'Ajoute Type' }}</h1>
    <style>
        .opacity-div {
            background-color: rgba(6, 6, 6, 0.392); 
            border-radius: 10px; 
            padding: 20px;
        }
    </style>
    <hr />
    <form action="{{ isset($type) ? route('admin.update', ['var' => 'type', 'id' => $type->idtype]) : route('admin.store', ['var' => 'type']) }}" method="POST">
        @csrf
        @if(isset($type))
            @method('PUT')
        @endif
        <div class="opacity-div">
            <h1>{{ isset($type) ? 'Modifie Type' : 'Ajoute Type' }}</h1><br>
            <label for="type">Type</label>
            <input class="form-control" type="text" name="type" value="{{ isset($type) ? $type->type : '' }}" required><br>
            <input type="submit" class="btn btn-{{ isset($type) ? 'warning' : 'primary' }} d-grid gap-2" value="{{ isset($type) ? 'Modifie' : 'Ajouter' }}">
            @if(isset($type))
                <a href="{{ route('admin.index', ['var' => 'type']) }}" class="btn btn-secondary d-grid gap-2">Annuler</a>
            @endif
        </div>
    </form>
    
@endsection
