<div id="no-more-tables">
    <table class="table-condensed cf order-details">
        <thead class="cf">
            <tr>
                <th>Item</th>
                <th class="numeric text-right" width="90">Price</th>
                <th colspan="2">
                    <div class="text-center"><span class="label context">Ordered</span></div>
                    <div class="row">
                        <div class="col-xs-6">Cases</div>
                        <div class="col-xs-6">Bottles</div>
                    </div>
                </th>
                <th class="numeric text-right" >Total</th>
                <th colspan="2">
                    <div class="text-center"><span class="label context">Shipped</span></div>
                    <div class="row">
                        <div class="col-xs-6">Cases</div>
                        <div class="col-xs-6">Bottles</div>
                    </div>
                </th>
                <th class="text-center">Rqstd Ship</th> <th>Whse</th>
                <th>
                	<div class="row">
                    	<div class="col-xs-2 action-padding">Details</div><div class="col-xs-2 action-padding">Docs</div> <div class="col-xs-2 action-padding">Notes</div> <div class="col-xs-6 action-padding">Edit</div>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
       		<?php $order_details = $editorderdisplay->get_orderdetails($order) ?>
            <?php foreach ($order_details as $detail) : ?>
            <tr class="numeric">
                <td data-title="ItemID/Desc">
                    <?= $detail->itemid; ?>
                    <?php if ($detail->errormsg != '') : ?>
                        <div class="btn-sm btn-danger">
                          <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <strong>Error!</strong> <?= $detail->errormsg; ?>
                        </div>
                    <?php else : ?>
                        <?php if (strlen($detail->vendoritemid)) { echo ' '.$detail->vendoritemid;} ?>
                        <br> <?= $detail->desc1; ?>
					<?php endif; ?>
                </td>
                <td data-title="Price" class="text-right">$ <?= formatMoney($detail->price); ?></td>
                <td data-title="Cases Ordered" class="text-right">
                    <?= $detail->get_caseqty(); ?>
                    <?php if ($detail->get_caseqty()) : ?>
                        <button type="button" class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="<?= $detail->get_casebottleqty().' bottles'; ?>">?</button>
                    <?php endif; ?>
                </td>
                <td data-title="Bottles Ordered" class="text-right">
                    <?= $detail->get_bottleqty(); ?>
                </td>
                <td data-title="Total" class="text-right">$ <?= formatMoney($detail->totalprice); ?></td>
                <td data-title="Cases Shipped" class="text-right">
                    <?= $detail->get_caseqtyshipped(); ?>
                    <?php if ($detail->get_caseqtyshipped()) : ?>
                        <button type="button" class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="<?= $detail->get_casebottleqtyshipped().' bottles'; ?>">?</button>
                    <?php endif; ?>
                </td>
                <td data-title="Bottles Shipped" class="text-right">
                    <?= $detail->get_bottleqtyshipped(); ?>
                </td>
                <td data-title="Requested Ship Date" class="text-right"><?= $detail->rshipdate; ?></td>
                <td data-title="Warehouse"><?= $detail->whse; ?></td>
                <td class="action">
                    <div class="row">
                        <div class="col-xs-2 action-padding">
                            <span class="visible-xs-block action-label">Details</span>
							<?= $editorderdisplay->generate_viewdetaillink($order, $detail); ?>
                        </div>
                        <div class="col-xs-2 action-padding">
                            <span class="visible-xs-block action-label">Documents</span> <?= $editorderdisplay->generate_loaddocumentslink($order, $detail); ?></div>
                        <div class="col-xs-2 action-padding">
                            <span class="visible-xs-block action-label">Notes</span> <?= $editorderdisplay->generate_loaddplusnoteslink($order, $detail->linenbr); ?></div>
                        <div class="col-xs-6 action-padding">
                            <span class="visible-xs-block action-label">Update</span>
                            <?= $editorderdisplay->generate_detailvieweditlink($order, $detail); ?>
                            <?php if ($editorderdisplay->canedit) : ?>
                                <?= $editorderdisplay->generate_deletedetailform($order, $detail); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </td>
            </tr>
			<?php endforeach; ?>
        </tbody>
    </table>
</div>