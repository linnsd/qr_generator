<html>
    <head>
    </head>
    <body>
      <table class="table table-bordered styled-table ">
        <thead class="table-primary">
          <tr> 
             <th>Name</th>
             <th>Phone</th>
             <th>Date</th>
             <th>Branch</th>
             <th>Created By</th>
             <th>Updated By</th>
          </tr>
        </thead>
        <tbody>
         @forelse ($pc_sales as $data)
             <tr>
                 <td>{{$data->c_name}}</td>
                 <td>{{$data->c_phone}}</td>
                 <td>{{date('d-m-Y',strtotime($data->date))}}</td>
                 <td>{{$data->branch}}</td>
                 <td>{{$data->c_by}}</td>
                 <td>{{$data->u_by}}</td>
             </tr>
         @empty
             <tr>
                 <td colspan="6" style="text-align: center">No Data</td>
             </tr>
         @endforelse
        </tbody>
      </table>
    </body>
</html>