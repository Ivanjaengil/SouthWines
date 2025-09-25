<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioPendiente extends Model
{
    protected $table = 'usuarios_pendientes';
    
    public $timestamps = false;
    
    protected $guarded = [];
}