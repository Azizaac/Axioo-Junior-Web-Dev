<?php

namespace App\Models;

use CodeIgniter\Model;

class FilmModel extends Model
{
    protected $table = 'listfilm';
    protected $useTimestamps = false;
    protected $allowedFields = [
        'slug',
        'judul',
        'sutradara',
        'synopsis',
        'cover',
        'created_at',
        'updated_at'
    ];
    
    public function getFilm($slug = false){
        if ($slug == false){
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}
