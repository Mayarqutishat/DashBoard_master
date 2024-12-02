<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        // Paginate messages for better performance
        $messages = Message::withTrashed()->paginate(10);
        return view('admin.message.index', compact('messages'));
    }

    public function create()
    {
        return view('admin.message.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:messages,email',
            'message' => 'required|string',
        ]);

        $message = new Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->message = $request->message;
        $message->created_by = Auth::id();
        $message->save();

        return redirect('admin/message')->with('message', 'Message added successfully.');
    }

    public function edit($message_id)
    {
        $message = Message::findOrFail($message_id);
        return view('admin.message.edit', compact('message'));
    }

    public function update(Request $request, $message_id)
    {
        $message = Message::findOrFail($message_id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:messages,email,$message_id",
            'message' => 'required|string',
        ]);

        $message->name = $request->name;
        $message->email = $request->email;
        $message->message = $request->message;
        $message->update();

        return redirect('admin/message')->with('message', 'Message updated successfully.');
    }

    public function destroy($message_id)
    {
        $message = Message::findOrFail($message_id);
        $message->delete(); // Perform soft delete
        return redirect('admin/message')->with('message', 'Message deleted successfully.');
    }

    public function restore($message_id)
    {
        $message = Message::withTrashed()->findOrFail($message_id);
        $message->restore();
        return redirect('admin/message')->with('message', 'Message restored successfully.');
    }
}
