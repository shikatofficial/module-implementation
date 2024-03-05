<?php

namespace Modules\WhatsappNumCheck\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\WhatsappNumCheck\Database\factories\CsvFactory;

class Csv extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    
    protected $fillable = ['name', 'phone'];
    protected static function newFactory(): CsvFactory
    {
        //return CsvFactory::new();
    }
}
