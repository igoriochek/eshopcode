<?php

namespace App\Repositories;

use App\Models\ProductMeat;
use App\Repositories\BaseRepository;

/**
 * Class ProductMeatRepository
 * @package App\Repositories
 * @version April 28, 2023, 8:25 am UTC
*/

class ProductMeatRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'default'
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
        return ProductMeat::class;
    }


}
