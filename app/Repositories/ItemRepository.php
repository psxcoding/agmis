<?php
namespace App\Repositories;
use App\Models\Item;
use App\Repositories\Contracts\ItemRepositoryContract;

/**
 * Class ItemRepository
 * @package App\Repositories
 */
class ItemRepository implements ItemRepositoryContract
{
    protected $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * @param array $data
     * @return Item
     */
    public function save(array $data): Item
    {
        return $this->item->create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        $item = $this->item->findOrFail($id);
        $item->update($data);
        return $item;
    }

    /**
     * @return Item[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->item->all();
    }
}