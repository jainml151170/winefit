@extends('admin.index')
@section('section')

    <div>
        <h2>Wine Machines</h2>
        <div class="create-wine-machine">
            <a href="{{ route('wine-machines.create') }}">Add Wine Machine</a>
        </div>
        @include('message')
        <table id="wineMachinesTable" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Machine Serial Number</th>
                    <th>Price</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>

    </div>

    <script>
        $(document).ready(function() {
            $('#wineMachinesTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("wine-machines.index") }}',
                columns: [
                    { data: 'id', name: 'id', visible: true },
                    { data: 'machine_sn', name: 'machine_sn', title: 'Machine Serial Number' },
                    { data: 'price', name: 'price', title: 'Price', render: $.fn.dataTable.render.number(',', '.', 2, '$') },
                    { data: 'created_at', name: 'created_at', title: 'Created At', render: function(data) { return moment(data).format('YYYY-MM-DD HH:mm:ss'); } },
                    { data: 'updated_at', name: 'updated_at', title: 'Updated At', render: function(data) { return moment(data).format('YYYY-MM-DD HH:mm:ss'); } },
                    { data: 'action', name: 'action'}
                ],
                order: [[3, 'desc']], // Order by created_at column by default
            });
        });
    </script>

@endsection