<tr class="detail document-header">
	<td colspan="2">Documents</td> <td colspan="2">Document Type</td> <td align="right">Date</td> <td align="right">Time</td>
	<td></td> <td></td> <td></td> <td></td> <td></td>
</tr>
<?php $orderdocs = get_orderdocs(session_id(), $order->orderno); ?>
<?php foreach ($orderdocs as $orderdoc) : ?>
	<?php $filename = $orderdoc['pathname']; ?>
	<tr class="detail">
		<td></td>
		<td></td>
		<td colspan="3">
			<b><a href="<?= $config->documentstorage.$filename; ?>" title="Click to View Document" target="_blank" ><?= $orderdoc['title']; ?></a></b>
		</td>
		<td align="right"><?= $orderdoc['createdate']; ?></td>
		<td align="right"><?= DplusDateTime::format_dplustime($orderdoc['createtime']); ?></td> <td></td><td></td> <td></td> <td></td> <td></td>
	</tr>
<?php endforeach; ?>
