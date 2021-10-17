<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;

    protected $fillable = [
        'client',
        'number',
        'type',
        'status',
        'category',
    ];

    public function updateOrCreateContainer($request, $id = null)
    {
        return $this->updateOrCreate(
            ['id' => $id],
            [
                'client' => $request->client,
                'number' => $request->number,
                'type' => $request->type,
                'status' => $request->status,
                'category' => $request->category,
            ]
        );
    }
}
