<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    protected $fillable = [
        'container',
        'type',
        'start_at',
        'end_at',
    ];

    public function getContainer()
    {
        return $this->hasOne(Container::class, 'id', 'container')->first();
    }

    public function getType()
    {
        return $this->hasOne(MovementType::class, 'id', 'type')->first();
    }

    public function updateOrCreateMovement($request, $id = null)
    {
        return $this->updateOrCreate(
            ['id' => $id],
            [
                'container' => $request->container,
                'type' => $request->type,
                'start_at' => $request->start_at,
                'end_at' => $request->end_at,
            ]
        );
    }
}
