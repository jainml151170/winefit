@extends('admin.index')
@section('section')

    <div>
        <h2>Users</h2>
        <div class="create-wine-machine">
            <a href="{{ route('users.create') }}">Add Users</a>
        </div>
        @include('message')
        <table id="usersTable" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Created By</th>
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
                ajax: '{{ route("users.index") }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'user_phone', name: 'user_phone' },
                    { data: 'email', name: 'email' },
                    { data: 'role', name: 'role' }, 
                    { 
                        data: 'status',
                        name: 'status',
                        render: function(data, type, full, meta) {
                            // Use a switch to display a toggle switch
                            var toggleBtn = '<label class="switch">'
                                + '<input type="checkbox" class="toggle-status" data-id="' + full.id + '" ' + (data ? 'checked' : '') + '>'
                                + '<span class="slider round"></span>'
                                + '</label>';
                            return toggleBtn;
                        }
                    },
                    { data: 'created_by', name: 'created_by' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }, 
                ],
                // Order by created_at column by default
                order: [[8, 'desc']],
            });
            $('#usersTable').on('change', '.toggle-status', function() {
                var userId = $(this).data('id');

                $.ajax({
                    url: '/admin/admin-user-status/' + userId,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                       alert("Status Changed Successfully");
                        // Optionally, you can handle the response and update the UI accordingly
                    },
                    error: function(error) {   
                        alert("Status can not be change now!");

                    }
                });
            });
        });

        
    </script>
    

@endsection