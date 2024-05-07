<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    protected $fillable = [
        'nombre',
        'imagen',
        'estado',
        'usuario_id'
    ];

    // Obtener la imagen
     public function getImagenUrl(){
        if($this->imagen && $this->imagen != 'default.png' && $this->imagen != null){
            return asset ('imagenes/categorias/' . $this->imagen);
        } else {
            return asset ('default.png');
        }
    }

    // Relacion con usuarios
    public function usuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }

    // Relacion con posts
    public function posts(){
        return $this->hasMany(Posts::class, 'categoria_id');
    }

}
