<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
    use HasFactory;

    protected $fillable = [
        'friends_id',
        'latitude',
        'longitude',
    ];

    /**
     * @param int $friendId
     * @return void
     */
    public function deleteByFriendId(int $friendId): void
    {
        $this->newInstance()
            ->where('friends_id', $friendId)
            ->delete();
    }

    /**
     * @param int $friendId
     * @param float $latitude
     * @param float $longitude
     * @return self
     */
    public function store(int $friendId, float $latitude, float $longitude): self
    {
        $pin = $this->newInstance();
        $pin->fill([
            'friends_id' => $friendId,
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);
        $pin->save();

        return $pin;
    }

    public function friend()
    {
        return $this->hasOne(Friend::class, 'id', 'friends_id');
    }
}
