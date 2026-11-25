@extends('layouts.buyer')
@section('content')
  <style>
    .chat-container {
      width: 100%;
      max-width: 860px;
      height: min(72vh, 680px);
      min-height: 420px;
      background-color: #fff;
      border-radius: 16px;
      display: flex;
      flex-direction: column;
      overflow: hidden;
      box-shadow: 0 8px 28px rgba(24, 35, 25, 0.1);
      margin: 0 auto;
    }

    .chat-container .chat-header {
      background-color: #6e7e1d;
      color: white;
      padding: 10px 15px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .chat-container .chat-header img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #fff;
    }

    .chat-container .contact-info {
      display: flex;
      flex-direction: column;
    }

    .chat-container .contact-info .name {
      font-weight: bold;
      font-size: 16px;
    }

    .chat-container .contact-info .status {
      font-size: 12px;
      color: #d9d9d9;
    }

    .chat-container .chat-messages {
      flex: 1;
      padding: 15px;
      overflow-y: auto;
      display: flex;
      flex-direction: column;
      gap: 10px;
      background-color: #f5f6f2;
    }

    .chat-container .message {
      max-width: 70%;
      padding: 10px 15px;
      border-radius: 10px;
      word-wrap: break-word;
      font-size: 14px;
      display: flex;
      flex-direction: column;
      position: relative;
    }

    .chat-container .message.sent {
      align-self: flex-end;
      background-color: #edf3d9;
    }

    .chat-container .message.received {
      align-self: flex-start;
      background-color: #fff;
      border: 1px solid #ddd;
    }

    .chat-container .timestamp {
      font-size: 10px;
      color: #555;
      align-self: flex-end;
      margin-top: 5px;
    }

    .chat-container .chat-input {
  padding: 10px;
  background-color: #f0f0f0;
  border-top: 1px solid #ddd;
}

.chat-container .chat-input form {
  display: flex;
  align-items: center;
  width: 100%;
}

.chat-container .chat-input input[type="text"] {
  flex: 1;
  padding: 10px 15px;
  border-radius: 20px;
  border: 1px solid #ccc;
  outline: none;
  font-size: 14px;
}

.chat-container .chat-input button {
  background-color: #6e7e1d;
  color: white;
  border: none;
  width: 40px;
  height: 40px;
  margin-left: 10px;
  border-radius: 50%;
  cursor: pointer;
  font-size: 18px;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: background 0.3s;
}

.chat-container .chat-input button:hover {
  background-color: #596819;
}

    @media (max-width: 575.98px) {
      .chat-container {
        height: 68vh;
        min-height: 360px;
        border-radius: 12px;
      }

      .chat-container .message {
        max-width: 88%;
      }
    }
  </style>

  <div class="page-head">
    <div>
      <h1>Messages</h1>
      <p>Continue your conversation about this enquiry.</p>
    </div>
  </div>
  <div class="chat-container">

  <!-- Header -->
  <div class="chat-header">
     <i class="fa fa-user-circle" style="font-size: 30px;"></i>
    <div class="contact-info">
      <div class="name">{{ $receiver->name }}</div>
    </div>
  </div>

  <!-- Messages -->
  <div class="chat-messages" id="chat-messages">
    @foreach($messages as $message)
      <div class="message {{ $message->sender_id == auth()->id() ? 'sent' : 'received' }}">
        {{ $message->message }}
        <span class="timestamp">{{ \Carbon\Carbon::parse($message->created_at)->format('h:i A') }}</span>
      </div>
    @endforeach
  </div>

  <!-- Input -->
  <div class="chat-input">
    <form id="chatForm">
      @csrf
      <input type="hidden" name="product_id" value="{{ $product->id }}">
      <input type="hidden" name="buyer_id" value="{{ $inquiry->buyer_id }}">
      <input type="hidden" name="seller_id" value="{{ $inquiry->seller_id }}">
      <input type="text" name="message" id="message" placeholder="Type a message" required>
      <button type="submit">➤</button>
    </form>
  </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
setInterval(function() {
    $.ajax({
        url: "{{ route('buyer.chat.fetch', $inquiry->id) }}", // 👈 new JSON route
        type: "GET",
        dataType: "json", // 👈 force JSON
        success: function(messages) {
            $('#chat-messages').html('');

            messages.forEach(function(msg) {
                let timestamp = new Date(msg.created_at).toLocaleTimeString([], {
                    hour: '2-digit',
                    minute: '2-digit'
                });

                $('#chat-messages').append(`
                    <div class="message ${msg.sender_id == {{ auth()->id() }} ? 'sent' : 'received'}">
                        ${msg.message}
                        <span class="timestamp">${timestamp}</span>
                    </div>
                `);
            });

            $('#chat-messages').scrollTop($('#chat-messages')[0].scrollHeight);
        },
        error: function(xhr, status, error) {
            console.error("Ping error:", error);
        }
    });
}, 1000);
</script>
<script>
$(document).ready(function(){

    $('#chatForm').on('submit', function(e){
        e.preventDefault();

        $.ajax({
            url: "{{ route('seller.chat.send') }}",
            method: "POST",
            data: $(this).serialize(),
            success: function(response) {
                // Append new message to chat
                $('#chat-messages').append(`
                    <div class="message sent">
                        ${response.message}
                        <span class="timestamp">${new Date(response.created_at).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}</span>
                    </div>
                `);

                // Clear input
                $('#message').val('');

                // Auto scroll to bottom
                $('#chat-messages').scrollTop($('#chat-messages')[0].scrollHeight);
            }
        });
    });

});
</script>

@endsection 