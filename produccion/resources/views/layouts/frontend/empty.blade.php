<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	@include('includes.front-head')
</head>
@php
	$bodyClass = (!empty($boxedLayout)) ? 'boxed-layout ' : '';
	$bodyClass .= (!empty($paceTop)) ? 'pace-top ' : '';
	$bodyClass .= (!empty($bodyExtraClass)) ? $bodyExtraClass . ' ' : '';
@endphp
<body class="{{ $bodyClass }}">
	@include('includes.component.page-loader')
	
	@yield('content')
	@include('includes.front-footer')
	@include('includes.front-page-js')
</body> 
</html>
