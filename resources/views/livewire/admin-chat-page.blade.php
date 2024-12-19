<div>
    <!-- Chat Body -->
    <div class="chat-box bg-dark rounded p-3 mb-4" style="height: 450px; overflow-y: auto;" wire:poll.2s="refreshMessages"
        id="chat-box">
        @foreach ($messages as $msg)
            <div class="message mb-3">
                <div class="d-flex justify-content-{{ $msg->sender_id === auth()->id() ? 'end' : 'start' }}">
                    <div class="bg-primary p-1 rounded">
                        @if ($msg->message && $msg->message != '')
                            <small>{{ $msg->message }}</small>
                        @endif
                        <!-- Display Message Time -->
                        <div class="text-dark" style="font-size: 0.75rem;">
                            {{ $msg->created_at->format('d M, h:i A') }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex align-items-center justify-content-between">
        <!-- Chat Input with Input Group -->
        <div class="input-group">
            <!-- Message Input (Center) -->
            <input type="text" wire:model="messageText" class="form-control p-3"
                placeholder="Type your message here..." id="message-input" onkeypress="sendOnEnter(event)">

            <!-- Send Message Button (Right) -->
            <button wire:click="sendMessage" class="btn btn-primary" id="send-message-btn">
                <i class="fa fa-paper-plane"></i>
            </button>
        </div>
    </div>

</div>

@push('scripts')
    <script>
        function scrollToBottom() {
            var chatBox = $('#chat-box');
            chatBox.animate({
                scrollTop: chatBox[0].scrollHeight
            }, 500);
        }
        @if($newmsg && count($newmsg) > 0)
                scrollToBottom();
        @endif
        function sendOnEnter(event) {
            if (event.key === 'Enter' && !event.shiftKey) {
                event.preventDefault();
                $('#send-message-btn').click();
            }
        }

        $(document).ready(function() {
            scrollToBottom();
            $('#send-message-btn').click(function() {
                @this.call('sendMessage');
                scrollToBottom();
            });
        });
    </script>
@endpush
