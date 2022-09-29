@extends('layouts.app')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<table class="table table-bordered">
    <thead>
    <tr>
        <th>S.No</th>
        <th>Voornaam</th>
        <th>Tussenvoegsel</th>
        <th>Achternaam</th>
        <th width="280px">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($jongeren as $jongeren)
        <tr>
            <td>{{ $jongeren->id }}</td>
            <td>{{ $jongeren->voornaam }}</td>
            <td>{{ $jongeren->tussenvoegsel }}</td>
            <td>{{ $jongeren->achternaam }}</td>
            <td>
                <form action="{{ route('jongeren.destroy',$jongeren->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('jongeren.edit',$jongeren->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $jongeren->links() !!}
</div>
</body>
</html>
