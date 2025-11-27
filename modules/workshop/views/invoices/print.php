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
                    <td>Kendaraan : </td>
                    <td><?= $invoice->vehicle?->name?> - <?= $invoice->vehicle?->police_number?></td>
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
                    <td colspan="8"><h4 style="margin:0">SPARE PART</h4></td>
                </tr>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Diskon (Rp)</th>
                    <th>Sub Total</th>
                </tr>
                <?php $no = 1; $total_sparepart = 0; foreach($invoice->items as $item): if($item->product_type == 'SERVICE') continue; $total_sparepart+=$item->total_price; ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=$item->product_name?></td>
                    <td><?=$item->qty?></td>
                    <td><?=$item->product_unit?></td>
                    <td>Rp. <?=number_format($item->base_price)?></td>
                    <td>Rp. <?=number_format($item->total_discount)?></td>
                    <td>Rp. <?=number_format($item->total_price)?></td>
                </tr>
                <?php endforeach?>
                <tr>
                    <td colspan="6" align="right"><b>Total Spareparts</b></td>
                    <td>Rp. <?=number_format($total_sparepart)?></td>
                </tr>
                <tr>
                    <td colspan="8"><h4 style="margin:0">SERVIS</h4></td>
                </tr>
                <?php $no = 1; $total_service = 0; foreach($invoice->items as $item): if($item->product_type == 'SPARE PART') continue; $total_service+=$item->total_price;?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=$item->product_name?> <?= $item->vehicle_name ? '('.$item->vehicle_name.')' : ''?></td>
                    <td><?=$item->qty?></td>
                    <td><?=$item->product_unit?></td>
                    <td>Rp. <?=number_format($item->base_price)?></td>
                    <td>Rp. <?=number_format($item->total_discount)?></td>
                    <td>Rp. <?=number_format($item->total_price)?></td>
                </tr>
                <?php endforeach?>
                <tr>
                    <td colspan="6" align="right"><b>Total Repair</b></td>
                    <td>Rp. <?=number_format($total_service)?></td>
                </tr>
                <tr>
                    <td colspan="5" rowspan="4">
                        <b>Terbilang : </b> <?= ucwords(terbilang($invoice->final_price))?> Rupiah<br>
                        <b>Rekomendasi Servis : </b> <?= nl2br($invoice->description ?? '') ?>

                        <div style="display: flex;justify-content:space-around;margin-top:25px;">
                            <p>Penerima,</p>
                            <p>Hormat Kami,</p>
                        </div>
                    </td>
                    <td><b>Sub Total</b></td>
                    <td>Rp. <?=number_format($total_service+$total_sparepart)?></td>
                </tr>
                <tr>
                    <td><b>Total Diskon</b></td>
                    <td>Rp. <?=number_format($invoice->total_discount)?></td>
                </tr>
                <tr>
                    <td><b>PPN <?=$invoice->tax_alias?$invoice->tax_alias.'%':''?></b></td>
                    <td>Rp. <?=number_format($invoice->tax_price)?></td>
                </tr>
                <tr>
                    <td><b>Total</b></td>
                    <td>Rp. <?=number_format($invoice->final_price)?></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<script>
    window.print()
</script>