<style type="text/css">
.style2 {font-size: 14px}
.style3 {font-size: 12px}

</style>
<table align="center" border="1" width="536">
	@foreach ($pdf as $result => $r)
  <tr>
		<td width="125" height="50" align=""><img src="{{ ('logo-PG-agro.jpg') }}" width="105"></td>
		<td width="395">
		  <table align="center" width="83%">
				<tr>
					<td align="center" class="style3">PERMINTAAN JASA</td>
				</tr>
				<tr>
					<td align="center" class="style3">(SERVICE REQUEST)</td>
				</tr>
		  </table>		  
    </td>
  </tr>
  <tr>
		<td colspan="2" align="center">Kode Sr : {{ $r->kd_sr }}/No.Sr. Dop :..... </td>
	    <table>
		<tr></
	  </table>  
  </tr>
  <tr>
		<td colspan="2" align="center">Tanggal Permintaan : {{ $r->tgl }} </td>
	    <table>
		<tr></
	  </table>  
  </tr>
	<tr>
		<td height="614" colspan="2" align="center">
			<table width="580">
				
				<tr align="left">
					<td width="180" class="style2">&nbsp;&nbsp;&nbsp;&nbsp;I. Unit Kerja / Plant&nbsp;&nbsp;*)</td>
					<td width="7" align="center" class="style2">:</td>
					<td width="320" class="style6 style2">Departemen Pelayanan Umum / Transport </td>
				</tr>
				<tr align="left">
					<td width="180" class="style2">&nbsp;&nbsp;&nbsp;&nbsp;II. Uraian Pekerjaan Jasa *)</td>
					<td width="7" align="center" class="style2">:</td>
					<td class="style6 style2">{{ $r->uraian }}</td>
				</tr>
				<tr align="left">
					<td width="180" class="style2">&nbsp;&nbsp;&nbsp;&nbsp;III.Cost Center / Fun Center &nbsp;&nbsp;*)</td>
					<td width="7" align="center" class="style2">:</td>
					<td class="style6 style2">{{ $r->cost_center }}</td>
				</tr>
				<tr align="left">
					<td width="180" class="style2">&nbsp;&nbsp;&nbsp;&nbsp;IV. Gl Account &nbsp;&nbsp;*)</td>
					<td width="7" align="center" class="style2">:</td>
					<td colspan="2" class="style2">&nbsp;{{ $r->gl_acc }}</td>
				</tr>
				<tr align="left">
					<td width="180" class="style2">&nbsp;&nbsp;&nbsp;&nbsp;V. No.Wo</td>
					<td width="7" align="center" class="style2">:</td>
				  	<td colspan="2" class="style2">-</td>
				</tr>
				<tr align="left">
					<td width="180" class="style2">&nbsp;&nbsp;&nbsp;&nbsp;VI. No.Equepment / Nama Equepment </td>
					<td width="7" align="center" class="style2">:</td>
				  	<td colspan="2" class="style2">-</td>
				</tr>
				<tr align="left">
					<td width="180" class="style2">&nbsp;&nbsp;&nbsp;&nbsp;VII. Alasan Permintaan Pekrjaan Jasa </td>
					<td width="7" align="center" class="style2">:</td>
				  	<td colspan="2" class="style2">&nbsp;{{ $r->alasan }}</td>
				</tr>
				<tr align="left">
					<td width="180" class="style2">&nbsp;&nbsp;&nbsp;VIII. Perkiraan Jasa Yang Dibutuhkan </td>
					<td width="7" align="center" class="style2">:</td>
				  	<td colspan="2" class="style2">{{ $r->tgl_awal_sr }} s/d {{ $r->tgl_akhir_sr }}</td>
				</tr>
				<tr align="left">
					<td width="180" class="style2">&nbsp;&nbsp;&nbsp;&nbsp;IX. Estimasi biaya (tahun berjalan) </td>
					<td width="7" align="center" class="style2">:</td>
				  	<td colspan="2" class="style2">&nbsp;Rp.&nbsp;&nbsp;{{ number_format($r->harga*$r->jml) }}</td>
				</tr>
				<tr align="left">
					<td colspan="4" class="style2">&nbsp;&nbsp;&nbsp;&nbsp;X. Rincian Estimasi Man Power, Material, Peraltan / Sketch Drawing / Keterangan lain :</td>
				</tr>
				<tr align="left">
					<td width="180" class="style2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dasar SP </td>
					<td width="7" align="center" class="style2">:</td>
				  	<td colspan="2" class="style2">&nbsp;{{ $r->no_sp }}</td>
				</tr>
				<tr align="left">
					<td width="180" class="style2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Periode SP </td>
					<td width="7" align="center" class="style2">:</td>
				  	<td colspan="2" class="style2">{{ $r->tgl_awal_sp }} &nbsp;&nbsp;&nbsp; s/d &nbsp;&nbsp;&nbsp;{{ $r->tgl_akhir_sp }}</td>
				</tr>
				<tr align="left">
					<td width="180" class="style2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Vendor </td>
					<td width="7" align="center" class="style2">:</td>
				  	<td colspan="2" class="style2">{{ $r->rekanan }}</td>
				</tr>
				<tr>
					<td height="290" colspan="4" class="style2">
						<table width="534" border="1">
							<tr align="center" class="style2">
							  <td valign="top" align="center" width="5" class="style2"><div align="center">No</div></td>
								<td colspan="3" align="left" width="80" class="style2"><div align="center">Diskripsi</div></td>
								<td align="left" width="5" class="style2"><div align="center">Jml</div></td>
								<td align="left" width="5" class="style2"><div align="center">Unit</div></td>
								<td colspan="2" align="left" width="10" class="style2"><div align="center">Harga/Unit</div></td>
								<td align="left" width="5" class="style2"><div align="center">Waktu</div></td>
								<td align="left" width="9" class="style2"><div align="center">Ttl Harga</div></td>
							</tr>
							<tr align="left" class="style3">
								<td width="5" align="center" valign="top" class="style3">1</td>
								<td colspan="3" align="left" class="style3">&nbsp;{{ $r->uraian_sp }}</td>
								<td align="center" class="style3">{{ $r->jml }}</td>
								<td align="center" class="style3">{{ $r->satuan }}</td>
								<td colspan="2" align="right" class="style3">{{ number_format($r->harga,0) }}&nbsp;</td>
								<td align="left" class="style3"><div align="center">{{ $r->jml_bulan }}</div></td>
								<td align="right" width="9" class="style3">{{ number_format($r->ttl_hrg) }}&nbsp;</td>
							</tr>
								<tr align="left">
								<td colspan="9" align="center" valign="top" class="style2"><div align="right">Total&nbsp;&nbsp;</div></td>
								<td align="right" width="9" class="style2">{{ number_format($r->ttl_hrg) }}&nbsp;</td>
							</tr>
							<tr align="left">
								<td height="160" colspan="3" align="left" valign="top" class="style2"><p>Tanggal :</p>
									<p align="center">Diminta Oleh :</p>
									<p align="center">&nbsp;</p>
									<p align="center">Sunoto</p>								</td>
								<td colspan="4" align="left" class="style2">Tanggal :
									<p align="center">Diperiksa Oleh : </p>
									<p align="center">&nbsp;</p>
									<p align="center">Djuli Fanani  </p>								</td>
								<td colspan="3" align="left" class="style2"><p>Tanggal :</p>
									<p align="center">Disetujui Oleh :</p>
									<p align="center">&nbsp;</p>
									<p align="center">Oda Sugarada  </p>
									<p>&nbsp; </p>								</td>
							</tr>
						</table>
					</td>
			  	</tr>
		  </table>		
		</td>
	</tr>
	@endforeach
</table>
