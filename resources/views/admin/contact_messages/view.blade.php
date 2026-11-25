@include('admin.include.header')

<main class="content">
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center mb-4 page-head">
            <div>
                <h1 class="mb-1">Message from {{ $message->name }}</h1>
                <p class="text-muted mb-0">
                    Users, material approvals, orders and marketplace activity.
                </p>
            </div>
            <div class="d-flex gap-2">
              <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-sm btn-dark fs-12">Back</a>
              <form action="{{ route('admin.contact-messages.delete', $message->id) }}" method="POST" style="display:inline-block" class="delete-message-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
          </form>
            </div>


        </div>

       <div class="card">
        <div class="card-body">
        
<div class="row g-3">

    <div class="col-md-6">
        <label class="form-label text-muted mb-1">Name</label>
        <div class="fw-semibold text-dark">{{ $message->name }}</div>
    </div>

    <div class="col-md-6">
        <label class="form-label text-muted mb-1">Email</label>
        <div class="fw-semibold text-dark">{{ $message->email }}</div>
    </div>

    <div class="col-md-6">
        <label class="form-label text-muted mb-1">Phone</label>
        <div class="fw-semibold text-dark">{{ $message->phone ?: '-' }}</div>
    </div>

    <div class="col-md-6">
        <label class="form-label text-muted mb-1">Subject</label>
        <div class="fw-semibold text-dark">{{ $message->subject ?: '-' }}</div>
    </div>

    <div class="col-12">
        <label class="form-label text-muted mb-1">Message</label>
        <div class="p-3 bg-light rounded-3 text-dark" style="min-height: 120px; white-space: pre-wrap;">{{ $message->message }}</div>
    </div>

    <div class="col-12">
        <small class="text-muted">
            <i class="fa-regular fa-clock me-1"></i>
            Received {{ $message->created_at->format('d/m/Y h:i A') }}
        </small>
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


    </div>
</main>

@include('admin.include.footer')