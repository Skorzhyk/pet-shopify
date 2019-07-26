@extends('layout')

@section('content')
    <div id="admin-email-form">
        <form action="/config/save" method="post">
            <div class="form-group">
                <input type="text" name="config[admin_email]" placeholder="Admin Email" class="form-control" value="{{ $adminEmail }}">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

    <div id="filter">
        <form action="/" method="get">
            <div class="filter-box">
                <div class="form-group">
                    <input type="text" name="filter[id]" class="form-control" placeholder="ID" value="{{ $filter['id'] or '' }}">
                </div>
                <div class="form-group">
                    <input type="text" name="filter[first_name]" class="form-control" placeholder="First Name" value="{{ $filter['first_name'] or '' }}">
                </div>
                <div class="form-group">
                    <input type="text" name="filter[last_name]" class="form-control" placeholder="Last Name" value="{{ $filter['last_name'] or '' }}">
                </div>
                <div class="form-group">
                    <input type="text" name="filter[phone]" class="form-control" placeholder="Phone" value="{{ $filter['phone'] or '' }}">
                </div>
                <div class="form-group">
                    <input type="text" name="filter[email]" class="form-control" placeholder="Email" value="{{ $filter['email'] or '' }}">
                </div>
                <div class="form-group">
                    <input type="text" name="filter[site_id]" class="form-control" placeholder="Site" value="{{ $filter['site_id'] or '' }}">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Apply Filters</button>
        </form>
    </div>

    <table id="messages-grid" class="table table-bordered">
        <thead>
            <tr>
                <th data-field="id">ID</th>
                <th data-field="first_name">First Name</th>
                <th data-field="last_name">Last Name</th>
                <th data-field="email">Email</th>
                <th data-field="phone">Phone</th>
                <th data-field="site_id">Site</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $message)
                    <tr onclick="document.location = '{{ action('MessagesController@show', [$message->id]) }}';">
                        <td>{{ $message->id }}</td>
                        <td>{{ $message->first_name }}</td>
                        <td>{{ $message->last_name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->phone }}</td>
                        <td>{{ $message->site_id }}</td>
                    </tr>
            @endforeach
        </tbody>
    </table>
    {{ $messages->appends(request()->except('page'))->links() }}
@endsection