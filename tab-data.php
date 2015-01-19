<?php
/**
 * Simple class to mimic db with a getter that returns the data in json format.
 */
class DataStore {
    //first tab is already filled with data, so no value at first index
    private $contentArray = ["", "<h3>Section 2</h3>
            <p>Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>", "<h3>Section 3</h3>
            <p>Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>"];

    function getData() {
	$id = filter_input(INPUT_POST, 'id');
	//Set key/values that will be returned via ajax
	$data = array();
	$data['content'] = $this->contentArray[$id];
	//Return json encoded results
	return json_encode($data);
    }
}

$dataStore = new DataStore();
echo $dataStore->getData();
?>

