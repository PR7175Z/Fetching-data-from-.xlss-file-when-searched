<?php 
get_header();
$var=strtolower(get_search_query());
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);
require_once __DIR__.'/src/SimpleXLSX.php';
// $var = ' India';
if ( $xlsx = SimpleXLSX::parse(__DIR__.'/src/countries_and_population.xlsx') ) {
	$i =1;
	while($i < count($xlsx->rows())){
		$country=$xlsx->rows()[$i][1]; 
		$a = strtolower(trim($country));
		if(strpos($a, $var) !== false){
			echo '<pre>'
		;?>
		<table border="1px" color="#000">
			<tr>
				<td>Country Name:</td>
				<td><?php print_r( $xlsx->rows()[$i][1]); ?></td>
			</tr>
			<tr>
				<td>Date:</td>
				<td><?php print_r( $xlsx->rows()[$i][3]); ?></td>
			</tr>
			<tr>
				<td>Number:</td>
				<td><?php print_r( $xlsx->rows()[$i][4]); ?></td>
			</tr>
		</table>
		<?php
			echo '</pre>';
		}
		$i++;
	}
} else {
	echo SimpleXLSX::parseError();
}
get_footer();
?>
