
@extends('layouts.app')
  
@section('title')
  
@section('contents')
    <h1 class="font-weight-bold mb-0" style="color: rgb(1, 1, 1);">{{ isset($user) ? 'Modifie Utilisateur' : 'Ajoute Utilisateur' }}</h1>
    <style>
        .opacity-div {
      background-color: rgba(6, 6, 6, 0.392); /* Adjust the alpha value (0.5 for 50% opacity) as needed */
      border-radius: 10px; 
      padding: 20px;
    }
    </style>
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
    <form action="{{ isset($user) ? route('admin.update', ['var' => 'user', 'id' => $user->id]) : route('admin.store', ['var' => 'user']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($user))
            @method('PUT')
        @endif
        <input type="hidden" value="user" name="var">
        <div class="opacity-div">
            <div class="row mb-3 mt-3 ">
                <div class="col-md-4">
                    <label for="exampleSelect">Name :</label>
                </div>
                <div class="col-md-8">
                    <input type="text" name="name" value="{{ isset($user) ? $user->name : '' }}" class="form-control"  required>
                </div>
            </div>
            <div class="row mb-3 mt-3">
                <div class="col-md-4">
                    <label for="exampleSelect">Email :</label>
                </div>
                <div class="col-md-8">
                    <input type="Email" name="email" value="{{ isset($user) ? $user->email : '' }}" class="form-control"  required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                  <label for="exampleSelect">Type Users :</label>
                </div>
                <div class="col-md-8">
                  <select class="form-control" name="typeExpiditeur" id="exampleSelect" required>
                    <option selected disabled ></option>
                    <option value="admin" @if(isset($user) && $user->typeUser =='admin') selected @endif>Admin</option>
                    <option value="user" @if(isset($user) && $user->typeUser =='user') selected @endif>Utilisateur</option>
                  </select>
                </div>
            </div>
            <div class="row mb-3 mt-3">
                <div class="col-md-4">
                    <label for="exampleSelect">Password :</label>
                  </div>
                  <div class="col-md-8">
                    <input type="password" name="password" value="{{ isset($user) ? $user->password : '' }}" class="form-control" required >
                </div>
            </div>
            <div class="row">
                <div class="d-grid">
                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                    <input type="submit" class="btn btn-{{ isset($user) ? 'warning' : 'primary' }} d-grid gap-2" value="{{ isset($user) ? 'Modifie' : 'Ajouter' }}">
                    @if(isset($user))
                        <a href="{{ route('admin.index', ['var' => 'user']) }}" class="btn btn-secondary d-grid gap-2">Annuler</a>
                    @endif
                </div>
                
            </div>
        </div>
    </form>
    
@endsection
