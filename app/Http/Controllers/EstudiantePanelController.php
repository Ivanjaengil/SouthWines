public function index()
{
    $estudiantes = User::all();
    $usuariosPendientes = User::where('status', 'pendiente')->get();
    
    return view('panel-estudiantes', compact('estudiantes', 'usuariosPendientes'));
}
