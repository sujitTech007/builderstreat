@include('admin.include.header')

<main class="content">
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center mb-4 page-head">
            <div>
                <h1 class="mb-1">Contact Messages</h1>
                <p class="text-muted mb-0">
                    Users, material approvals, orders and marketplace activity.
                </p>
            </div>


        </div>

        <div class="table-responsive theme_table">
            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">
                    </tr>
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
                    <div class="table-actions d-flex gap-2">
                      <a href="{{ route('admin.contact-messages.view', $m->id) }}" class="btn btn-sm btn-info text-white"><i class="fa-solid fa-eye"></i></a>
                      <form action="{{ route('admin.contact-messages.delete', $m->id) }}" method="POST" style="display:inline-block" class="delete-message-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                      </form>
                    </div>
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



    </div>
</main>

@include('admin.include.footer')