<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use App\Models\Category;

use App\Services\ItemService;

use Validator;
use Redirect;
use Session;

/**
 * Class ItemsController
 * @package App\Http\Controllers
 */
class ItemsController extends Controller
{
    /**
     * @var ItemService
     */
    protected $itemService;

    /**
     * ItemsController constructor.
     * @param ItemService $itemService
     */
    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $items = $this->itemService->index();

        return view('items.index', compact('items'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::get();
        return view('items.create', compact('categories'));
    }

    /**
     * @param ItemRequest $request
     * @return mixed
     */
    public function store(ItemRequest $request)
    {
        $item = $this->itemService->createItem($request->all());

        if ($item) {
            $item->cats()->sync($request->category);
        }

        Session::flash('message', 'Successfully created Item!');
        return Redirect::to('items');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
   /* public function show($id)
    {
        $item = Item::find($id);
        dd($item);
        return view('items.show', compact('item'));
    }*/

    /**
     * @param Item $item
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Item $item)
    {
        //$item = Item::find($id);
        //dd($item);
        return view('items.show', compact('item'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $categories = Category::get();
        $itemCategories = $item->cats;
        $slectedCats = $itemCategories->pluck('id')->toArray();

        return view('items.edit', compact('item', 'categories', 'slectedCats'));
    }

    /**
     * @param ItemRequest $request
     * @param $id
     * @return mixed
     */
    public function update(ItemRequest $request, $id)
    {
        $item = $this->itemService->updateItem($id, $request->all());

        if ($item) {
            $item->cats()->sync($request->category);
        }

        Session::flash('message', 'Successfully updated group!');
        return Redirect::to(route('items.show', [$id]));
    }

}
