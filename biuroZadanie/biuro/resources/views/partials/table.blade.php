@extends('main.zarzadzaj')

@section('content')
    @foreach($rezerwacje as $rezerwacja)
        <tr>
        <th scope="row">{{$rezerwacja->id}}</th>
        <td>{{$rezerwacja->imie}}</td>
        <td>{{$rezerwacja->kiedy_rezerwacja}}</td>
        <td>{{$rezerwacja->nazwa}}</td>
        </tr>
    @endforeach
@endsection