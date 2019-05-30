@extends('master')

@section('content')
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr class="order" id="order-{{$order->id}}">
                <td class="order-id">{{ $order->id }}</td>
                <td>
                    <select class="form-control" name="status">
                        <option value="0" {{$order->status == 0 ? 'selected' : '' }}>Pending</option>
                        <option value="1" {{$order->status == 1 ? 'selected' : '' }}>Done</option>
                        <option value="2" {{$order->status == 2 ? 'selected' : '' }}>Deleted</option>
                    </select>
                </td>
            </tr>
            <button>TOp</button>
        @endforeach
    </tbody>
</table>
@endsection
