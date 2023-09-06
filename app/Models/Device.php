<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Filters\Types\WhereDateStartEnd;
use Orchid\Screen\AsSource;

class Device extends Model
{
    use HasFactory;
    use AsSource,Filterable;

    protected $guarded = ['id'];
    protected $perPage = 15;

    // protected $fillable = [
    //     'name',
    //     'number'
    // ];

    protected $allowedFilters = [
        'id' => Where::class,
        'name' => Like::class,
        'number' => Like::class,
        'description' => Like::class,
        'status' => Like::class,
        'created_at' => WhereDateStartEnd::class,
        'updated_at' => WhereDateStartEnd::class,
    ];

    protected $allowedSorts = [
        'id',
        'name',
        'number',
        'description',
        'status',
        'created_at',
        'updated_at',
    ];

    public function scopeGetName($query, $id)
    {
        $query->where('id',$id);
    }
}
