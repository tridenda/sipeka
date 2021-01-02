<?php

function indo_currency($data) {
  $result = "Rp " . number_format($data, 2, ',', '.');
  return $result;
}