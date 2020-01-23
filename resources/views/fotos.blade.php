@extends ('plantilla')

@section('seccion')
    <table>
    <thead>
        <tr>
            <th scope="col">A</th>
            <th scope="col">B</th>
            <th scope="col">C</th>
        <tr>
    </thead>
    <tbody>
    @foreach($numero as $item)
        <tr>
        <th scope="col">{{$item->a}}</th>
        <th scope="col">{{$item->b}}</th>
        <th scope="col">{{$item->c}}</th>
        <tr>
    @endforeach
    </tbody>
    </table>
@endsection