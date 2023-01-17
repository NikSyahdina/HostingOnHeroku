
<h4 class="panel-title">Book Appointment</h4>

    <form class="main-form" action="/appointment" method="POST">
    <div class="form-group">
        <label for="counsellor">
            Counsellor
        </label>
        <select width="100px"; name="counsellor" class="form-control"
             required="required">
            <option value="">Select Counsellor</option>
            <option value="Dose 1">Dr Amalina</option>
            <option value="Dose 2">Dr Chan Miew</option>

        </select>
    </div>

    <div class="form-group">
        <label for="session">
            Session:
        </label>
        <select name="session" class="form-control"
            required="required">
            <option value="">Select Session</option>
            <option value="Dose 1">Online</option>
            <option value="Dose 2">Face-to-face Session</option>
        </select>
    </div>


    <div class="form-group">
        <label for="date">
            Date
        </label>
        <input type="date" class="form-control datepicker" name="date" required="required"
            data-date-format="yyyy-mm-dd" id='datepicker'>



    </div>

    <div class="form-group">
        <label for="time">

            Time

        </label>

        <input type="time" class="form-control" name="time" id="timepicker1"
            required="required">eg :
        10:00 PM


    </div>
    <br>
    <div>

        <button class="btn-reverse text-center mb-3"
            style="color:black"onclick="myFunction()"class="btn btn-o btn-primary">Submit</button>

       {{-- <script>
            function myFunction() {
                alert("Your appointment successfully booked");
            }
        </script>--}}
    </div>

</div>
