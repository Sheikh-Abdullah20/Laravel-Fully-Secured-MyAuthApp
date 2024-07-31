@extends('layout.adminLayout')

@section('title')
View
@endsection

@section('content')
<div class="container animate-slide">
    <div class="row text-center">
        <div class="col-md-12">
            <h1 class="display-1">
                Users
            </h1>
        </div>
    </div>
<hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID:</th>
                    <th scope="col">NAME:</th>
                    <th scope="col">EMAIL:</th>
                    <th scope="col">ROLE:</th>
                  </tr>
                </thead>
                <tbody>

                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection