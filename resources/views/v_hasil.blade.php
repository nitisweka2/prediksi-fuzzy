@extends('layout.v_template')
@section('content')
<h2>Hasil dari perhitungan keseluruhan data, didapatkan MAPE sebesar
<?php $x = 0;
$mape = 0;
$ape_total= 0;
?>
@foreach ($trainings as $data)
<?php 
$mape = $mape + $data->ape;
$ape_total = $ape_total +$data->ape;
$x = $x+1;?>
@endforeach
<?php $mape = $mape / $x;?>
{{$mape}}
@endsection