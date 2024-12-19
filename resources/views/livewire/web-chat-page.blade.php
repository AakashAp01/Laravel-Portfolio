<div class="m-5 bg-transparent position-sticky">
    <!-- Card Heading -->
    <div class="card-header bg-primary text p-3 border-bottom border-danger border-5">
        <h5>Leave it to me! 🔥</h5>
    </div>

    <!-- Chat Body -->
    <div class="mb-4 chat-box" style="height: 400px; overflow-y: auto;" wire:poll.3s="refreshMessages" id="chat-box">
        <!-- Loop through messages -->
        @foreach ($messages as $msg)
            <div class="message mb-3">
                <div class="d-flex justify-content-{{ $msg->sender_id === auth()->id() ? 'end' : 'start' }}">
                    <div class="border-{{ $msg->sender_id === auth()->id() ? 'end' : 'start' }} border-danger border-5 p-2 bg-primary"
                        style="max-width: 70%;">
                        @if ($msg->message && $msg->message != '')
                            <small>{{ $msg->message }}</small>
                        @endif
                        <div class="text-{{ $msg->sender_id === auth()->id() ? 'end' : 'start' }}">
                            <small class="text-muted">{{ $msg->created_at->format('d M, h:i A') }}</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Chat Input -->
    <div class="input-group">
        <!-- Message Input Field -->
        <input type="text" wire:model="messageText" class="form-control p-3" placeholder="Type your message here..."
            id="message-input" onkeypress="sendOnEnter(event)">

        <!-- Send Message Button -->
        <button wire:click="sendMessage" id="send-message-btn" class="btn btn-primary p-3" :disabled="!messageText">
            <i class="fa fa-paper-plane"></i>
        </button>
    </div>

    <style>
        #chat-box {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        #chat-box::-webkit-scrollbar {
            display: none;
        }
    </style>
</div>

@push('scripts')
    <script>
         function sendOnEnter(event) {
            if (event.key === 'Enter' && !event.shiftKey) {
                event.preventDefault();
                $('#send-message-btn').click();
            }
        }

        function scrollToBottom() {
            var chatBox = $('#chat-box');
            chatBox.animate({
                scrollTop: chatBox[0].scrollHeight
            }, 500);
        }

        $(document).ready(function() {
            scrollToBottom();
            $('#send-message-btn').click(function() {
                scrollToBottom();
            });
        });
    </script>
@endpush
