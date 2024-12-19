<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ChatMessage;

class WebChatPage extends Component
{
    use WithFileUploads;

    public $messageText;
    public $messages = [];

    public function mount()
    {
        // Initialize any required data here
        $this->refreshMessages(); // Load all unread messages on first load
    }

    public function sendMessage()
    {
        if (empty($this->messageText) && empty($this->file)) {
            return; // Don't send if both the message and file are empty
        }

        $data = [
            'sender_id' => auth()->id(),
            'receiver_id' => 1,
            'message' => $this->messageText,
            'is_read' => 0,
        ];

        // Create the message
        $message = ChatMessage::create($data);

        // Clear input fields
        $this->messageText = '';

        $this->messages[] = $message;

    }

    public function refreshMessages()
    {
        // Fetch unread messages for the chat
        $this->messages = ChatMessage::where(function ($query) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', 1);
        })->orWhere(function ($query) {
            $query->where('sender_id', 1)
                ->where('receiver_id', auth()->id());
        })
        ->orderBy('created_at', 'asc')
        ->get();

        // Mark messages as read after fetching them
        ChatMessage::where('receiver_id', auth()->id())
            ->where('is_read', 0)
            ->update(['is_read' => 1]);
    }

    public function render()
    {
        return view('livewire.web-chat-page');
    }
}
