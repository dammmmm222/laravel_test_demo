@if($errors->any())
{{--    @php--}}
{{--        dd($errors->all());--}}
{{-- @endphp--}}
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
@if ( Session::has('success') )
        <strong>{{ Session::get('success') }}</strong>
@endif
@if ( Session::has('error') )
    <strong>{{ Session::get('error') }}</strong>
@endif
