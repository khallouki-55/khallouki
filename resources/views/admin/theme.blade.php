@extends('layouts.app')
  
@section('title')
  
@section('contents')
    <h1 class="font-weight-bold mb-0" style="color: rgb(1, 1, 1);">THEMES</h1>
    <style>
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
    <hr />
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <a href="{{ route('admin.create',['var'=>'theme']) }}" class="btn bg-gradient-primary text-light">Ajoute Theme</a><br>
<br>
    <div class="table-container" id="table-container">
        <table class="table table-hover opacity-div" id="exportTable">
            <thead class="opacity table-primary text-light">
                <tr>
                    <th class="align-middle text-center">Themes</th>
                    <th class="align-middle text-center ">Action</th>
                </tr>
            </thead>
            <tbody >
                @if($theme->count() > 0)
                    @foreach($theme as $cr)
                        <tr class="scrolling-wrapper text-light" >
                            {{-- <td class="align-middle">{{ $loop->iteration }}</td> --}}
                            <td class="align-middle text-center">{{ $cr->theme }}</td>
                            <td class="align-middle text-center">
                                 {{-- <div class="btn-group" role="group" aria-label="Basic example"> --}}
                                    <a href="{{ route('admin.edit', ['var' => 'theme', 'id' => $cr->idTheme]) }}" type="button" class="btn btn-warning">Modifier</a>
                                    <form action="{{ route('admin.destroy', ['var' => 'theme', 'id' => $cr->idTheme,'nam'=>$cr->theme]) }}" method="POST" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
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