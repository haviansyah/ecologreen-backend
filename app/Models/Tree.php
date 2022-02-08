<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Tree
 *
 * @property int $id
 * @property int $tree_species_id
 * @property float $lon
 * @property float $lat
 * @property string $planting_date
 * @property int $plant_location_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Tree newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tree newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tree query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tree whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tree whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tree whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tree whereLon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tree wherePlantLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tree wherePlantingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tree whereTreeSpeciesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tree whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $uuid
 * @property-read \App\Models\PlantLocation $plantLocation
 * @property-read \App\Models\TreeSpecies $treeSpecies
 * @method static \Illuminate\Database\Eloquent\Builder|Tree whereUuid($value)
 * @property string $tree_id
 * @method static \Illuminate\Database\Eloquent\Builder|Tree whereTreeId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PlantTreeTransaction[] $transaction
 * @property-read int|null $transaction_count
 */
class Tree extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'planting_date' => 'date:Y-m-d'
    ];

    /**
     * Get the treeSpecies that owns the Tree
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function treeSpecies(): BelongsTo
    {
        return $this->belongsTo(TreeSpecies::class);
    }

    /**
     * Get the plantLocation that owns the Tree
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plantLocation(): BelongsTo
    {
        return $this->belongsTo(PlantLocation::class);
    }

    /**
     * The transaction that belong to the Tree
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function transaction(): BelongsToMany
    {
        return $this->belongsToMany(PlantTreeTransaction::class, 'transaction_tree', 'tree_id', 'plant_tree_transaction_id');
    }
}
