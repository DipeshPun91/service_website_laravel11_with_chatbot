<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>NextGen Solutions</title>
    <!-- Font Awesome Cdn Link -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">

      <!-- Styles / Scripts -->
      @vite(['resources/css/style.css', 'resources/js/script.js'])
  </head>
  <body>
    <div class="container">
      @include('partials.sidebar')

      <section class="main">
        <div class="main-top">
          <h1>Attendance</h1>
          <i class="fas fa-user-cog"></i>
        </div>
        <div class="users">
          <div class="card">
            <h4>Customer</h4>
            <div class="stat">
              <h5>Total Customers</h5>
              <span>50</span> 
            </div>
          </div>

          <div class="card">
            <h4>Inquiries</h4>
            <div class="stat">
              <h5>Total Inquiries</h5>
              <span>{{ $inquiries->count() }}</span> 
            </div>
          </div>

          <div class="card">
            <h4>Revenue</h4>
            <div class="stat">
              <h5>Total Revenue</h5>
              <span>$15,000</span>
            </div>
          </div>
        </div>

        <section class="attendance">
          <div class="attendance-list">
            <h1>Inquiry List</h1>
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Company</th>
                  <th>Job Title</th>
                  <th>Inquiry Date</th>
                  <th>Details</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($inquiries as $inquiry)
                  <tr>
                    <td>{{ $inquiry->id }}</td>
                    <td>{{ $inquiry->name }}</td>
                    <td>{{ $inquiry->email }}</td>
                    <td>{{ $inquiry->company_name }}</td>
                    <td>{{ $inquiry->job_title }}</td>
                    <td>{{ \Carbon\Carbon::parse($inquiry->created_at)->format('d-m-Y') }}</td>
                    <td onclick="window.location='{{ route('inquiries.show', $inquiry->id) }}'" class="clickable-row"><button>View</button></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </section>
      </section>
    </div>
  </body>
</html>
