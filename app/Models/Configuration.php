<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Configuration
 *
 * @property int $id
 * @property string $configuration_title
 * @property string|null $configuration_configuration_value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration query()
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereConfigurationTitle($configuration_value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereConfigurationconfiguration_value($configuration_value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereCreatedAt($configuration_value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereId($configuration_value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereUpdatedAt($configuration_value)
 * @mixin \Eloquent
 * @property string|null $configuration_value
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereConfigurationValue($value)
 */
class Configuration extends Model
{
    const APP_NAME = "app_name";
    const APP_VERSION = "app_version";
    const APP_VERSION_NUMBER = "app_version_number";

    use HasFactory;

    protected $guarded = [];


    /** @return array */
    public static function get_all_config(){
        $configurations = self::all();
        $data = [];
        foreach($configurations as $conf){
            $data[$conf->configuration_title] = $conf->configuration_value;
        }
        return $data;
    }

     /** @return array */
     public static function get_multiple_config(array $configuration_titles){
        $configurations = self::whereIn('configuration_title', $configuration_titles)->get();
        $data = [];
        foreach($configurations as $conf){
            $data[$conf->configuration_title] = $conf->configuration_value;
        }
        return $data;
    }

    /** @return string */
    public static function get_config($configuration_title){
        $config = self::firstWhere('configuration_title', $configuration_title);
        return $config?->configuration_value;
    }

    /** @return void */
    public static function set_config($configuration_title, $configuration_value){
        $config = self::firstWhere('configuration_title', $configuration_title);
        $config->configuration_value = $configuration_value;
        $config->save();
    }

    /** @return array */
    public static function get_config_array($configuration_title){
        $config = self::firstWhere('configuration_title', $configuration_title);
        return json_decode($config?->configuration_value,true);
    }
}
