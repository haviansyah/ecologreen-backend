<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TreeCatalogImage
 *
 * @property int $id
 * @property int $tree_catalog_id
 * @property int $file_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCatalogImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCatalogImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCatalogImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCatalogImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCatalogImage whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCatalogImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCatalogImage whereTreeCatalogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCatalogImage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TreeCatalogImage extends Model
{
    use HasFactory;
}
