<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\BannedUser
 *
 * @property int $id
 * @property string $google_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BannedUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BannedUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BannedUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BannedUser whereGoogleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BannedUser whereId($value)
 * @mixin \Eloquent
 */
class BannedUser extends Model
{
    protected $table = 'banned_users';

    protected $fillable = [
        'id', 'google_id',
    ];

    function is_banned($google_id){
        $course = BannedUser::whereGoogleId($google_id)->get()->first();
        if(empty($course)){
            return false;
        } else {
            return true;
        }
    }
}
