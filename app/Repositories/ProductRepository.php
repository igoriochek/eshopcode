<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductSizePrice;
use App\Repositories\BaseRepository;

/**
 * Class ProductRepository
 * @package App\Repositories
 * @version March 15, 2022, 5:41 pm UTC
*/

class ProductRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'price',
        'count',
        'description',
        'image',
        'video',
        'visible',
        'promotion_id',
        'discount_id'
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
        return Product::class;
    }

    public function all($search = [], $skip = null, $limit = null, $columns = ['*'])
    {
        $query = $this->allQuery($search, $skip, $limit);

        return $query->get($columns);
    }

    public function getProductSizesPrices($productId)
    {
        return ProductSizePrice::query()
            ->where('product_id', $productId)
            ->get();
    }

    public function deleteProductSizesPrices($productId)
    {
        ProductSizePrice::query()
            ->where('product_id', $productId)
            ->delete();
    }
}
