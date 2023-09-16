<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Student</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('students.update', $students->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $students->first_name }}">
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $students->last_name }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $students->email }}">
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" id="address" name="address">{{ $students->address }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option value="male" {{ $students->gender === 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $students->gender === 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="department_id">Department</label>
                                <input type="text" class="form-control" id="department_id" name="department_id" value="{{ $students->department_id }}">
                            </div><br>

                            <button type="submit" class="btn btn-success px-4">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
