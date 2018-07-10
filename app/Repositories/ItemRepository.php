<?php
namespace App\Repositories;
use App\Models\Item;
use App\Repositories\Contracts\ItemRepositoryContract;

class ItemRepository implements ItemRepositoryContract
{
    protected $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * @return Item
     */
    public function save(array $data): Item
    {
        return $this->item->create($data);
    }

    public function all()
    {
        return $this->item->all();
    }
}