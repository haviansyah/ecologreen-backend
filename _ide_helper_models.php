<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\CanopyShape
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CanopyShape newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CanopyShape newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CanopyShape query()
 * @method static \Illuminate\Database\Eloquent\Builder|CanopyShape whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CanopyShape whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CanopyShape whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CanopyShape whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CanopyShape whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class CanopyShape extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Configuration
 *
 * @property int $id
 * @property string $configuration_title
 * @property string|null $configuration_value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration query()
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereConfigurationTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereConfigurationValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereUpdatedAt($value)
 */
	class Configuration extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\File
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string $file_address
 * @property string|null $thumbnail_address
 * @property int $is_temporary
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File query()
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFileAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereIsTemporary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereThumbnailAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class File extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Log
 *
 * @property int $id
 * @property string $subject
 * @property string $url
 * @property string $method
 * @property string|null $ip
 * @property string|null $agent
 * @property int|null $error_code
 * @property string|null $error_message
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Log newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Log newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Log query()
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereErrorCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereErrorMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereUserId($value)
 */
	class Log extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PaymentConfirmation
 *
 * @property int $id
 * @property int $plant_tree_transaction_id
 * @property float $payment_total
 * @property string $transaction_date
 * @property string|null $note
 * @property int|null $file_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentConfirmation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentConfirmation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentConfirmation query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentConfirmation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentConfirmation whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentConfirmation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentConfirmation whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentConfirmation wherePaymentTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentConfirmation wherePlantTreeTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentConfirmation whereTransactionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentConfirmation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class PaymentConfirmation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PaymentStatus
 *
 * @property int $id
 * @property string $name
 * @property int $is_finished
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus whereIsFinished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class PaymentStatus extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PlantLocation
 *
 * @property int $id
 * @property int $plant_location_type_id
 * @property string $name
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocation query()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocation whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocation wherePlantLocationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class PlantLocation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PlantLocationType
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocationType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocationType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocationType query()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocationType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocationType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocationType whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocationType whereName($value)
 */
	class PlantLocationType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PlantTreeTransaction
 *
 * @property int $id
 * @property string $code
 * @property int $user_id
 * @property int $tree_catalog_id
 * @property int $quantity
 * @property float $unit_price
 * @property int $unique_code
 * @property int $payment_status_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction wherePaymentStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction whereTreeCatalogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction whereUniqueCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction whereUserId($value)
 * @mixin \Eloquent
 */
	class PlantTreeTransaction extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Profile
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $gender
 * @property string|null $phone_number
 * @property string|null $birthday
 * @property string|null $address
 * @property int|null $picture_file_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile wherePictureFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUserId($value)
 * @mixin \Eloquent
 */
	class Profile extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Tree extends \Eloquent {}
}

namespace App\Models{
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
 */
	class TreeCatalog extends \Eloquent {}
}

namespace App\Models{
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
 */
	class TreeCatalogImage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TreeCondition
 *
 * @property int $id
 * @property int $tree_id
 * @property float $height
 * @property float $dbh
 * @property float $crown_width
 * @property int $top_disease_id
 * @property int $bottom_disease_id
 * @property int $mechanic_disease_id
 * @property string $inspection_at
 * @property int|null $inspector_user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition query()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition whereBottomDiseaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition whereCrownWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition whereDbh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition whereInspectionAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition whereInspectorUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition whereMechanicDiseaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition whereTopDiseaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition whereTreeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class TreeCondition extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TreeDiseaseRate
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property int $rate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TreeDiseaseRate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeDiseaseRate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeDiseaseRate query()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeDiseaseRate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeDiseaseRate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeDiseaseRate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeDiseaseRate whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeDiseaseRate whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeDiseaseRate whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class TreeDiseaseRate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TreeOwning
 *
 * @property int $id
 * @property int|null $user_id
 * @property int $tree_species_id
 * @property int $plant_location_id
 * @property string $owned_at
 * @property string|null $expired_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TreeOwning newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeOwning newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeOwning query()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeOwning whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeOwning whereExpiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeOwning whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeOwning whereOwnedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeOwning wherePlantLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeOwning whereTreeSpeciesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeOwning whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeOwning whereUserId($value)
 * @mixin \Eloquent
 */
	class TreeOwning extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TreeSpecies
 *
 * @property int $id
 * @property string $local_name
 * @property string $scientific_name
 * @property float $sequestration
 * @property float $max_height
 * @property float $max_crown_width
 * @property int $canopy_shape_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TreeSpecies newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeSpecies newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeSpecies query()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeSpecies whereCanopyShapeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeSpecies whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeSpecies whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeSpecies whereLocalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeSpecies whereMaxCrownWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeSpecies whereMaxHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeSpecies whereScientificName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeSpecies whereSequestration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeSpecies whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $about
 * @method static \Illuminate\Database\Eloquent\Builder|TreeSpecies whereAbout($value)
 */
	class TreeSpecies extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property int $role_id
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Role $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

