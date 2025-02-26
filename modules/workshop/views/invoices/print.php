<table align="center" border="1" cellspacing="0" cellpadding="5">
    <tr>
        <td width="150px">
            <img src="<?= getSidebarLogo() ?>" alt="" width="120px">
        </td>
        <td style="vertical-align: middle;" width="400px">
            <h2 style="margin: 0;"><?= env('APP_BUSINESS_NAME')?></h2>
            <p style="margin: 0;"><?= env('APP_BUSINESS_ADDRESS')?></p>
        </td>
        <td>
            FAKTUR PENJUALAN
        </td>
    </tr>

    <tr>
        <td colspan="3">
            <table width="100%">
                <tr>
                    <td>Pelanggan : </td>
                    <td><?= $invoice->customer->name?></td>
                    <td>Tanggal : </td>
                    <td><?= $invoice->created_at?></td>
                </tr>
                <tr>
                    <td>Total Biaya : </td>
                    <td>Rp. <?= number_format($invoice->final_price)?></td>
                    <td>No. Invoice : </td>
                    <td><?= $invoice->code?></td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="3">
        <br>
            <table width="100%" border="1" cellspacing="0" cellpadding="5">
                <tr>
                    <td colspan="7"><h4 style="margin:0">SPARE PART</h4></td>
                </tr>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Diskon</th>
                    <th>Sub Total</th>
                </tr>
                <?php $no = 1; foreach($invoice->items as $item): if($item->product_type == 'SERVICE') continue; ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=$item->product_name?></td>
                    <td><?=$item->product_unit?></td>
                    <td><?=$item->qty?></td>
                    <td>Rp. <?=number_format($item->base_price)?></td>
                    <td>Rp. <?=number_format($item->total_discount)?></td>
                    <td>Rp. <?=number_format($item->final_price)?></td>
                </tr>
                <?php endforeach?>
                <tr>
                    <td colspan="7"><h4 style="margin:0">SERVIS</h4></td>
                </tr>
                <?php $no = 1; foreach($invoice->items as $item): if($item->product_type == 'SPARE PART') continue; ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=$item->product_name?> <?= $item->vehicle_name ? '('.$item->vehicle_name.')' : ''?></td>
                    <td><?=$item->product_unit?></td>
                    <td><?=$item->qty?></td>
                    <td>Rp. <?=number_format($item->base_price)?></td>
                    <td>Rp. <?=number_format($item->total_discount)?></td>
                    <td>Rp. <?=number_format($item->final_price)?></td>
                </tr>
                <?php endforeach?>
                <tr>
                    <td colspan="4" rowspan="4">
                        <b>Terbilang : </b> <?= ucwords(terbilang($invoice->final_price))?> Rupiah<br>
                        <b>Keterangan : </b> -
                    </td>
                    <td>Sub Total</td>
                    <td>Rp. <?=number_format($invoice->total_price)?></td>
                </tr>
                <tr>
                    <td>Total Diskon</td>
                    <td>Rp. <?=number_format($invoice->total_discount)?></td>
                </tr>
                <tr>
                    <td>PPN</td>
                    <td>Rp. 0</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>Rp. <?=number_format($invoice->final_price)?></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<script>
    window.print()
</script>