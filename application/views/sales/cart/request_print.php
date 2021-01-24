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
            <p class="centered" style="border-bottom: dashed 1px; margin-bottom: 0.5rem">
              <strong style="font-size: 5rem"><?=$sale->table_number?></strong>
              <br><strong style="font-size: 2rem;"><?=ucwords($sale->name)?></strong>
            </p>
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
                <td>Pramuniaga</td>
                <td>: <?=ucwords($sale->user_name)?></td> 
              </tr>
            </table>
            <table style="width:100%; border-bottom: dashed 1px; margin-bottom: 0.5rem;">
                <tbody>
                <?php $no = 1?>
                <?php foreach( $sale_details as $detail) : ?>
                    <tr>
                      <td><strong><?=$no++?>.</strong></td>
                      <td>
                        <strong><?=$detail->product_name?></strong>
                      </td>
                      <td style="text-align: right">
                        <strong><?=$detail->quantity?></strong>
                      </td> 
                    </tr>
                  <?php endforeach?>
                </tbody>
            </table>
            <p style="margin-top: 1rem">
              <strong>Catatan: </strong>
              <br><?=$sale->notes?>
            </p>
        </div>
        <button id="btnPrint" class="hidden-print ticket" style="margin-top: 2rem">Print</button><br>
        <a href="<?=base_url('penjualan/pesanan_baru')?>">
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