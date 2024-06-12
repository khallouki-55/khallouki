@extends('layouts.app')
  
@section('title')
  
@section('contents')
    <h1 class="font-weight-bold mb-0" style="color: rgb(1, 1, 1);">Profile</h1>
    <hr />
 
    <style>
        .opacity-div {
      background-color: rgba(6, 6, 6, 0.392); 
      border-radius: 10px; 
      padding: 20px;
    }
    </style>
    <div class="row opacity-div">
        <div class="col-md-12 border-right">
            <div class="p-3 " style="display:contents">
                <div class="row ">
  
                    <div class="col-md-6">
                        <label class="labels">Nom</label>
                        <input type="text" name="name" class="form-control" disabled placeholder="first name" value="{{ auth()->user()->name }}">
                    </div>
                    
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Email</label>
                        <input type="text" name="email" disabled class="form-control" value="{{ auth()->user()->email }}" placeholder="Email">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Type Utilisateur</label>
                        <input type="text" name="email" disabled class="form-control" value="{{ auth()->user()->typeUser }}" placeholder="Email">
                    </div>
                </div>
            
            </div>
        </div>
         
    </div>   
            
        
@endsection