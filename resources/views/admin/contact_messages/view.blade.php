@include('admin.include.header')

<div class="page-content">
  <div class="page-container p-3">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="header-title mb-0">Message from {{ $message->name }}</h4>
        <div>
          <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-sm btn-secondary">Back</a>
          <form action="{{ route('admin.contact-messages.delete', $message->id) }}" method="POST" style="display:inline-block" class="delete-message-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
          </form>
        </div>
      </div>
      <div class="card-body">
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Name</label>
            <input class="form-control" value="{{ $message->name }}" readonly>
          </div>
          <div class="col-md-6">
            <label class="form-label">Email</label>
            <input class="form-control" value="{{ $message->email }}" readonly>
          </div>
          <div class="col-md-6">
            <label class="form-label">Phone</label>
            <input class="form-control" value="{{ $message->phone ?: '-' }}" readonly>
          </div>
          <div class="col-md-6">
            <label class="form-label">Subject</label>
            <input class="form-control" value="{{ $message->subject ?: '-' }}" readonly>
          </div>
          <div class="col-12">
            <label class="form-label">Message</label>
            <textarea rows="8" class="form-control" readonly>{{ $message->message }}</textarea>
          </div>
          <div class="col-12">
            <small class="text-muted">Received {{ $message->created_at->format('d/m/Y h:i A') }}</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
  const form = document.querySelector('.delete-message-form');
  if (!form) return;
  form.addEventListener('submit', function(e){
    e.preventDefault();
    Swal.fire({
      title: 'Are you sure?',
      text: 'This will permanently delete the message.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#6c757d',
      confirmButtonText: 'Yes, delete it',
      cancelButtonText: 'Cancel'
    }).then((result) => {
      if (result.isConfirmed) {
        form.submit();
      }
    });
  });
});
</script>

@include('admin.include.footer')


