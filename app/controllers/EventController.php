<?php

class EventController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /event
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = DB::table('event_categories')->select('*')->get();

		return View::make('admin.events.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /event/create
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Session::token() !== Input::get('_token')) {
			return Response::json(array(
				'msg' => 'Unathorized'
			));
		}

		$validate = ['name' => 'required|min:10'];

		$validation = Validator::make(Input::all(), $validate);
		$validation->setAttributeNames(['name' => 'category']);

		
		if ($validation->passes()) {
			$name = new Category;
			$name->name = Input::get('name');
			$name->slug = strtolower(preg_replace('/\s+/', '-', $name->name));

			if ($name->save()) {
				if (Request::ajax()) {
					return Response::json([
						'success' => true,
						'msg' => 'category added'
					], 200);
				}
			}
			return Redirect::route('category.index')
				->withErrors('Error');
		}
		return Response::json([
			'msg' => $validation->errors()->toArray(),
			'success' => false
		], 200);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /event
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /event/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data = DB::table('event_categories')->select('*')->where('id', $id)->first();

		return Response::json($data);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /event/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$cat = DB::table('event_categories')->select('*')->where('id', $id)->first();

		return Response::json($cat);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /event/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// if (Session::token() !== Input::get('_token')) {
		// 	return Response::json(array(
		// 		'msg' => 'Unathorized'
		// 	));
		// }
		
		$update = Category::find($id);
		$update->name = Input::get('name');
		$update->slug = strtolower(preg_replace('/\s+/', '-', $update->name));
		$update->save();

		return Response::json([
			'msg' => 'success',
			'name' => Input::get('name')
			]);
	}

	public function delete($id)
	{
		$del = DB::table('event_categories')
			->select('*')
			->where('id', $id)
			->delete();


		return Redirect::route('category.index');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /event/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$cat = DB::table('event_categories')->where('id', $id)->delete();

		return Redirect::route('category.index')
			->withSuccess('Success');
	}

}