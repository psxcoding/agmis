<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use Validator;
use Redirect;
use Session;

class CategoriesController extends Controller
{
	public function index()
	{
		$categories = Category::get();
		return view('categories.index', compact('categories'));
	}

	public function create()
	{
		return view('categories.create');
	}

	public function store(Request $request)
	{
		$rules = array(
			'name'       => 'required'
		);

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('categories/create')
			->withErrors($validator);
		} else {
            // store
			$category = new Category;
			$category->name       = $request->name;
			$category->save();

            // redirect
			Session::flash('message', 'Successfully created Category!');
			return Redirect::to('categories');
		}
	}

	public function show($id)
	{
		$category = Category::find($id);

		return view('categories.show',compact('category'));
	}

	public function edit($id)
	{
		$category = Category::find($id);

		return view('categories.edit',compact('category'));
	}

	public function update(Request $request, $id)
	{

		$rules = array(
			'name'       => 'required'
		);

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return Redirect::to(route('categories.edit',[$id]))
			->withErrors($validator);
		} else {
			
			$category = Category::find($id);
			$category->name       = $request->name;
			$category->save();
			
            // redirect
			Session::flash('message', 'Successfully updated category!');
			return Redirect::to(route('categories.show',[$id]));
		}
	}


}
