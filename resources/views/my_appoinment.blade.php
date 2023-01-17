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
    color:rgb(86, 253, 86);
}
</style>
    <html>
        <body>
    <div class="container mt-4">
        <div class="row mt-5">

            <div align="center">
            <table style="width: 100%;">
                    <tr >
                        <th style="padding:10px;font: size 20px;color:white;">Patient Name</th>
                        <th style="padding:10px;font: size 20px;color:white;">Counsellor Name</th>
                        <th style="padding:10px;font: size 20px;color:white;">Session</th>
                        <th style="padding:10px;font: size 20px;color:white;">Date</th>
                        <th style="padding:10px;font: size 20px;color:white;">Time</th>
                        <th style="padding:10px;font: size 20px;color:white;">Status</th>
                        <th style="padding:10px;font: size 20px;color:white;">Approved</th>
                        <th style="padding:10px;font: size 20px;color:white;">Cancelled</th>

                    </tr>
                    @foreach ($table as $appoint)


                    <tr>
                        <td style="color: white;">{{$appoint->name}}</td>
                        <td style="color: white;">{{$appoint->counsellor}}</td>
                        <td style="color: white;">{{$appoint->session}}</td>
                        <td style="color: white;">{{$appoint->date}}</td>
                        <td style="color: white;">{{$appoint->time}}</td>
                        <td style="color: white;">{{$appoint->status}}</td>
                        <td>
                            <a class="success" href="{{url('approved',$appoint->id)}}">Approved</a>
                        </td>
                        <td>
                            <a class="danger"href="{{url('cancelled',$appoint->id)}}">Cancelled</a>
                        </td>
                    </tr>
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
