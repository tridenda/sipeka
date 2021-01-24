<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Receipt example</title>
        <style>
          * {
              font-size: 12px;
              font-family: 'Times New Roman';
              margin: 0;
          }

          td,
          th,
          tr,
          table {
              border-collapse: collapse;
          }

          .centered {
              text-align: center;
              align-content: center;
          }

          .ticket {
              width: 173px;
              max-width: 173px;
          }

          img {
              max-width: inherit;
              width: inherit;
          }

          @media print {
              .hidden-print,
              .hidden-print * {
                  display: none !important;
              }
          }
        </style>
    </head>
    <body onload="window.print()">
        <div class="ticket">
            <img style="margin-top: -1.5rem" src="<?=base_url('assets/img/')?>kedaibutin.png" alt="Logo">
            <p class="centered" style="border-bottom: dashed 1px; margin-top: -3rem; margin-bottom: 0.5rem"><strong style="font-size: 1.5rem">KEDAI TIN</strong>
                <br>Jln. Arteri Puri Telukjambe
                <br>Sirnabayar Karawang Barat
                <br><small>Telp. 0813-1872-2648</small></p>
            <table style="width:100%; border-bottom: dashed 1px; margin-bottom: 0.5rem;">
              <tr>
                <td>Faktur</td>
                <td>: <?=$sale->invoice?></td> 
              </tr>
              <tr>
                <td>Tanggal</td>
                <?php
                $phpdate = strtotime( $sale->date );
                $date = date( 'd-m-Y', $phpdate );
                ?>
                <td>: <?=$date?></td> 
              </tr>
              <tr>
                <td>No. Meja</td>
                <td>: <?=$sale->table_number?></td> 
              </tr>
              <tr>
                <td>Pramuniaga</td>
                <td>: <?=ucwords($sale->user_name)?></td> 
              </tr>
              <tr>
                <td>Pelanggan</td>
                <td>: <?=ucwords($sale->name)?></td> 
              </tr>
            </table>
            <table style="width:100%; border-bottom: dashed 1px; margin-bottom: 0.5rem;">
                <tbody>
                <?php foreach( $sale_details as $detail) : ?>
                    <tr>
                      <td colspan="2">
                        <strong><?=$detail->product_name?></strong>
                      </td>
                      <td style="text-align: right">
                        <strong><?=indo_currency($detail->price, TRUE)?></strong>
                      </td> 
                    </tr>
                    <?php if( $detail->discount > 0 ) { ?>
                    <tr>
                      <td colspan="2">
                        Potongan
                      </td>
                      <td style="text-align: right">
                      <?php $discount = ($detail->discount / $detail->price) * 100?>
                      <?=$detail->discount != 0 ? round($discount) : '0'?>
                       %</td> 
                    </tr>
                    <?php } else {
                      $discount = 0;
                    } ?>
                    <tr>
                      <td colspan="2">
                        <?php $after_discount = $detail->price - (($discount / 100) * $detail->price)?>
                        <?=$detail->quantity?> x <?=indo_currency($after_discount, TRUE)?>
                      </td>
                      <td style="text-align: right">
                        <?=indo_currency($detail->total, TRUE)?>
                      </td> 
                    </tr>
                  <?php endforeach?>
                </tbody>
            </table>
            <table style="width:100%; border-bottom: dashed 1px; margin-bottom: 0.5rem;">
                <tbody>
                    <tr>
                      <td></td>
                      <td style="text-align: right">
                        Jumlah
                      </td>
                      <td style="text-align: right">
                        <?=indo_currency($sale->total_price, TRUE)?>
                      </td> 
                    </tr>
                    <tr>
                      <td></td>
                      <td style="text-align: right">
                        Potongan
                      </td>
                      <td style="text-align: right">
                      <?php $discount = ($sale->discount / $sale->total_price) * 100?>
                      <?=indo_currency($discount, TRUE)?> %
                      </td> 
                    </tr>
                    <tr>
                      <td></td>
                      <td style="text-align: right">
                        <strong>Total</strong>
                      </td>
                      <td style="text-align: right">
                        <strong><?=indo_currency($sale->final_price, TRUE)?></strong>
                      </td> 
                    </tr>
                    <tr>
                      <td></td>
                      <td style="text-align: right">
                        <strong>Bayar</strong>
                      </td>
                      <td style="text-align: right">
                        <strong><?=indo_currency($sale->cash, TRUE)?></strong>
                      </td> 
                    </tr>
                    <tr>
                      <td></td>
                      <td style="text-align: right">
                        <strong>Kembalian</strong>
                      </td>
                      <td style="text-align: right">
                        <strong><?=indo_currency($sale->remaining, TRUE)?></strong>
                      </td> 
                    </tr>
                </tbody>
            </table>
            <p class="centered">
              Terima kasih atas kunjungan anda.
            </p>
        </div>
        <button id="btnPrint" class="hidden-print ticket" style="margin-top: 2rem">Print</button><br>
        <a href="<?=base_url('penjualan/daftar_penjualan')?>">
          <button id="btnPrint" class="hidden-print ticket" style="margin-top: 2rem">Kembali</button>
        </a>
        <script>
            const $btnPrint = document.querySelector("#btnPrint");
            $btnPrint.addEventListener("click", () => {
                window.print();
            });
        </script>
    </body>
</html>