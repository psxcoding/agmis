<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

use Validator;
use Redirect;
use Session;

class ItemsController extends Controller
{
	public function index()
	{
		$items = Item::get();

		return view('items.index', compact('items'));
	}

	public function create()
	{
		$categories = Category::get();
		return view('items.create',compact('categories'));
	}

	public function store(Request $request)
	{

		//dd($request);
		$rules = array(
			'name'       => 'required',
			'quantity' => "required|min:1|numeric",
			'price' => "required|regex:/^\d*(\.\d{1,2})?$/",
			'category'       => 'required'
		);

		$validator = Validator::make($request->all(), $rules);

        // process the login
		if ($validator->fails()) {
			return Redirect::to('items/create')
			->withErrors($validator);
		} else {
            // store
			$item = new Item;
			$item->name       = $request->name;
			$item->quantity       = $request->quantity;
			$item->price       = $request->price;
			$item->description       = $request->description;
			$status = $item->save();
			if ($status) {
				$item->cats()->sync($request->category);
			}

            // redirect
			Session::flash('message', 'Successfully created Item!');
			return Redirect::to('items');
		}

	}

	public function show($id)
	{
		$item = Item::find($id);

		return view('items.show',compact('item'));
	}

	public function edit($id)
	{
		$item = Item::find($id);
		$categories = Category::get();
		$itemCategories = $item->cats;
		$slectedCats = array();
		foreach ($itemCategories as $key => $value) {
			$slectedCats[] = $value->id;
		}

		return view('items.edit',compact('item','categories','slectedCats'));
	}

	public function update(Request $request, $id)
	{

		$rules = array(
			'name'       => 'required',
			'quantity' => "required|min:1|numeric",
			'price' => "required|regex:/^\d*(\.\d{1,2})?$/",
			'category'       => 'required'
		);

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return Redirect::to(route('items.edit',[$id]))
			->withErrors($validator);
		} else {
            // store
			$item = Item::find($id);
			$item->name       = $request->name;
			$item->quantity       = $request->quantity;
			$item->price       = $request->price;
			$item->description       = $request->description;
			$status = $item->save();
			if ($status) {
				$item->cats()->sync($request->category);
			}

            // redirect
			Session::flash('message', 'Successfully updated group!');
			return Redirect::to(route('items.show',[$id]));
		}
	}

}