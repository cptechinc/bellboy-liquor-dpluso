<tr class="first-total-row">
	<td></td> <td colspan="2">Subtotal</td> <td></td> <td></td> <td></td> <td class="text-right">$ <?= formatmoney($order->subtotal); ?></td> <td colspan="5"></td>
</tr>
<tr>
	<td></td> <td colspan="2">Tax</td> <td></td> <td></td> <td></td> <td class="text-right">$ <?= formatmoney($order->salestax); ?></td><td colspan="5"></td>
</tr>
<tr>
	<td></td> <td colspan="2">Freight</td> <td></td> <td></td> <td></td> <td class="text-right">$ <?= formatmoney($order->freight); ?></td> <td colspan="5"></td>
</tr>
<tr>
	<td></td> <td colspan="2">Misc.</td> <td></td> <td></td> <td></td> <td class="text-right">$ <?= formatmoney($order->misccost); ?></td> <td colspan="5"></td>
</tr>
<tr>
	<td></td> <td colspan="2">Total</td> <td></td> <td></td> <td></td> <td class="text-right">$ <?= formatmoney($order->ordertotal); ?></td> <td colspan="5"></td>
</tr>
