@extends('layout')

@section('content')
    <div class="row">
        <form action="/messages/respond/{{ $message->id }}" method="post">
            <div class="col-md-6">
                <dl class="dl-horizontal">
                    <dt>First Name</dt>
                    <dd>{{ $message->first_name }}</dd>

                    <dt>Last Name</dt>
                    <dd>{{ $message->last_name }}</dd>

                    <dt>Phone</dt>
                    <dd>{{ $message->phone }}</dd>

                    <dt>Email</dt>
                    <dd>{{ $message->email }}</dd>
                </dl>
                <dl>
                    <dt>Message</dt>
                    <dd>{{ $message->message }}</dd>
                </dl>

                <div class="form-group">
                    <label>Response</label>
                    <textarea name="response" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Respond</button>
            </div>
        </form>
    </div>
@endsection
