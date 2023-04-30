<?php

namespace App\Repositories;

use App\Models\PaidAccessory;
use App\Repositories\BaseRepository;

/**
 * Class PaidAccessoryRepository
 * @package App\Repositories
 * @version April 28, 2023, 8:25 am UTC
*/

class PaidAccessoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'price'
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
        return PaidAccessory::class;
    }


}
