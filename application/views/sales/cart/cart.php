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
      <td id="total"><?=$crt->total?></td>
      <td style="width: 8rem">
        <button id="update_cart" data-toggle="modal" data-target="#modal-product-update"
        data-update_cart_id="<?=$crt->cart_id?>"
        data-update_product_barcode="<?=$crt->product_barcode?>"
        data-update_product_name="<?=$crt->product_name?>"
        data-update_price="<?=$crt->price?>"
        data-update_quantity="<?=$crt->quantity?>"
        data-update_total="<?=$crt->total?>" 
        data-update_discount="<?=$crt->discount?>" class="btn btn-outline-primary primary btn-sm">
          <i class="far fa-edit"></i> Ubah
        </button>
        <button id="delete_cart" data-cart_id="<?=$crt->cart_id?>" class="btn btn-outline-danger btn-sm">
          <i class="far fa-trash-alt"></i> Hapus
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