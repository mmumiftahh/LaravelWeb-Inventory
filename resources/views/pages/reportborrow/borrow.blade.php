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
    @if($type == "all")
    Report All Borrowed
    @elseif($type == "today")
    Report Borrowed Today
    @elseif($type == "broken")
    Report Item Broken
    @endif
</h1>
<br>
<hr>
<p class="tglprint">Date Print : {{ date("D").", ".date("d-M-Y") }}</p>
<p class="nama">Name Printed : {{ Auth::user()->name }}</p>
@if($type == "all" || $type == "today" || $type == "latest")
<table width="100%" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Borrow Date</th>
            <th>Return Date</th>
            <th>Employee</th>
            <th>Operator</th>
            <th>Status</th>
            <th>Total Items</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $field)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $field->borrow_date }}</td>
            <td>{{ $field->return_date }}</td>
            <td>{{ $field->employee->name }}</td>
            <td>
                @if($field->user == null)
                
                @else
                {{ $field->user->name }}
                @endif
            </td>
            <td class="text-center">
                @if($field->status == "book")
                <span class="badge badge-warning">Booking</span>
                @endif
                @if($field->status == "uncomplete")
                <span class="badge badge-info">Uncomplete</span>
                @endif
                @if($field->status == "borrowed")
                <span class="badge badge-primary">Borrowed</span>
                @endif
                @if($field->status == "returned")
                <span class="badge badge-info">Returned</span>
                @endif
            </td>
            <td>{{ count($field->detail_borrow) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@elseif($type == "broken")
<table width="100%" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Item</th>
            <th>Total Broken</th>
            <th>Borrower</th>
            <th>Operator</th>
            <th>Broken Date</th>
            <th>Fix Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $field)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $field->item->name }}</td>
            <td>{{ $field->total }}</td>
            <td>{{ $field->borrow->employee->name }}</td>
            <td>{{ $field->borrow->user->name }}</td>
            <td>{{ $field->broken_date }}</td>
            <td>{{ $field->fix_date }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

<script>
    window.print();
</script>