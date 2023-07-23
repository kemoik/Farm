<?php                
include('connect.php');
include_once('./tcpdf_6_2_13/tcpdf/tcpdf.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Order Details');
$pdf->SetSubject('Order Details');
$pdf->SetKeywords('Order Details, PDF');

// Set header and footer information
$pdf->SetHeaderData('', 0, '', '', array(0, 0, 0), array(255, 255, 255));
$pdf->setFooterData(array(0, 0, 0), array(255, 255, 255));

// Set font
$pdf->SetFont('dejavusans', '', 12);

// Add a page
$pdf->AddPage();

// Output the order details in a table
$html = '<h1>Order Details</h1>';
$html .= '<table>';
$html .= '<tr><th>Product</th><th>Quantity</th><th>Price</th><th>Total Price</th></tr>';

$sql = "SELECT * FROM ordersItems WHERE orderid='$o_id'";
$result = mysqli_query($mysqli, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $prodID = $row["productid"];
        $sql_product = "SELECT * FROM products  WHERE product_id='$prodID'";
        $result_prod = mysqli_query($mysqli, $sql_product);
        $row_prod = mysqli_fetch_assoc($result_prod);

        $html .= '<tr>';
        $html .= '<td>' . $row_prod['product_name'] . '</td>';
        $html .= '<td>' . $row["quantity"] . '</td>';
        $html .= '<td>' . $row["productprice"] . '</td>';
        $html .= '<td>' . $row["quantity"] * $row["productprice"] . '</td>';
        $html .= '</tr>';
    }
}

$html .= '<tr><td></td><td></td><td>Total Price</td><td>' . $row_orders['totalprice'] . '</td></tr>';
$html .= '<tr><td></td><td></td><td>Order Status</td><td>' . $row_orders['orderstatus'] . '</td></tr>';
$html .= '<tr><td></td><td></td><td>Date</td><td>' . $row_orders['timestamp'] . '</td></tr>';
$html .= '</table>';

$pdf->writeHTML($html, true, false, true, false, '');

$file_location = "/home/fbi1glfa0j7p/public_html/examples/generate_pdf/uploads/"; //add your full path of your server
//$file_location = "/opt/lampp/htdocs/examples/generate_pdf/uploads/"; //for local xampp server

$datetime=date('dmY_hms');
$file_name = "INV_".$datetime.".pdf";
ob_end_clean();

if($_GET['ACTION']=='DOWNLOAD') 
{
	$pdf->Output($file_name, 'D'); // D means download
} 


//----- End Code for generate pdf
	

else
{
	echo 'Record not found for PDF.';
}

?>