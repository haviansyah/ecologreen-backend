<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\TreeCatalog
 *
 * @property int $id
 * @property int $tree_species_id
 * @property int $plant_location_id
 * @property float $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCatalog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCatalog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCatalog query()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCatalog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCatalog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCatalog wherePlantLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCatalog wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCatalog whereTreeSpeciesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCatalog whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $image
 * @property-read int|null $image_count
 * @property-read \App\Models\PlantLocation $plantLocation
 * @property-read \App\Models\TreeSpecies $treeSpecies
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCatalog whereStatus($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $images
 * @property-read int|null $images_count
 * @method static \Database\Factories\TreeCatalogFactory factory(...$parameters)
 */
class TreeCatalog extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the treeSpecies that owns the TreeCatalog
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function treeSpecies(): BelongsTo
    {
        return $this->belongsTo(TreeSpecies::class);
    }

    /**
     * Get the plantLocation that owns the TreeCatalog
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plantLocation(): BelongsTo
    {
        return $this->belongsTo(PlantLocation::class);
    }

    /**
     * The images that belong to the TreeCatalog
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function images(): BelongsToMany
    {
        return $this->belongsToMany(File::class, 'tree_catalog_images', 'tree_catalog_id', 'file_id');
    }
}
