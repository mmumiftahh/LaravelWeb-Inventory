<style>
    td{
        text-align: center;
    }
    
    table{
        border-collapse: collapse;
    }
    th,td{
        padding: 10px;
    }
    
    h1{
        margin-bottom: -13px;
    }

    thead{
        background: #919190;
    }

    .tglprint{
        
        float: right;
    }

    .nama{
        float: left;
    }

</style>
<h1>
    Report Item 
</h1>
<br>
<hr>
<p class="tglprint">Date Print : {{ date("D").", ".date("d-M-Y") }}</p>
<table width="100%" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Item</th>
            <th>Total</th>
            <th>Room</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $field)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $field->name }}</td>
            <td>{{ $field->total }}</td>
            <td>{{ $field->room->name }}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="2">Total Semua</td>
            <td>{{ $total }}</td>
        </tr>
    </tbody>
</table>
<script>
    window.print();
</script>