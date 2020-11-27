<style type="text/css">
.style7 {font-size: 12px; font-weight: bold; }
.style8 {font-size: 12px}
.style9 {font-size: 14px}
.style10 {
	font-size: 16px;
	font-weight: bold;
}
.style11 {
	font-size: 12px;
	font-style: italic;
	font-weight: bold;
}
.style13 {
	font-size: 9px;
	font-style: italic;
	color: #0000FF;
}
</style>
<table align="center" width="428" rules="all">
  <tr>
    <td>
	<table align="center" width="500" rules="none">
  <tr>
    <td width="105"><img src="{{ ('logo-PG-agro.jpg') }}" width="105px"/></td>
    <td width="383"  style="border-left:inset"><div align="center">
      <p class="style10">PERMINTAAN JASA (SERVICE REQUEST) <span class="style13">Kode :{{ $pdf->kd_sr }}</span></p>
    </div> </td>
  </tr>
</table>
<table align="center" width="492" rules="rows">
  <tr>
    <td class="style8"><div align="center" class="style9">Nomor : {{ $pdf->no_sr }}/LG.00.12/SR/{{ date('Y', strtotime($pdf->tgl)) }}</div></td>
  </tr>
  <tr>
    <td class="style8"><div align="center" class="style9"><em>Tanggal Permintaan Unit Kerja : {{ date('d M Y', strtotime($pdf->tgl)) }}</em></div></td>
  </tr>
</table>

<table align="center" width="495" rules="rowas">
  <tr>
    <td width="23" class="style8"><div align="center" class="style9">
      <div align="center">I.</div>
    </div></td>
    <td width="158" class="style9"><span class="style9">Unit Kerja /Plant *) </span></td>
    <td width="12" class="style9"><div align="center" class="style9">
      <div align="center">:</div>
    </div></td>
    <td class="style9"><span class="style9"></span><span class="style9">Dep. Pelayanan Umum/Transport </span></td>
    </tr>
  <tr>
    <td class="style8"><div align="center" class="style9">
      <div align="center">II.</div>
    </div></td>
    <td class="style9"><span class="style9">Urain Pekerjaan *) </span></td>
    <td class="style9"><div align="center" class="style9">
      <div align="center">:</div>
    </div></td>
    <td class="style9"><span class="style9"></span><span class="style9">{{ $pdf->getKontrakBA->getKontrak->uraian }} {{ $pdf->getKontrakBA->getKendaraan->merk }} Tahun {{ date('Y', strtotime($pdf->tgl)) }} {{ $pdf->getKontrakBA->getKontrak->jml }} {{ $pdf->getKontrakBA->getKontrak->satuan }}</span></td>
    </tr>
  <tr>
    <td class="style8"><div align="center" class="style9">
      <div align="center">III.</div>
    </div></td>
    <td class="style9"><span class="style9">Cost Center / Fun Center *) </span></td>
    <td class="style9"><div align="center" class="style9">
      <div align="center">:</div>
    </div></td>
    <td class="style9"><span class="style9"></span><span class="style9">{{ $pdf->getKontrakBA->getKontrak->getRkapDetail->getRkap->cost_center }}</span></td>
    </tr>
  <tr>
    <td class="style8"><div align="center" class="style9">IV</div></td>
    <td class="style9"><span class="style9">Gl Account *) </span></td>
    <td class="style9"><div align="center" class="style9">
      <div align="center">:</div>
    </div></td>
    <td class="style9"><span class="style9"></span><span class="style9">{{ $pdf->getKontrakBA->getKontrak->getRkapDetail->getRkap->gl_acc }}</span></td>
    </tr>
  <tr>
    <td class="style8"><div align="center" class="style9">VI.</div></td>
    <td class="style9"><span class="style9">Nomor WO </span></td>
    <td class="style9"><div align="center" class="style9">
      <div align="center">:</div>
    </div></td>
    <td class="style9"><span class="style9"></span><span class="style9">-</span></td>
    </tr>
  <tr>
    <td class="style8"><div align="center" class="style9">VII</div></td>
    <td class="style9"><span class="style9">No. Equepment / Nama Equepment </span></td>
    <td class="style9"><div align="center" class="style9">
      <div align="center">:</div>
    </div></td>
    <td class="style9"><span class="style9"></span><span class="style9">-</span></td>
    </tr>
  <tr>
    <td class="style8"><div align="center" class="style9">VIII.</div></td>
    <td class="style9"><span class="style9">Alasan Permintaan Pekerjaan Jasa </span></td>
    <td class="style9"><div align="center" class="style9">
      <div align="center">:</div>
    </div></td>
    <td class="style9"><span class="style9"></span><span class="style9">{{ $pdf->getKontrakBA->getKontrak->keterangan }}</span></td>
    </tr>
  <tr>
    <td class="style8"><div align="center" class="style9">IX.</div></td>
    <td class="style9"><span class="style9">Pekerjaan yang dibutuhkan *) </span></td>
    <td class="style9"><div align="center" class="style9">:</div></td>
    <td class="style9">{{ date('d M Y', strtotime($pdf->tgl_awal)) }} s/d {{ date('d M Y', strtotime($pdf->tgl_akhir)) }}</td>
    </tr>
  <tr>
    <td class="style8"><div align="center" class="style9">X.</div></td>
    <td class="style9"><span class="style9">Estimasi biaya (tahun berjalan **) </span></td>
    <td class="style9"><div align="center" class="style9">:</div></td>
    <td class="style9">&nbsp;<strong>Rp.{{ number_format($pdf->getKontrakBA->getKontrak->harga*$pdf->getKontrakBA->getKontrak->jml*$waktu) }}</strong></td>
    </tr>
  <tr>
    <td class="style8"><div align="center" class="style9">XI.</div></td>
    <td colspan="3" class="style9"><span class="style9">Rincian Estimasi Man Power, Material, Peralatan / Sketch Drawing / Keterangan lain : </span></td>
    </tr>
  <tr>
    <td class="style8">&nbsp;</td>
    <td colspan="3" class="style9"><span class="style8">Dasar SP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;{{ $pdf->getKontrakBA->getKontrak->no_sp }}</span></td>
    </tr>
  <tr>
    <td class="style8">&nbsp;</td>
    <td colspan="3" class="style9"><span class="style8">Periode SP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;{{ date('d M Y', strtotime($pdf->getKontrakBA->tgl_awal)) }} s/d {{ date('d M Y', strtotime($pdf->getKontrakBA->tgl_akhir)) }}</span></td>
    </tr>
  <tr>
    <td class="style8">&nbsp;</td>
    <td colspan="3" class="style9"><span class="style8">Vendor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;{{ $pdf->getKontrakBA->getKontrak->rekanan }}</span></td>
    </tr>
