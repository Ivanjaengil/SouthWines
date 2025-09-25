<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupportMessageController;
use Illuminate\Support\Facades\Route;
use App\http\controllers\HomeController;
use App\http\controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\Admin\UserApprovalController;
use App\Http\Controllers\EstadisticasController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PurchaseController;




// Rutas públicas
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/sobre-nosotros', function () {
    return view('sobre-nosotros');
})->name('sobre-nosotros');

Route::get('/formulario', function () {
    return view('formulario');
})->name('formulario');



// Rutas de autenticación
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'showRegistrationForm'])
        ->name('register');
    Route::post('register', [RegisteredUserController::class, 'register']);
});



// Rutas de perfil y verificación de correo electrónico (requieren autenticación)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Verificación de correo electrónico
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/home');
    })->middleware('signed')->name('verification.verify');

    Route::post('/email/verification-notification', [VerificationController::class, 'send'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
});

// Rutas para panel de administrador //

Route::middleware(['auth', 'can:view admin panel'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('panel-administrador');
    Route::get('/admin/estudiantes', [AdminController::class, 'estudiantes'])->name('panel-estudiantes');
    Route::get('/admin/estadisticas', [AdminController::class, 'estadisticas'])->name('panel-estadisticas');
    Route::get('/panel-administrador', [AdminController::class, 'panelAdministrador'])->name('panel-administrador');
});



// Rutas de cursos
Route::get('/cursos', [CursoController::class, 'index'])->name('cursos');

// Ruta genérica para el detalle del curso
Route::get('/cursos/{curso}', [CursoController::class, 'show'])->name('curso.detalle');

// Rutas específicas para cada curso
Route::get('/iniciacion-vinos', [CursoController::class, 'iniciacionVinos'])->name('iniciacion-vinos');
Route::get('/especialista-vinos', [CursoController::class, 'especialistaVinos'])->name('especialista-vinos');
Route::get('/vinos-internacionales', [CursoController::class, 'vinosInternacionales'])->name('vinos-internacionales');
Route::get('/cata-de-vinos', [CursoController::class, 'cataVinos'])->name('cata-de-vinos');
Route::get('/vinos-espumosos', [CursoController::class, 'vinosEspumosos'])->name('vinos-espumosos');



// Rutas para mensajes de soporte - sin verificación de email
Route::post('/support-message', [SupportMessageController::class, 'store'])->name('support.message');

// Solo las acciones administrativas requieren autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/panel-soporte', [SupportMessageController::class, 'index'])->name('panel-soporte');  // Añadida esta ruta
    Route::patch('/support-messages/{id}/read', [SupportMessageController::class, 'markAsRead'])->name('support.markAsRead');
    Route::delete('/support-messages/{id}', [SupportMessageController::class, 'destroy'])->name('support.destroy');
});




// Rutas de autenticación generadas por Laravel
require __DIR__.'/auth.php';

Route::post('/curso/store', [CursoController::class, 'store'])->name('curso.store');

Route::delete('curso/{curso}', [CursoController::class, 'destroy'])->name('curso.destroy');

Route::put('curso/{curso}', [CursoController::class, 'update'])->name('curso.update');

Route::get('/cursos/{curso}/edit', [CursoController::class, 'edit'])->name('cursos.edit');



// Rutas para el panel de estudiantes
Route::prefix('estudiantes')->group(function() {
    // Mostrar el panel de estudiantes
    Route::get('/', [EstudianteController::class, 'index'])->name('estudiantes.index');
    
    // Actualizar un estudiante
    Route::put('/{estudiante}', [EstudianteController::class, 'update'])->name('estudiante.update');
    
    // Eliminar un estudiante
    Route::delete('/{estudiante}', [EstudianteController::class, 'destroy'])->name('estudiante.destroy');
});

Route::get('/panel-estudiantes', [EstudianteController::class, 'index'])->name('panel-estudiantes');

Route::post('/estudiantes', [EstudianteController::class, 'store'])->name('estudiante.store');

Route::delete('/estudiantes/{estudiante}', [EstudianteController::class, 'destroy'])->name('estudiante.destroy');

Route::put('/estudiantes/{estudiante}', [EstudianteController::class, 'update'])->name('estudiante.update');

Route::post('/estudiantes/aprobar/{id}', [EstudianteController::class, 'aprobar'])->name('estudiante.aprobar');

Route::middleware(['auth', 'can:view admin panel'])->group(function () {
    // ... existing routes ...
    Route::get('/admin/pending-users', [AdminController::class, 'pendingUsers'])->name('admin.pending-users');
    Route::post('/admin/approve-user/{id}', [AdminController::class, 'approveUser'])->name('admin.approve-user');
    Route::post('/admin/reject-user/{id}', [AdminController::class, 'rejectUser'])->name('admin.reject-user');
});

// ... existing code ...

Route::prefix('admin')->group(function(): void {
    Route::get('/user-approval', [UserApprovalController::class, 'index'])->name('admin.user.approval');
    Route::get('/approve-user/{id}', [UserApprovalController::class, 'approve'])->name('admin.approve.user');
    Route::get('/reject-user/{id}', [UserApprovalController::class, 'reject'])->name('admin.reject.user');
});

Route::get('/panel-estadisticas', [EstadisticasController::class, 'index'])->name('panel-estadisticas');
Route::get('/estadisticas/datos', [EstadisticasController::class, 'getDatos'])->name('estadisticas.datos');

// Solo las acciones administrativas requieren autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/panel-soporte', [SupportMessageController::class, 'index'])->name('panel-soporte');
    Route::patch('/support-messages/{id}/read', [SupportMessageController::class, 'markAsRead'])->name('support.markAsRead');
    Route::delete('/support-messages/{id}', [SupportMessageController::class, 'destroy'])->name('support.destroy');
});

// Rutas para compras (requieren autenticación)
Route::middleware(['auth'])->group(function () {
    Route::get('/purchase/create/{curso}', [PurchaseController::class, 'create'])->name('purchase.create');
    Route::post('/purchase/{curso}', [PurchaseController::class, 'store'])->name('purchase.store');
    Route::get('/purchase/success', [PurchaseController::class, 'success'])->name('purchase.success');
    Route::get('/purchase/{purchase}', [PurchaseController::class, 'show'])->name('purchase.show');
});

