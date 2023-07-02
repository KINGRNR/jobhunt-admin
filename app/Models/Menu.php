<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
 
class Menu extends Model
{
    use HasFactory;

    protected $primaryKey = 'menu_id';

    public static function getRoleMenus($userId)
    {   
        return DB::table('v_role_menus')
            ->where(['menu_active' => 1, 'user_id' => $userId])
            ->orderBy('menu_order')->get();
    }

}