@extends('layouts.app')

@section('scripts')
    <script type="application/javascript" defer>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token':$('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#usersTable').DataTable(
                {
                    "ajax": {
                        "url": "/admin/getUsers",
                        "type": "POST",
                        "datatype": "json"
                    },
                    "columns": [
                        { "data": "firstname", "name": "First Name", "autoWidth": true },
                        { "data": "lastname", "name": "Last Name", "autoWidth": true },
                        { "data": "email", "name": "Email", "autoWidth": true },
                        { "data": "phone", "name": "Phone Number", "autoWidth": true },
                        { "data": "isAdmin", "name": "IsAdmin", "autoWidth": true },
                        { "data": "created_at", "name": "Registered At", "autoWidth": true }
                    ],
                    "processing": true,
                    "serverSide": true,
                    "filter": true,
                    "orderMulti": false,
                    "pageLength": 10
                }
            );
        });
    </script>
@endsection

@section('content')

    <div class="container">
        <table id="usersTable" class="display" style="width:100%">
            <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>IsAdmin</th>
                <th>Registered At</th>
{{--                <th>Role</th>--}}
            </tr>
            </thead>
        </table>
    </div>

@endsection


