@include('admin.include.header')

<main class="content">
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center mb-4 page-head">
            <div>
                <h1 class="mb-1">RFQs Details</h1>
                <p class="text-muted mb-0">
                    Users, material approvals, orders and marketplace activity.
                </p>
            </div>
            <div>
                <a href="{{ route('admin.enquiries') }}" class="btn btn-dark fs-12">Back to Enquiries</a>
            </div>


        </div>

        <div class="card">
                    <div class="card-body">
                        

                        <p><strong>Name:</strong> {{ $user->name }}</p>
                                    <p><strong>Email:</strong> {{ $user->email }}</p>
                                    <p><strong>Phone:</strong> {{ $user->phone }}</p>
                                    <p><strong>Message:</strong> {{ $enquiry->message }}</p>
                                    <p><strong>Quantity:</strong> {{ $enquiry->qty }}</p>
                                    <p><strong>RFQs Date:</strong> {{ $enquiry->created_at }}</p>

                    </div>
                </div>


    </div>
</main>

@include('admin.include.footer')