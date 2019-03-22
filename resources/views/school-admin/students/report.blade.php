<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>


  </head>
  <body>
    <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12 col-lg-12 col-md-12 text-center">
            <h2 class="page-header">
              <i class="fa fa-globe"></i> Sergoek VTC.<br>
              Address: Eldoret, Uasin Gishu County<br>
              Email:  sergoek@gmail.com <br>
              <hr>
              <small class="pull-right"></small>
            </h2>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th> Admission Number</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th> Gender</th>
                <th> DOB</th>
                <th> Email</th>
                <th> Naional ID</th>
                <th> Phone</th>
                <th> Address</th>
              </tr>
            </thead>
            <tbody>
              @foreach($students as $student)
                <tr>
                  <td>{{$student->id}}</td>
                  <td>{{$student->reg_no}}</td>
                  <td>{{$student->first_name}}</td>
                  <td>{{$student->middle_name}}</td>
                  <td>{{$student->last_name}}</td>
                  <td>{{$student->gender}}</td>
                  <td>{{$student->dob}}</td>
                  <td>{{$student->email}}</td>
                  <td>{{$student->national_id}}</td>
                  <td>{{$student->mobile}}</td>
                  <td>{{$student->address}}</td>
                </tr>
              @endforeach
            </tbody>
        </table>
      </section>
      <!-- /.content -->
    </div>
    <!-- ./wrapper -->
  </body>
</html>
