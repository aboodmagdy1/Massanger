<?php

namespace Modules\Chat\app\Models;

use App\Models\User;
use Modules\Chat\app\Models\Message;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
        use HasFactory;

        protected $fillable = [
            'name',
            'description',
            'owner_id',
            'last_message_id',
        ];

        public function owner(): BelongsTo
        {
            return $this->belongsTo(User::class, 'owner_id');
        }

        public function lastMessage(): BelongsTo
        {
            return $this->belongsTo(Message::class, 'last_message_id');
        }

        public function users(): BelongsToMany
        {
            return $this->belongsToMany(User::class, 'group_users', 'group_id', 'user_id');
        }

        public function messages(): HasMany
        {
            return $this->hasMany(Message::class, 'group_id');
        }

}
