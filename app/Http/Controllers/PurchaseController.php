<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Curso;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function store(Request $request, Curso $curso)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre_titular' => 'required|string',
            'numero_tarjeta' => 'required|string|size:16',
            'fecha_caducidad' => 'required|string|size:5',
            'cvv' => 'required|string|size:3',
        ]);

        try {
            $purchase = Purchase::create([
                'user_id' => auth()->id(),
                'curso_id' => $curso->id,
                'amount' => $curso->precio,
                'status' => 'completed',
                'payment_method' => 'credit_card',
            ]);

            // Guardamos el ID de la compra en la sesión
            session(['last_purchase_id' => $purchase->id]);

            return redirect()->route('purchase.success')
                           ->with('success', 'Pago procesado correctamente');

        } catch (\Exception $e) {
            \Log::error('Error en la compra: ' . $e->getMessage());
            return back()->with('error', 'Error al procesar el pago: ' . $e->getMessage());
        }
    }

    public function show(Purchase $purchase)
    {
        return view('purchases.show', compact('purchase'));
    }

    public function success()
    {
        // Recuperamos la última compra de la sesión
        $purchaseId = session('last_purchase_id');
        
        if (!$purchaseId) {
            return redirect()->route('home');
        }

        $purchase = Purchase::with('curso')->findOrFail($purchaseId);
        
        return view('purchases.success', compact('purchase'));
    }

    public function create(Curso $curso)
    {
        return view('pago', compact('curso'));
    }
} 