@extends('distributor.index')
@section('section')

    <div>
        <h2>Users</h2>
        <div class="create-wine-vendor">
            <a href="{{ route('distributors.create') }}">Add Wine Vendors</a>
        </div>
        @include('message')
        <table id="usersTable" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>

    </div>

    <script>
        $(document).ready(function() {
            $('#usersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("distributors.index") }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'user_phone', name: 'user_phone' },
                    { data: 'email', name: 'email' },
                    { data: 'status', name: 'status'},
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }, 
                ],
                // Order by created_at column by default
                order: [[6, 'desc']],
            });
        });

        
    </script>
    

@endsection