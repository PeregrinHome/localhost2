<?php

namespace App\Models\Users;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_name', 'email', 'password', 'l_name', 'm_name', 'phone', 'sex',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @param Builder $query
     * @param array $frd
     * @return Builder
     */
    public function scopeFilter(Builder $query, array $frd): Builder
    {
        $fillable = $this->fillable;
        foreach ($frd as $key => $value)
        {
            if ($value === null)
            {
                continue;
            }
            switch ($key)
            {
                case 'sex':
                    {
                        $query->where('sex', $value);
                    }
                    break;
                case 'search':
                    {
                        $query->filterSearch($value);
                    }
                    break;
                default:
                    {
                        if (in_array($key, $fillable))
                        {
                            $query->where($key, $value);
                        }
                    }
                    break;
            }
        }

        return $query;
    }
    public function scopeFilterSearch(Builder $query, $searchData): Builder
    {
        $searchArray = explode(' ', $searchData);

        foreach ($searchArray as $searchData)
        {
            $query->where(function ($query) use ($searchData) {

                $query->orWhere('f_name', 'like', '%' . $searchData . '%')
                    ->orWhere('l_name', 'like', '%' . $searchData . '%')
                    ->orWhere('m_name', 'like', '%' . $searchData . '%')
                    ->orWhere('phone', 'like', '%' . $searchData . '%')
                    ->orWhere('email', 'like', '%' . $searchData . '%');

            });
        }

        return $query;
    }
}
