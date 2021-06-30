<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Buku extends Model
{
    protected $fillable = [
        'judul', 'penulis', 'penerbit','cover'
    ];

    protected $table = 'bukus';
    protected $primaryKey = 'id';
}