<?php

class systemController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	
	public function login()
	{
	
			$rules = array(
			'email'      => 'required|email',
			'password' => 'required'
		);
		
		$messages = array(
    'required' => 'El campo es requerido',
    'email' => 'El campo debe ser un correo electornico.',
    );

		$validator = Validator::make(Input::all(), $rules, $messages);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('/')
				->withErrors($validator)
				->withInput(Input::except('password'));
		}else{
		
		// get all the adminMaestros

			$email = Input::get('email');
			$password = Input::get('password');
		
    $usuario = DB::table('adminMaestros')->where('email', $email)->first();
    
    if(isset($usuario)){

    if(($usuario->password) == $password){	
        Session::put('autorizacion', 'si');
        return View::make('adminMaestros.show')->with('adminMaestro', $usuario);;
    }else{
        $usuario = DB::table('adminSecundarios')->where('email', $email)->first();
    }

    if(($usuario->password) == $password){	
        return View::make('adminSecundarios.show')->with('adminSecundario', $usuario);;
    }else{
        $usuario = DB::table('usuarioNormales')->where('email', $email)->first();
    }
 
    if(($usuario->password) == $password){	
        return View::make('usuarioNormales.show')->with('usuarioNormal', $usuario);;
    }
    }
    else{
        	Session::flash('message', 'Datos incorrectos');
		      return View::make('index');
		}

		// load the view and pass the admins

	}
	}
	
		public function logout()
	{
	      Session::flush();
	      return View::make('index');
	}

}