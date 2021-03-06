<hr class="detail-line-header">
<div class="row detail-line-header">
	<strong>
		<div class="col-sm-9">
			<div class="row">
				<div class="col-sm-1 sm-padding"><input type="checkbox" id="select-all"> All</div>
				<div class="col-sm-3 sm-padding">Item / Description</div>
				<div class="col-sm-1 text-left sm-padding">WH</div>
				<div class="col-sm-1 text-right sm-padding">Cases</div>
                <div class="col-sm-1 text-right sm-padding">Bottles</div>
				<div class="col-sm-1 text-center sm-padding">Price</div>
				<div class="col-sm-2 sm-padding">Total</div>
				<div class="col-sm-2 sm-padding">Rqst Date</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="row">
				<div class="col-sm-6 sm-padding">Details</div>
				<div class="col-sm-6 sm-padding">Edit</div>
			</div>
		</div>
	</strong>
</div>
<hr>

<?php $quote_details = $editquotedisplay->get_quotedetails($quote); ?>
<div class="quote-details">
<?php foreach ($quote_details as $detail) : ?>
	<form action="<?= $config->pages->quotes.'redir/'; ?>" method="post" class="form-group allow-enterkey-submit">
		<input type="hidden" name="action" value="quick-update-line">
		<input type="hidden" name="qnbr" value="<?= $qnbr; ?>">
		<input type="hidden" name="linenbr" value="<?= $detail->linenbr; ?>">
		<div>
			<div class="row detail-line">
				<div class="col-sm-9">
					<div class="row">
						<div class="col-sm-1 sm-padding">
	                        <input type="checkbox" value="<?= $detail->linenbr; ?>" class="select-item" checked>
	                    </div>
						<div class="col-md-3 form-group sm-padding">
							<span class="detail-line-field-name">Item/Description:</span>
							<div>
								<?php if ($detail->has_error()) : ?>
									<div class="btn-sm btn-danger">
									  <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <strong>Error!</strong> <?= $detail->errormsg; ?>
									</div>
								<?php else : ?>
									<?= $detail->itemid; ?>
									<?= (strlen($detail->vendoritemid)) ? "($detail->vendoritemid)" : ''; ?>
									<br> <small><?= $detail->desc1; ?></small>
								<?php endif; ?>
							</div>
						</div>
						<div class="col-md-1 form-group sm-padding">
							<span class="detail-line-field-name">WH:</span>
							<span class="detail-line-field numeric"><?= $detail->whse; ?></span>
						</div>
						<div class="col-md-1 form-group sm-padding">
							<span class="detail-line-field-name">Case Qty:</span>
							<span class="detail-line-field numeric">
								<input class="form-control input-xs text-right underlined" type="text" size="6" name="case-qty" value="<?= $detail->get_caseqty(); ?>">
							</span>
						</div>
                        <div class="col-md-1 form-group sm-padding">
							<span class="detail-line-field-name">Bottle Qty:</span>
							<span class="detail-line-field numeric">
								<input class="form-control input-xs text-right underlined" type="text" size="6" name="bottle-qty" value="<?= $detail->get_bottleqty(); ?>">
							</span>
						</div>
						<div class="col-md-1 form-group sm-padding">
							<span class="detail-line-field-name">Price:</span>
							<span class="detail-line-field numeric">
								<input class="form-control input-xs text-right underlined" type="text" size="10" name="price" value="<?= $page->stringerbell->format_money($detail->quotprice); ?>">
							</span>
						</div>
						<div class="col-md-2 form-group sm-padding">
							<span class="detail-line-field-name">Total:</span>
							<span class="detail-line-field numeric">$ <?= $page->stringerbell->format_money($detail->quotqty * $detail->quotprice); ?></span>
						</div>
						<div class="col-md-2 form-group sm-padding">
							<span class="detail-line-field-name">Rqst Date:</span>
							<span class="detail-line-field numeric">
								<div class="input-group date">
									<?php $name = 'rqstdate'; $value = $detail->rshipdate; ?>
									<?php include $config->paths->content."common/date-picker-underlined.php"; ?>
								</div>
							</span>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="row">
						<div class="col-xs-6 sm-padding">
							<h4 class="visible-xs-block">Details</h4>
							<?= $editquotedisplay->generate_viewdetaillink($quote, $detail); ?>
							<?= $editquotedisplay->generate_loaddocumentslink($quote, $detail); ?>
							<?= $editquotedisplay->generate_loaddplusnoteslink($quote, $detail->linenbr); ?>
						</div>

						<div class="col-xs-6 sm-padding">
							<h4 class="visible-xs-block">Edit</h4>
							<button type="submit" name="button" class="btn btn-sm btn-info detail-line-icon" title="Save Changes">
								<span class="fa fa-floppy-o"></span> <span class="sr-only">Save Line</span>
							</button>
							<?= $editquotedisplay->generate_detailvieweditlink($quote, $detail); ?>
							<?= $editquotedisplay->generate_deletedetaillink($quote, $detail); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
<?php endforeach; ?>
</div>
<?php include $config->paths->siteModules.'QtyPerCase/content/edit/quote/details/add-quick-entry.php'; ?>
