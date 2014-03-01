<?php

class usuarioNormalController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// get all the adminMaestros
    $usuarioNormales = DB::table('usuarioNormales')->get();

		// load the view and pass the admins
		return View::make('usuarioNormales.index')
			->with('usuarioNormales', $usuarioNormales);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('usuarioNormales.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
				// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name'       => 'required',
			'email'      => 'required|email',
			'phone_number' => 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('usuarioNormal/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$name = Input::get('name');
			$email = Input::get('email');
			$phone_number = Input::get('phone_number');

			
			DB::table('usuarioNormales')->insert(
      array('name' => $name,'email' => $email, 'phone_number' => $phone_number));

			// redirect
			Session::flash('message', 'usuario Creado');
			return Redirect::to('usuarioNormal');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
				// get the nerd
    $usuarioNormal = DB::table('usuarioNormales')->where('id', $id)->first();

		// show the view and pass the nerd to it
		return View::make('usuarioNormales.show')
			->with('usuarioNormal', $usuarioNormal);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
				// get the admin
    $usuarioNormal = DB::table('usuarioNormales')->where('id', $id)->first();

		// show the edit form and pass the admin
		return View::make('usuarioNormales.edit')
			->with('usuarioNormal', $usuarioNormal);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
				// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name'       => 'required',
			'email'      => 'required|email',
			'phone_number' => 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('usuarioNormal/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
    
			$name= Input::get('name');
			$email = Input::get('email');
			$phone_number = Input::get('phone_number');

      DB::table('usuarioNormales')->where('id', $id)->update(array('name' => $name,'email' => $email,   'phone_number' => $phone_number));

			// redirect
			Session::flash('message', 'Editado Correctamente');
			return Redirect::to('usuarioNormal');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
				// delete
  DB::table('usuarioNormales')->where('id',$id)->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the nerd!');
		return Redirect::to('usuarioNormal');
	}

}
