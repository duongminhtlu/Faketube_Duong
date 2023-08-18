<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    protected $primaryKey = 'channelId'; // Set the primary key field name

    protected $fillable = [
        'channelName',
        'description',
        'subscribersCount',
        'URL',
    ];
}
