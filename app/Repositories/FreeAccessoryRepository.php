<?php

namespace App\Repositories;

use App\Models\FreeAccessory;
use App\Repositories\BaseRepository;

/**
 * Class FreeAccessoryRepository
 * @package App\Repositories
 * @version April 28, 2023, 8:25 am UTC
*/

class FreeAccessoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'product_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FreeAccessory::class;
    }


}
