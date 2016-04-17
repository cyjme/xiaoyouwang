@extends('layouts.main')
@section('content')
    <meta name="_token" content="{{ csrf_token() }}"/>
            <div id="UpdateUserInfo"></div>
    <script type="text/babel" src="/js/react/updateUserInfo.js"></script>
@endsection

