@include('admin.include.header')

<div class="page-content">
  <div class="page-container p-3">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="header-title mb-0">Contact Messages</h4>
      </div>
      <div class="card-body p-0 tableCustom">
        <div class="table-responsive pt-2">
          <table class="table table-custom table-centered table-sm table-nowrap table-hover mb-0">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Subject</th>
                <th>Received</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse($messages as $index => $m)
                <tr>
                  <td>{{ ($messages->currentPage()-1) * $messages->perPage() + $index + 1 }}</td>
                  <td>{{ $m->name }}</td>
                  <td>{{ $m->email }}</td>
                  <td>{{ $m->phone ?: '-' }}</td>
                  <td>{{ $m->subject ?: '-' }}</td>
                  <td>{{ $m->created_at->format('d/m/Y h:i A') }}</td>
                  <td>
                    <a href="{{ route('admin.contact-messages.view', $m->id) }}" class="btn btn-sm btn-primary">View</a>
                    <form action="{{ route('admin.contact-messages.delete', $m->id) }}" method="POST" style="display:inline-block" class="delete-message-form">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="7" class="text-center py-4">No messages yet.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <div class="p-3">
          {{ $messages->links() }}
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const deleteForms = document.querySelectorAll('.delete-message-form');
    deleteForms.forEach(function(form){
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
  });
  </script>

@include('admin.include.footer')


