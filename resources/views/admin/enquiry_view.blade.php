@include('admin.include.header')

<div class="page-content">


    <div class="meetingPpage">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header border-bottom card-tabs d-flex flex-wrap align-items-center gap-2">
                        

                        <div class="container">
                            <h1>RFQs Details</h1>
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
                            <a href="{{ route('admin.enquiries') }}" class="btn btn-secondary">Back to Enquiries</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                        @include('admin.include.footer')