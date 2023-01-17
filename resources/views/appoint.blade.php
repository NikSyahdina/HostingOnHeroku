<style>
    h4 {
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
        font-size: 20px;
        color: white;

    }

    body {
        background-color: rgb(32, 28, 29);
    }

    select,
    input[type=date],
    input[type=time] {
        width: 100%;
        padding: 16px 20px;
        border: none;
        border-radius: 4px;
        background-color: #f1f1f1;
        margin: 10px;
    }

    div {
        border-radius: 5px;
        background-color: #20c997;
        padding: 20px;
        width: 50%;
        margin: auto;
    }

    form {
        margin: auto;
        padding: 10px 10px;
    }

    label {
        color: rgb(9, 8, 8);
        font-family: Arial, Helvetica, sans-serif;
        font-weight: 100;
    }

    button {
        background-color: #04AA6D;
        border: none;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        margin: 10px;
        cursor: pointer;

    }

    .btn {
        background-color: #04AA6D;
        border: none;
        color: rgb(20, 18, 18);
        padding: 10px;
        text-decoration: none;
        cursor: pointer;
        text-align: center;
        display: inline-block;
    }

    button:hover {
        background-color: #e9f3e9
    }

    .btn:hover {
        background-color: #e9f3e9
    }

    button:active {
        background-color: #3e8e41;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
    }
</style>

<body>
    <html>
    <a class="btn" href="{{ url('/home') }}">Home</a>
    <h4 style="center"; class="panel-title">Book Appointment</h4>
    <div class="container">
        <form class="container" action="/appoint" method="POST">
            @csrf

            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control"><br>
<br>

            <label for="counsellor">Counsellor</label>
            <select width="100px"; name="counsellor" class="form-control" required="required">
                <option value="">Select Counsellor</option>
                <option value="Dr Amalina">Dr Amalina</option>
                {{-- <option value="Dr Chan Miew">Dr Chan Miew</option> --}}

            </select>

            <label for="session">Session: </label>
            <select name="session" class="form-control" required="required">
                <option value="">Select Session</option>
                <option value="Online">Online</option>
                <option value="Face-to-face">Face-to-face Session</option>
            </select>


            <label for="date">Date</label>
            <input type="date" class="form-control datepicker" name="date" required="required"
                data-date-format="yyyy-mm-dd" id='datepicker'>


            <label for="time">Time</label>

            <input type="time" class="form-control" name="time" id="timepicker1" required="required">eg :10:00
            PM

            <br>


            <button class="btn-reverse text-center mb-3"
                style="color:black"onclick="myFunction()"class="btn btn-o btn-primary">Submit</button>

            {{-- <script>
        function myFunction() {
            alert("Your appointment successfully booked");
        }
    </script> --}}


        </form>
    </div>

    </html>
</body>
