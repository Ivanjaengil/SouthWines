<?php
namespace App\Http\Controllers;

use App\Models\SupportMessage;
use Illuminate\Http\Request;

class SupportMessageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string'
        ]);

        SupportMessage::create($validated);

        return response()->json(['message' => 'Mensaje enviado exitosamente']);
    }

    public function index()
    {
        $messages = SupportMessage::orderBy('created_at', 'desc')->get();
        return view('panel-soporte', compact('messages'));
    }

    public function markAsRead($id)
    {
        $message = SupportMessage::findOrFail($id);
        $message->read = !$message->read;
        $message->save();

        return back()->with('success', 'Estado del mensaje actualizado');
    }

    public function destroy($id)
    {
        $message = SupportMessage::findOrFail($id);
        $message->delete();

        return back()->with('success', 'Mensaje eliminado correctamente');
    }
}