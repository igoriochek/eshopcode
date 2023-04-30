<?php

namespace App\Repositories;

use App\Models\ProductSauce;
use App\Repositories\BaseRepository;

/**
 * Class ProductSauceRepository
 * @package App\Repositories
 * @version April 28, 2023, 8:25 am UTC
*/

class ProductSauceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'color',
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
        return ProductSauce::class;
    }


}
