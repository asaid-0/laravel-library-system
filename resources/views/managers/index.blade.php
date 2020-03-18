  @extends('layout')
  @section('mainContent')
    <h1>list Admins</h1>
    <table class = "table.table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>IsAdmin</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mgrs as $mgr)
            <tr>
                <td>
                    <a href="manager/{{mgr->id}}">{{$mgr->name}}</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection 