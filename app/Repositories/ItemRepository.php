<?php
namespace App\Repositories;
use App\Models\Item;

class ItemRepository
{
    /**
     * @return Item
     */
    public function save(array $data): Item
    {
        return Item::create($data);
    }
}