<x-app-layout>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Email</th>
              <th scope="col">Address</th>
              <th scope="col">Department</th>
              <th scope="col">Gender</th>
              <th class="px-4" scope="col">Action</th>
            </tr>
          </thead>
          @forelse ($students as $key => $value )
              <tr>
                <td>{{++$key}}</td>
                <td>{{$value->first_name}}</td>
                <td>{{$value->last_name}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->address}}</td>
                <td>{{$value->department_id}}</td>
                <td>{{$value->gender}}</td>
                <td><a href="{{ route('students.edit', $value->id)}}" class="btn btn-primary">Edit</a>
                <form action="{{route('students.destroy', $value->id)}}" method="POST" style="display:inline">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Delete student?')">Delete</button>
                </form>
            </td>
        </tr>
          @empty
          <tr colspan="7">No data found.</tr>

          @endforelse

          <tbody>

          </tbody>
        </table>
        {{$students->links()}}


    </div>


</x-app-layout>
