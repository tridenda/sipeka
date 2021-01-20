<?php

function indo_currency($data) {
  $result = "Rp " . number_format($data, 0, ',', '.');
  return $result;
}

function indo_date($date, $day_print = false, $not_number = false)
{
	$day = array ( 1 =>    'Senin',
				'Selasa',
				'Rabu',
				'Kamis',
				'Jumat',
				'Sabtu',
				'Minggu'
			);
			
	$month = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split 	  = explode('-', $date);
	if( $not_number ) {
		$indo_date = $split[2] . ' ' . $month[ (int)$split[1] ] . ' ' . $split[0];
	} else {
		$indo_date = $month[ (int)$split[1] ] . ' ' . $split[0];
	}
	
	
	if ($day_print) {
		$num = date('N', strtotime($date));
		return $day[$num] . ', ' . $indo_date;
	}
	return $indo_date;
}