<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LOCATAIRE extends Model
{
    use HasFactory;

    protected $table = 'l_o_c_a_t_a_i_r_e_s';

    protected $fillable = [
        'name',
        'lastname',
        'ville',
        'cni',
        'email',
        'number',
        'date',
    ];
}
