<tr class="detail item-header">
    <th></th>
    <th colspan="3" class="text-center">Item ID / Description</th>
    <th colspan="2">
        <div class="text-center"><span class="label context">Ordered</span></div>
        <div class="row">
            <div class="col-xs-6">Cases</div>
            <div class="col-xs-6">Bottles</div>
        </div>
    </th>
    <th class="text-right" width="100">Total</th>
    <th colspan="2">
        <div class="text-center"><span class="label context">Shipped</span></div>
        <div class="row">
            <div class="col-xs-6">Cases</div>
            <div class="col-xs-6">Bottles</div>
        </div>
    </th>
    <th>Notes</th>
    <th>Reorder</th>
    <th>Documents</th>
</tr>
<?php $details = $orderpanel->get_orderdetails($order); ?>
<?php foreach ($details as $detail) : ?>
    <tr class="detail">
        <td></td>
        <td colspan="3">
            <?= $orderpanel->generate_detailvieweditlink($order, $detail); ?>
            <?= strlen($detail->vendoritemid) ? "($detail->vendoritemid)" : ''; ?>
            <small class="label label-primary"><?= "".$detail->get_qtypercase() . " per case"; ?></small> <br>
            <?= $detail->desc1. ' ' . $detail->desc2 ; ?>
        </td>
        <td class="text-right">
            <?= $detail->get_caseqty(); ?>
            <?php if ($detail->get_caseqty()) : ?>
                <button type="button" class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="<?= $detail->get_casebottleqty().' bottles'; ?>">?</button>
            <?php endif; ?>
        </td>
        <td class="text-right"><?= $detail->get_bottleqty(); ?></td>
        <td class="text-right">
            <span class="has-hover" data-toggle="tooltip" data-placement="top" title="<?= 'Price / UoM: $'.$page->stringerbell->format_money($detail->price); ?>">
				$ <?= $page->stringerbell->format_money($detail->totalprice); ?>
			</span>
        </td>
        <td class="text-right">
            <?= $detail->get_caseqtyshipped(); ?>
            <?php if ($detail->get_caseqtyshipped()) : ?>
                <button type="button" class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="<?= $detail->get_casebottleqtyshipped().' bottles'; ?>">?</button>
            <?php endif; ?>
        </td>
        <td class="text-right">
            <?= $detail->get_bottleqtyshipped(); ?>
        </td>
        <td><?= $orderpanel->generate_loaddplusnoteslink($order, $detail->linenbr); ?></td>
        <td><?= $orderpanel->generate_detailreorderform($order, $detail); ?></td>
        <td><div><?= $orderpanel->generate_loaddocumentslink($order, $detail); ?></div></td>
    </tr>
    <?php if ($input->get->text('item-document')) : ?>
        <?php if ($input->get->text('item-document') == $detail->itemid) : ?>
            <?php $itemdocs = get_item_docs(session_id(), $order->orderno, $detail->itemid, false); ?>
            <?php foreach ($itemdocs->fetchAll() as $itemdoc) : ?>
                <tr class="docs">
                    <td colspan="2"></td>
                    <td colspan="2">
                        <b><a href="<?= $config->pathtofiles.$itemdoc['pathname'];; ?>" title="Click to View Document" target="_blank" ><?php echo $itemdoc['title']; ?></a></b>
                    </td>
                    <td align="right"><?= $itemdoc['createdate']; ?></td>
                    <td align="right"><?= DplusDateTime::format_dplustime($itemdoc['createtime']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endif; ?>
<?php endforeach; ?>
