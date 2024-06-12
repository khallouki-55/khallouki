@extends('layouts.app')
  
@section('title')
  
@section('contents')
    <h1 class="font-weight-bold mb-0" style="color: rgb(1, 1, 1);">{{ isset($theme) ? 'Modifie Theme' : 'Ajoute Theme' }}</h1>
    <style>
        .opacity-div {
            background-color: rgba(6, 6, 6, 0.392); /* Adjust the alpha value (0.5 for 50% opacity) as needed */
            border-radius: 10px; 
            padding: 20px;
        }
    </style>
    <hr />
    <form action="{{ isset($theme) ? route('admin.update', ['var' => 'theme', 'id' => $theme->idTheme]) : route('admin.store', ['var' => 'theme']) }}" method="POST">
        @csrf
        @if(isset($theme))
            @method('PUT')
        @endif
        <div class="opacity-div">
            <h1>{{ isset($theme) ? 'Modifie Theme' : 'Ajoute Theme' }}</h1><br>
            <label for="theme">Theme</label>
            <input class="form-control" type="text" name="theme" value="{{ isset($theme) ? $theme->theme : '' }}" required><br>
            <input type="submit" class="btn btn-{{ isset($theme) ? 'warning' : 'primary' }} d-grid gap-2" value="{{ isset($theme) ? 'Modifie' : 'Ajouter' }}">
            @if(isset($theme))
                <a href="{{ route('admin.index', ['var' => 'annex']) }}" class="btn btn-secondary d-grid gap-2">Annuler</a>
            @endif
        </div>
    </form>
    
@endsection
