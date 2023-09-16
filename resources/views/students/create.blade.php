<x-app-layout>
<div class="py-3">
    <title>Students Form</title>
</div>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
<div class="container">
  <main>
    <div class>
      <h2>Information Form</h2>
        @php
            // dd($errors->all());
        @endphp
    <div class="row g-5">
      <div class="col-md-8 col-lg-4 order-md-last">
      </div>
      <div class="col-md-7 col-lg-8">
        <form class="needs-validation" method="post" action="{{ route('students.store')}}">
            @csrf
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" name="first_name" class="form-control" id="firstName" placeholder="First Name">

            @if ($errors->has('first_name'))
            <p style="color: brown;" class="mb-0">
                Valid first name is required.
            </p>
            @endif
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" name="last_name" class="form-control" id="lastName" placeholder="" value="" required>
            @if ($errors->has('last_name'))
            <p style="color: brown;" class="mb-0">
                Last name is required.
            </p>
            @endif

            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted"></span></label>
              <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com">
              @if ($errors->has('email'))
              <p style="color: brown;" class="mb-0">
                  Invalid email.
              </p>
              @endif
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" name="address" class="form-control" id="address" placeholder="your address" required nullable>
              @if ($errors->has('address'))
              <p style="color: brown;" class="mb-0">
                  Address is required.
              </p>
              @endif
            </div>


            <div class="col-md-5">
              <label for="department_id" class="form-label">Department</label>
              <select class="form-select" name="department_id" id="department_id" required>
                <option value="">Choose...</option>
                <option value="1">Mechanical</option>
                <option value="2">Electrical</option>
                <option value="3">Civil</option>
                <option value="4">Computer</option>
              </select>
              @if ($errors->has('department_id'))
              <p style="color: brown;" class="mb-0">
                  Select a department.
              </p>
              @endif
            </div>


            <h4 class="my-3">Gender</h4>
            <div class="my-3">
                <div class="form-check">
                    <input id="credit" name="gender" value="male" type="radio" class="form-check-input" checked required>
                    <label class="form-check-label" for="credit">Male</label>
                </div>
                <div class="form-check">
                    <input id="debit" name="gender" value="female" type="radio" class="form-check-input" required>
                    <label class="form-check-label" for="debit">Female</label>
                </div>
            </div>
          <button class="btn btn-info btn-md" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </main>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="/assets/js/form-validation.js"></script>
  </body>
</html>
</x-app-layout>
