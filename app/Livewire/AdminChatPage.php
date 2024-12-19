<?php

namespace App\Livewire;

use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminChatPage extends Component
{
    use WithFileUploads;

    public $messageText;
    public $messages = [];
    public $file;
    public $receiverId;
    public $newmsg;

    public function mount($receiverId)
    {
        $this->receiverId = $receiverId;
        $this->fetchInitialMessages();
    }

    public function fetchInitialMessages()
    {
        // Fetch all messages for the chat initially
        $this->messages = ChatMessage::where(function ($query) {
            $query->where('sender_id', Auth::id())
                ->where('receiver_id', $this->receiverId);
        })->orWhere(function ($query) {
            $query->where('sender_id', $this->receiverId)
                ->where('receiver_id', Auth::id());
        })
            ->orderBy('created_at', 'asc')
            ->get();

        // Mark messages as read for the current user
        ChatMessage::where('receiver_id', Auth::id())
            ->where('sender_id', $this->receiverId)
            ->where('is_read', 0)
            ->update(['is_read' => 1]);
    }

    public function refreshMessages()
    {
        // Fetch only unread messages
        $newMessages = ChatMessage::where('receiver_id', Auth::id())
            ->where('sender_id', $this->receiverId)
            ->where('is_read', 0)
            ->orderBy('created_at', 'asc')
            ->get();

        $this->newmsg = $newMessages;
        $this->messages = $this->messages->merge($newMessages);
        ChatMessage::whereIn('id', $newMessages->pluck('id'))
                    ->update(['is_read' => 1]);


    }

    public function sendMessage()
    {
        if (empty($this->messageText) && !$this->file) {
            return;
        }

        $data = [
            'sender_id' => Auth::id(),
            'receiver_id' => $this->receiverId,
            'message' => $this->messageText,
            'is_read' => 0,
        ];

        $message = ChatMessage::create($data);
        $this->messageText = '';
        $this->messages->push($message);
        $this->newMessageReceived = true;

        $this->refreshMessages();
    }

    public function render()
    {
        return view('livewire.admin-chat-page', [
            'messages' => $this->messages,
            'newMessageReceived' => $this->newmsg,
        ]);
    }
}
