<?php

namespace App\Services;

use App\Models\Item;
use App\Repositories\ItemRepository;

/**
 * Class ItemService
 * @package App\Services
 */
class ItemService
{
    /**
     * @var ItemRepository
     */
    protected $itemRepository;

    /**
     * ItemService constructor.
     * @param ItemRepository $itemRepository
     */
    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    /**
     * @return Item[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return $this->itemRepository->all();
    }

    /**
     * @param array $input
     * @return Item|null
     */
    public function createItem(array $input): ?Item // null or Landing
    {
        $data = $this->mapInputData($input);
        $item = $this->itemRepository->save($data);

        if (!$item) {
            return null;
        }

        return $item;
    }

    /**
     * @param $input
     * @return array
     */
    private function mapInputData($input)
    {
        return [
            'name' => $input['name'],
            'quantity' => $input['quantity'],
            'price' => $input['price'],
            'description' => $input['description']
        ];
    }

    /**
     * @param $id
     * @param array $input
     * @return Item|null
     */
    public function updateItem($id, array $input): ?Item // null or Landing
    {
        $data = $this->mapInputData($input);
        $item = $this->itemRepository->update($id, $data);

        if (!$item) {
            return null;
        }

        return $item;
    }
}