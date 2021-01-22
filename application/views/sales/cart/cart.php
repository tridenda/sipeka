<?php
  $no = 1;
  if( $cart->num_rows() > 0 ) {
    foreach( $cart->result() as $crt ) {
  ?>
    <tr>
      <td><?=$no++?></td>
      <td><?=$crt->product_barcode?></td>
      <td><?=$crt->product_name?></td>
      <td><?=$crt->price?></td>
      <td><?=$crt->quantity?></td>
      <td><?=$crt->discount?></td>
      <td><?=$crt->total?></td>
      <td style="width: 8rem">
        <button id="update_cart" data-toggle="modal" data-target="#modal-product-update"
        data-cart_id="<?=$crt->cart_id?>"
        data-product_barcode="<?=$crt->product_barcode?>"
        data-product_name="<?=$crt->product_name?>"
        data-price="<?=$crt->price?>"
        data-quantity="<?=$crt->quantity?>"
        data-total="<?=$crt->total?>" class="btn btn-outline-primary primary btn-sm">
          <i class="far fa-edit"></i> Ubah
        </button>
        <button id="delete_cart" data-cartid="<?=$crt->cart_id?>" class="btn btn-outline-danger btn-sm">
          <i class="fa fa-trash"></i> Hapus
        </button>
      </td>
    </tr>
  <?php
    }
  } else {
?>
    <tr>
      <td colspan="8" class="text-center">Tidak ada produk</td>
    </tr>
<?php
  }
?>