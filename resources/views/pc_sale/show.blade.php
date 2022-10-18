<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <title>PC Sale</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Roboto', sans-serif;
    }
    .wrapper {
      padding: 1rem;
    }
    table {
      margin-top: 1rem;
      width: 100%;
    }
    table, th, td {
      border: 2px solid black;
      border-collapse: collapse;
    }
    th, td {
      padding: 1rem;
    }
    .bg-dark {
      background-color: #000;
      color:#fff;
    }
    .left {
      text-align: left;
    }
  </style>
</head>
<body>
   <div class="wrapper">
    <h3>Linn IT Solution Co.,Ltd</h3>
    <table>
        <thead>
          <th>Linn Computer</th>
          <th>Sale To Service</th>
          <th class="bg-dark">PC Sales</th>
        </thead>
        <tbody>
          {{-- 1 --}}
         <tr>
          <th colspan="2" class="left">
            Customer Name - {{$data->c_name}}
          </th>
          <th class="left">Date - {{date('d-m-Y',strtotime($data->date))}}</th>
         </tr>
         {{-- 2 --}}
         <tr>
          <th colspan="3" class="left">Customer Phone - {{$data->c_phone}}</th>
         </tr>
         {{-- CPU --}}
         <tr>
          <th class="left">CPU</th>
          <th colspan="2" class="left">{{$data->cpu}}</th>
         </tr>
         {{-- Board --}}
         <tr>
          <th class="left">Board</th>
          <th colspan="2" class="left">{{$data->board}}</th>
         </tr>
         {{-- Memory --}}
         <tr>
          <th class="left">Memory</th>
          <th colspan="2" class="left">{{$data->memory}}</th>
         </tr>
          {{-- HDD --}}
          <tr>
            <th class="left">HDD</th>
            <th colspan="2" class="left">{{$data->hdd}}</th>
           </tr>
          {{-- Graphic --}}
         <tr>
          <th class="left">Graphic</th>
          <th colspan="2" class="left">{{$data->graphic}}</th>
         </tr>
          {{-- Power Supply --}}
          <tr>
            <th class="left">Power Supply</th>
            <th colspan="2" class="left">{{$data->power_supply}}</th>
           </tr>
            {{-- Drive --}}
          <tr>
            <th class="left">Drive</th>
            <th colspan="2" class="left">{{$data->drive}}</th>
           </tr>
            {{-- Casing --}}
          <tr>
            <th class="left">Casing</th>
            <th colspan="2" class="left">{{$data->casing}}</th>
           </tr>
            {{-- Monitor --}}
          <tr>
            <th class="left">Monitor</th>
            <th colspan="2" class="left">{{$data->monitor}}</th>
           </tr>
            {{-- UPS --}}
          <tr>
            <th class="left">UPS</th>
            <th colspan="2" class="left">{{$data->ups}}</th>
           </tr>
            {{-- K + M --}}
          <tr>
            <th class="left">K + M</th>
            <th colspan="2" class="left">{{$data->keyboard_mouse}}</th>
           </tr>
            {{-- Antivirus --}}
          <tr>
            <th class="left">Antivirus</th>
            <th colspan="2" class="left">{{$data->antivirus}}</th>
           </tr>

             {{-- Other --}}
          <tr>
            <th class="left">Other</th>
            <th colspan="2" class="left">{{$data->other}}</th>
           </tr>
        </tbody>
    </table>
   </div>
</body>
</html>