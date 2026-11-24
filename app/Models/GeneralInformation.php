<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralInformation extends Model
{
    use HasFactory;

    protected $table = 'general_information';

    protected $fillable = [
        'email',
        'phone',
        'address',
        'google_map_link',
        'instagram_link',
        'facebook_link',
        'ticktok_link',
        'header_logo',
        'footer_logo',
        'footer_description',
        'trademark_line',
        'privacy_link',
        'cookie_policy_link',
    ];
}