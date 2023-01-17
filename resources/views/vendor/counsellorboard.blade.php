<div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
            <th>ID</th>
            <th>Name</th>
            <th>Leave Type</th>
            <th>Leave Start date</th>
            <th>Leave End date</th>
            <th>Remark</th>
            <th>Approve</th>
            <th>Decline</th>  
            </thead>
            <tbody> 
              @foreach ($leaves as $leave)          
              <tr>
                <td>{{$leave->id}}</td>
                <td>{{$leave->applied_by->name}}</td>
                <td>{{$leave->type->type}}</td>
                <td>{{$leave->start}}</td>
                <td>{{$leave->end}}</td>
                <td>{{$leave->remarks}}</td>
                <td>
                    <a href="#" class="btn btn-success">Approve</a>
                </td>
                <td>
                    <a href="#" class="btn btn-danger">Decline</a>