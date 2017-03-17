<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Menues
 * @package App\Models
 * @version February 27, 2017, 5:50 am UTC
 */
class Menues extends Model
{
    use SoftDeletes;
    public $table = 'menues';
    const Noraml = 1;
    const Hidden = 2;
    protected $dates = ['deleted_at'];
    public $fillable = [
        'name',
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [

    ];
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'exit',
    ];

    public static function getMenus()
    {
        $menus       = self::where('state', Menues::Noraml)->orderBy('sort', 'asc')->get();
        $menues      = $menus->sortBy('parent_id')->groupBy('parent_id');
        $menusFirst  = collect([]);
        $menusSecond = collect([]);
        if ($menues->has(0)) {
            $menusFirst  = $menues->shift()->sortBy(['sort', 'id']);
            $menusSecond = $menues->collapse()->groupBy('parent_id')->sortBy(['sort', 'id']);
        }
        return compact('menusFirst', 'menusSecond');
    }
}
