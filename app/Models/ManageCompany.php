<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Malico\LaravelNanoid\Eloquent\InteractsWithNanoid;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ManageCompany extends Model
{
    use HasFactory;
    //use InteractsWithNanoid;
    protected $table = 'company';
    // protected $dateFormat = 'Y-m-d H:i:s';

    protected $primaryKey = 'company_id';
    public $incrementing = false;

    protected $nanoidLength = 16;

    // protected $fillable = ['*'];

    const CREATED_AT = 'company_created_at';
    const UPDATED_AT = 'company_updated_at';

    // public static function generateExampleid(int $length = 16): string
    // {
    //     $example_id = Str::random($length);//Generate random string
    //     $exists = DB::table('examples')
    //         ->where('example_id', '=', $example_id)
    //         ->get(['example_id']);//Find matches for id = generated id
    //     if (isset($exists[0]->example_id)) {//id exists in users table
    //         return self::generateExampleid();//Retry with another generated id
    //     }

    //     return $example_id;//Return the generated id as it does not exist in the DB
    // }

//    protected static function boot(): void
//    {
//        parent::boot();
//
//        static::creating(function (self $model): void {
//            $model->{$model->getKeyName()} = $model->generateNanoid();
//        });
//    }

}
