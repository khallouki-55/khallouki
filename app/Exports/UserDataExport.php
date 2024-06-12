<?php

namespace App\Exports;

use\App\Models\Courrier;
use Illuminate\Contracts\view\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersDataEport implements FromView, ShouldAutoSize
{
    use Exportable;
    private $user;

    public function __construct(){
        $this->user = Courrier::All();
    }

    public function view(){
        return view('products',['user' => $this->user]);

    }
}