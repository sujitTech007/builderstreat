@include('admin.include.header')

<body>
    <div class="wrapper active">
        <div class="page-content">
            <div class="page-container p-3">
                <div class="meetingPpage">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header border-bottom card-tabs d-flex flex-wrap align-items-center gap-2">
                                    <div class="flex-grow-1">
                                        <h4 class="header-title">Products for Seller: {{ $seller->name }}</h4>
                                    </div>
                                </div>
                                <div class="container mt-1">
                                    <div class="table-responsive theme_table">
                                        <table class="table table-bordered text-center align-middle">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th>Sr. No.</th>
                                                    <th>Product Name</th>
                                                    <th>Category</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($products as $index => $product)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->category ? $product->category->name : 'N/A' }}</td>
                                                    <td>
                                                        <form method="POST" action="{{ route('admin.products.status', $product) }}">
                                                            @csrf
                                                            @method('PATCH')
                                                            <select name="status" onchange="this.form.submit()" class="form-select form-select-sm w-auto d-inline">
                                                                <option value="1" {{ $product->status == '1' ? 'selected' : '' }}>Active</option>
                                                                <option value="0" {{ $product->status == '0' ? 'selected' : '' }}>Inactive</option>
                                                            </select>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-center gap-2">
                                                            <a href="{{ route('products.details', $product->id) }}" class="btn btn-info btn-sm" target="_blank" title="View"><i class="bi bi-eye"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        {{ $products->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.include.footer')
</body> 