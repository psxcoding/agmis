<?php

namespace App\Services;


use App\Models\Item;
use App\Repositories\ItemRepository;

class ItemService
{
    protected $itemRepository;

    public function __constructor(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    /**
     * @param array $input
     * @return Item|null
     */
    public function createItem(array $input): ?Item // null or Landing
    {
       // dd($input);
        $data = $this->mapInputData($input);
        //dd($this->itemRepository);
        $item = $this->itemRepository->save($data);

        //dd($item);

       /* if (!$item->saved()) {
            return null;
        }*/

        return $item;
    }

      private function mapInputData($input)
      {
          return [
              'name' => $input['name'],
              'quantity' => $input['quantity'],
              'price' => $input['price'],
              'description' => $input['description']
          ];
      }
}