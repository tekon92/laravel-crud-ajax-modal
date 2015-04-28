<?php

class QuoteController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /quote
	 *
	 * @return Response
	 */
	public function index()
	{
		 if (!Input::has('sp')) {
            $sp = 0;
        } else {
            $sp = intval(Input::get('sp'));
        }

        return Response::json([
            'sp' => intval($sp)+10,
            'quotes' => Quote::orderBy('created_at', 'desc')->skip($sp)->take(10)->get()
        ]);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /quote/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /quote
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate input
        if (!Input::has('quote')) {
            return Response::make('Bad Request', 400);
        }

        // write records
        // 'John Doe' said it if nobody said it, 
        // stub the backdrop image if no image is given
        $quote = Quote::create([
            'quote' => Input::get('quote'),
            'author' => (Input::has('author')) ? Input::get('author') : 'John Doe',
            'image' => (Input::has('image')) ? Input::get('image') : asset('res/stub.png')
        ]);

        // done
        return Response::make($quote);
	}

	/**
	 * Display the specified resource.
	 * GET /quote/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /quote/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /quote/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /quote/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}