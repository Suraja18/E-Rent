<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseDescription extends Model
{
    use HasFactory;
    protected $fillable = [
        'case_id',
        'icon',
        'heading',
        'description',
    ];
    public function useCase()
    {
        return $this->belongsTo(UseCases::class, 'case_id');
    }
}
