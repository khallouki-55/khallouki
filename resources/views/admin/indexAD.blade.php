
@extends('layouts.app')

@section('title')

@section('contents')
<style>
    .table-container {
        overflow-x: auto;
        /* width: 100%; Vous pouvez ajuster cette valeur selon vos besoins */
    }
    .opacity-div {
      background-color: rgba(6, 6, 6, 0.392); /* Adjust the alpha value (0.5 for 50% opacity) as needed */
      border-radius: 10px; 
      padding: 20px;
    }
    .opacity {
      background-color: rgba(95, 27, 27, 0.613); /* Adjust the alpha value (0.5 for 50% opacity) as needed */
      border-radius: 10px; 
      padding: 20px;
    }   
</style>
    <div >
        <h1 class="font-weight-bold mb-0" style="color: rgb(1, 1, 1);">List des utilisateurs</h1>
    </div>
    <div class="d-flex align-items-center justify-content-between">
            <div>
                <form action="{{ route('admin.create') }}" method="POST">
                    @csrf
                    <input type="hidden" value="user" name="var">
                    <button type="submit"  class="btn bg-gradient-primary text-light">Ajoute un Utilisateur</button><br>
                </form>
            </div>
    </div>
    
    <hr />
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <link rel="stylesheet" type="text/css" href="/Content/font-awesome/css/font-awesome.min.css" />
    <div class="table-container" id="table-container">
        <table class="table table-hover opacity-div" id="exportTable">
            <thead class="opacity table-primary text-light">
                <tr>
                    <th class="align-middle text-center">Name</th>
                    <th class="align-middle text-center">Email</th>
                    <th class="align-middle text-center">Type User</th>
                    <th class="align-middle text-center">Action</th>
                </tr>
            </thead>
            <tbody >
                @if($user->count() > 0)
                    @foreach($user as $cr)
                        <tr class="scrolling-wrapper text-light" >
                            {{-- <td class="align-middle">{{ $loop->iteration }}</td> --}}
                            <td class="align-middle text-center">{{ $cr->name }}</td>
                            <td class="align-middle text-center">{{ $cr->email }}</td>
                            <td class="align-middle text-center">{{ $cr->typeUser }}</td> 
                            <td class="align-middle text-center">
                                 <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('admin.edit',['var' => 'user', 'id' => $cr->id]) }}" type="button" class="btn btn-warning">Modifier</a>
                                    <form action="{{ route('admin.destroy', ['var' => 'shh', 'id' => $cr->id,'nam'=>'dgd']) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
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
            
        
        </table>
    </div>
   
    
   
@endsection 
