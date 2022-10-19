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
                <th>CPU</th>
                <th>Board</th>
                <th>Memory</th>
                <th>HDD</th>
                <th>Graphic</th>
                <th>Power Supply</th>
                <th>Drive</th>
                <th>Casing</th>
                <th>Monitor</th>
                <th>UPS</th>
                <th>K+M</th>
                <th>Antivirus</th>
                <th>Other</th>
                <th>Created By</th>
                <th>Updated By</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pc_sales as $data)
                <tr>
                    <td>{{ $data->c_name }}</td>
                    <td>{{ $data->c_phone }}</td>
                    <td>{{ date('d-m-Y', strtotime($data->date)) }}</td>
                    <td>{{ $data->branch }}</td>
                    <th>{{ $data->cpu }}</th>
                    <th>{{ $data->board }}</th>
                    <th>{{ $data->memory }}</th>
                    <th>{{ $data->hdd }}</th>
                    <th>{{ $data->graphic }}</th>
                    <th>{{ $data->power_supply }}</th>
                    <th>{{ $data->drive }}</th>
                    <th>{{ $data->casing }}</th>
                    <th>{{ $data->monitor }}</th>
                    <th>{{ $data->ups }}</th>
                    <th>{{ $data->keyboard_mouse }}</th>
                    <th>{{ $data->antivirus }}</th>
                    <th>{{ $data->other }}</th>
                    <td>{{ $data->c_by }}</td>
                    <td>{{ $data->u_by }}</td>
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
