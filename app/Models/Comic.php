<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;
    public $timestamps = false;

        // se non lo mettete da errore quando tentate il mass assignment
    // se lo mettete e cercate di assegnare un valore a un campo non in lista
    // non da errore ma ignora il campo
    // protected $fillable = ['titolo', 'src', 'tipo', 'cottura', 'peso'];
}
