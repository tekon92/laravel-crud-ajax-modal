<?php

class UserController extends \BaseController {

	public function doLogin()
	{
		$rules = [
			'username' => 'required',
			'password' => 'required'
		];

		$validate = Validator::make(Input::all(), $rules);

		if ($validate->fails()) {
			return Redirect::back()
				->withErrors($validate)
				->withInput(Input::except('password'));
		} else {

			$data = [
			'username' => Input::get('username'),
			'password' => Input::get('password')
			];

			if (Auth::attempt($data))
			{
			    return Redirect::to('/')
			} else {
				return Redirect::back()
					->withErrors('wrong');
			}
		}
		

		

		
	}

}