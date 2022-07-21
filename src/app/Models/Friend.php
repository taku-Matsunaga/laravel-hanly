<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    private const SEARCH_LIMIT_MINUTES = 5;

    protected $fillable = [
        'nickname', 'email', 'password', 'image_path'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @param int $friendId
     * @return self|null
     */
    public function findById(int $friendId): ?self
    {
        return $this->newInstance()
            ->with(['pin'])
            ->find($friendId);
    }

    /**
     * @param array $friendIds
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByIds(array $friendIds): Collection
    {
        return $this->newInstance()
            ->with(['pin'])
            ->whereIn('id', $friendIds)
            ->get();
    }

    /**
     * @param int $myId
     * @param array $myFriendIds
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function notFriendsWithPin(int $myId, array $myFriendIds): Collection
    {
        return $this->newInstance()
            ->with(['pin'])
            ->where('id', '<>', $myId)
            ->whereNotIn('id', $myFriendIds)
            ->whereHas('pin', function ($query) {
                $query->where('created_at', '>=', now()->subMinutes(self::SEARCH_LIMIT_MINUTES));
            })
            ->get();
    }

    /**
     * @param string $email
     * @param string $password
     * @param string $nickname
     * @return self
     */
    public function store(string $email, string $password, string $nickname): self
    {
        return $this->newInstance()
            ->create([
                'email' => $email,
                'password' => bcrypt($password),
                'nickname' => $nickname,
            ]);
    }

    /**
     * @param int $myId
     * @param string $path
     * @return bool
     */
    public function imageStore(int $myId, string $path): bool
    {
        return $this->newInstance()
            ->find($myId)
            ->fill([
                'image_path' => $path,
            ])
            ->save();
    }

    public function relationship()
    {
        return $this->hasMany(FriendsRelationship::class, 'own_friends_id', 'id');
    }

    public function pin()
    {
        return $this->hasOne(Pin::class, 'friends_id', 'id');
    }
}
