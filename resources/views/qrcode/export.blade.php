<html>
    <head>
    </head>
    <body>
      <table class="table table-bordered styled-table ">
         <thead>
            <tr>
              <th>QR Code</th>
               <th>QR Link</th>
               <th>Item Name</th>
               <th>Category</th>
            </tr>
          
         </thead>
       
         <tbody>
            @foreach($qr_list as $key=>$qr)
            <tr>
                <td>
                    @if($qr->photo != null)
                    <img src="{{public_path($qr->path.$qr->photo)}}" style="width:100px;height: 100px;">
                    @endif
                </td>
                <td>{{$qr->qr_link}}</td>
                <td>{{$qr->remark}}</td>
                <td>{{$qr->category_name}}</td>
            </tr>
                
            @endforeach
         </tbody>
      </table>
    </body>
</html>