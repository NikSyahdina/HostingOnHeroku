@extends('layouts.app')
@section('content')
<section class="dashboard d-flex py-5">
<style>
    th{
        background-color: black;
    }
td,th,tr
{border-left:1px solid white;
border-top:1px solid white;}
table
{border-right:1px solid white;
border-bottom:1px solid white;
align-self: auto;
text-align: center;}
.danger{
    color: red;
}
.success{
    color:green;
}
</style>
    <html>
        <body>
    <div class="container mt-4">
        <div class="row mt-5">

            <div align="center">
            <table style="width: 100%;">
                    <tr >
                        <th style="padding:10px;font: size 20px;color:white;">Counsellor Name</th>
                        <th style="padding:10px;font: size 20px;color:white;">Session</th>
                        <th style="padding:10px;font: size 20px;color:white;">Date</th>
                        <th style="padding:10px;font: size 20px;color:white;">Time</th>
                        <th style="padding:10px;font: size 20px;color:white;">Status</th>

                    </tr>
                    @foreach ($appoint as $appoint)


                    <tr>
                        <td style="color: white;">{{$appoint->counsellor}}</td>
                        <td style="color: white;">{{$appoint->session}}</td>
                        <td style="color: white;">{{$appoint->date}}</td>
                        <td style="color: white;">{{$appoint->time}}</td>
                        <td style="color: white;">{{$appoint->status}}</td>
                       

                    @endforeach


                </table>
            </div>
        </div>
    </div>
                    </body>
    </html>
    </section>
@endsection
@section('scripts')
<script src="https://kit.fontawesome.com/3b8c65f5c7.js" crossorigin="anonymous"></script>
@endsection