</table>

<table rules="all" align="center" width="485">
  <tr>
    <td width="24"><div align="center" class="style7">No</div></td>
    <td width="180"><div align="center" class="style7">Deskripsi</div></td>
    <td width="26"><div align="center" class="style7">Jml</div></td>
    <td width="23"><div align="center" class="style7">Unit</div></td>
    <td width="58"><div align="center" class="style7">Harga/Unit</div></td>
    <td width="35"><div align="center" class="style7">Waktu</div></td>
    <td width="56"><div align="center" class="style7">Total Harga </div></td>
  </tr>
  <tr>
    <td align="center" class="style8">1</td>
    <td><span class="style8">&nbsp;{{ $pdf->getKontrakBA->getKontrak->uraian }} {{ $pdf->getKontrakBA->getKendaraan->merk }} {{ $pdf->getKontrakBA->getKendaraan->tahun }}  - {{ $pdf->getKontrakBA->getKontrak->jml }} {{ $pdf->getKontrakBA->getKontrak->satuan }} </span></td>
    <td><div align="center" class="style8">{{ $pdf->getKontrakBA->getKontrak->jml }}</div></td>
    <td><div align="center" class="style8">{{ $pdf->getKontrakBA->getKontrak->satuan }}</div></td>
    <td class="style8"><div align="right" class="style8">{{ number_format ($pdf->getKontrakBA->getKontrak->harga,0) }}&nbsp;</div></td>
    <td align="center" class="style8">{{$waktu}} bulan</td>
    <td><div align="right" class="style8">{{ number_format($pdf->getKontrakBA->getKontrak->harga*$pdf->getKontrakBA->getKontrak->jml*$waktu) }}&nbsp;</div></td>
  </tr>
  <tr>
    <td div align="right" class="style9"colspan="2">Jumlah </td>
    <td class="style9"><div align="center" class="style8">{{ $pdf->getKontrakBA->getKontrak->jml }}</div></td>
    <td class="style9"><div align="center" class="style8">{{ $pdf->getKontrakBA->getKontrak->satuan }}</div></td>
    <td colspan="3"><div align="center" class="style11">{{ number_format($pdf->getKontrakBA->getKontrak->harga*$pdf->getKontrakBA->getKontrak->jml*$waktu) }}</div></td>
    </tr>
</table>
<table align="center" width="485" rules="all">
  <tr>
    <td width="144" class="style9"><div align="center" class="style8">
      <p align="center"><span class="style9">Tanggal :
	      <br>
        Diminta Oleh :
	    <br/>
      </span>
      <p align="center">&nbsp;</p>
      <div align="center"><span class="style9"><u>Sunoto</u>	  <br>
        (Kasi Administrasi) </span><br/> 
        </p>
      </div>
    </div></td>
    <td width="168" class="style9"><p align="center"><span class="style1">Tanggal :
	      <br>
        Diperiksa Oleh :
	    <br/>
      </span>
      <p align="center">&nbsp;</p>
      <div align="center"><span class="style1"><u>Djuli Fanani </u><br>
        (Kabag. Transporti) </span><br/> 
        </p>
      </div>
      </div></div></td>
    <td width="156" class="style9"><div align="center" class="style8">
      <div align="center"><p align="center"><span class="style1">Tanggal :
	      <br>
        Disetujui Oleh :
	    <br/>
      </span>
      <p align="center">&nbsp;</p>
      <div align="center"><span class="style1"><u>Oda Sugarda </u><br>
        (Manager Pelayanan Umum) </span><br/> 
        </p>
      </div>
      </div></td>
  </tr>
</table>

	</td>
  </tr>
</table>


