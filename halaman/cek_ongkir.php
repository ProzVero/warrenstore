<?php
	$kota_asal = $_POST['asal'];
	$kota_tujuan = $_POST['tujuan'];
	$kurir = $_POST['kurir'];
	$berat = 1*1000;
	$COD = FALSE;
	if ($kurir=="kurir") {
		$COD = TRUE;
	}

	if (!$COD) {
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "origin=".$kota_asal."&destination=".$kota_tujuan."&weight=".$berat."&courier=".$kurir."",
		  CURLOPT_HTTPHEADER => array(
			"content-type: application/x-www-form-urlencoded",
			"key: f36b4eb8c5ac94799c41b87aa96083bc"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		$data= json_decode($response, true);
		$kurir=$data['rajaongkir']['results'][0]['name'];
		$kotaasal=$data['rajaongkir']['origin_details']['city_name'];
		$provinsiasal=$data['rajaongkir']['origin_details']['province'];
		$kotatujuan=$data['rajaongkir']['destination_details']['city_name'];
		$provinsitujuan=$data['rajaongkir']['destination_details']['province'];
		$berat=$data['rajaongkir']['query']['weight']/1000;
	};
	

?>
	<div class="panel panel-default">
		<div class="panel-body">
		 
		  <table class="table table-striped table-bordered " id="tableID">
		  	<thead>
		  		<tr >
		  			<th>Nama Layanan</th>
		  			<th>Tarif</th>
		  			<th>Lama</th>
		  		</tr>
		  	</thead>
		  	<tbody>
		  		<?php
				  if ($COD) {
					echo "<tr id='tblrow'>";
					echo "<td>Kurir/COD</td>";
					echo "<td align='right'> Sesuai Kurir</td>";
					echo "<td>0-1 Day</td>";
					?>
					<td><a href="#" class="control btn btn-info btn-xs" data-set="lihat" data-layanan="Kurir/COD" data-hari="0" data-tarif="0">Pilih</a></td>
					<?php
				  } else {
					foreach ($data['rajaongkir']['results'][0]['costs'] as $value) {
						echo "<tr id='tblrow'>";
						echo "<td>".$value['service']."</td>";

						foreach ($value['cost'] as $tarif) {
							echo "<td align='right'>Rp " . number_format($tarif['value'],2,',','.')."</td>";
							echo "<td>".$tarif['etd']." Day</td>";
						?>
						<td><a href="#" class="control btn btn-info btn-xs" data-set="lihat" data-layanan="<?php echo $value['service']; ?>" data-hari="<?php echo $tarif['etd']." Day"; ?>" data-tarif="<?php echo $tarif['value']; ?>">Pilih</a></td>
						<?php
						}
					?>
						
	  
						</tr>
					<?php
				  	}
		  		  };
		  		?>
		  	</tbody>
		  </table>
		</div>
	</div>