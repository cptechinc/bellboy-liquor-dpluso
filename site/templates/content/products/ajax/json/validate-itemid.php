<?php
    if ($input->get->itemID) {
        $itemID = $input->get->text('itemID');
        $custID = $input->get->text('custID');
        $valid = XRefItem::load($itemID, $custID);

        if ($valid) {
            $response = array (
                'error' => false,
                'exists' => true
            );
        } else {
            if (empty($custID)) {
                $msg = 'No item with the itemID ' . $itemID . ' has been found';
            } else {
                $msg = 'No item with the itemID ' . $itemID . ' has been found with also using customer X-ref '.$custID.'';
            }
            $response = array (
                'error' => false,
                'exists' => false,
                'msg' => $msg
            );
        }
    } else {
        $response = array (
            'error' => true,
            'errortype' => 'client',
            'msg' => 'No itemID was provided'
        );
    }

    echo json_encode($response);
