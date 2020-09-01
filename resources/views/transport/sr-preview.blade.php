<style type="text/css">
.style6 {font-size: 10px; font-style: italic; }
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
</style>
<table align="center" width="428" border="1">
  <tr>
    <td>
	<table align="center" width="500" rules="none">
  <tr>
    <td width="105"><img src="{{ ('logo-PG-agro.jpg') }}" width="105px"/></td>
    <td width="383"  style="border-left:inset"><div align="center">
      <p class="style10">PERMINTAAN JASA (SERVICE REQUEST)</p>
    </div></td>
  </tr>
</table>
<table align="center" width="492" rules="rows">
  <tr>
    <td><div align="center" class="style9">Nomor : {{ $pdf->kd_sr }}</div></td>
  </tr>
  <tr>
    <td><div align="center" class="style9">Tanggal Permintaan Unit Kerja : {{ $pdf->tgl }}</div></td>
  </tr>
</table>

<table align="center" width="495" rules="rowas">
  <tr>
    <td width="28"><div align="center" class="style9">
      <div align="center">I.</div>
    </div></td>
    <td width="146"><span class="style9">Unit Kerja /Plant *) </span></td>
    <td width="12"><div align="center" class="style9">
      <div align="center">:</div>
    </div></td>
    <td colspan="2"><span class="style9"></span><span class="style9">Dep. Pelayanan Umum/Transport </span></td>
    </tr>
  <tr>
    <td><div align="center" class="style9">
      <div align="center">II.</div>
    </div></td>
    <td><span class="style9">Urain Pekerjaan *) </span></td>
    <td><div align="center" class="style9">
      <div align="center">:</div>
    </div></td>
    <td colspan="2"><span class="style9"></span><span class="style9">{{ $pdf->getKontrakBA->getKontrak->uraian }}</span></td>
    </tr>
  <tr>
    <td><div align="center" class="style9">
      <div align="center">III.</div>
    </div></td>
    <td><span class="style9">Cost Center / Fun Center *) </span></td>
    <td><div align="center" class="style9">
      <div align="center">:</div>
    </div></td>
    <td colspan="2" class="style9"><span class="style9"></span><span class="style9">{{ $pdf->getKontrakBA->getKontrak->cost_center }}</span></td>
    </tr>
  <tr>
    <td><div align="center" class="style9">IV</div></td>
    <td><span class="style9">Gl Account *) </span></td>
    <td><div align="center" class="style9">
      <div align="center">:</div>
    </div></td>
    <td colspan="2" class="style9"><span class="style9"></span><span class="style9">{{ $pdf->getKontrakBA->getKontrak->gl_acc }}</span></td>
    </tr>
  <tr>
    <td><div align="center" class="style9">VI.</div></td>
    <td><span class="style9">Nomor WO </span></td>
    <td><div align="center" class="style9">
      <div align="center">:</div>
    </div></td>
    <td colspan="2"><span class="style9"></span><span class="style9">-</span></td>
    </tr>
  <tr>
    <td><div align="center" class="style9">VII</div></td>
    <td><span class="style9">No. Equepment / Nama Equepment </span></td>
    <td><div align="center" class="style9">
      <div align="center">:</div>
    </div></td>
    <td colspan="2"><span class="style9"></span><span class="style9">-</span></td>
    </tr>
  <tr>
    <td><div align="center" class="style9">VIII.</div></td>
    <td><span class="style9">Alasan Permintaan Pekerjaan Jasa </span></td>
    <td><div align="center" class="style9">
      <div align="center">:</div>
    </div></td>
    <td colspan="2"><span class="style9"></span><span class="style9">{{ $pdf->getKontrakBA->getKontrak->keterangan }}</span></td>
    </tr>
  <tr>
    <td><div align="center" class="style9">IX.</div></td>
    <td><span class="style9">Pekerjaan yang dibutuhkan *) </span></td>
    <td><div align="center" class="style9">:</div></td>
    <td colspan="2" class="style9">{{ $pdf->tgl_awal }} s/d {{ $pdf->tgl_akhir }}</td>
    </tr>
  <tr>
    <td><div align="center" class="style9">X.</div></td>
    <td><span class="style9">Estimasi biaya (tahun berjalan **) </span></td>
    <td><div align="center" class="style9">:</div></td>
    <td width="136">&nbsp;</td>
    <td width="129">&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center" class="style9">XI.</div></td>
    <td colspan="4"><span class="style9">Rincian Estimasi Man Power, Material, Peralatan / Sketch Drawing / Keterangan lain : </span></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="4" class="style9"><span class="style8">Dasar SP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;{{ $pdf->getKontrakBA->getKontrak->no_sp }}</span></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="4" class="style9"><span class="style8">Periode SP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;{{ $pdf->getKontrakBA->tgl_awal }} s/d {{ $pdf->getKontrakBA->tgl_akhir }}</span></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="4" class="style9"><span class="style8">Vendor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;{{ $pdf->getKontrakBA->getKontrak->rekanan }}</span></td>
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
    <td width="56"><div align="center" class="style7">Ttl Harga </div></td>
  </tr>
  <tr>
    <td align="center" class="style8">1</td>
    <td><span class="style8">&nbsp;{{ $pdf->getKontrakBA->getKontrak->uraian }}</span></td>
    <td><div align="center" class="style8">{{ $pdf->getKontrakBA->getKontrak->jml }}</div></td>
    <td><div align="center" class="style8">{{ $pdf->getKontrakBA->getKontrak->satuan }}</div></td>
    <td class="style8"><div align="right" class="style8">{{ number_format ($pdf->getKontrakBA->getKontrak->harga,0) }}&nbsp;</div></td>
    <td align="center" class="style8">{{$waktu}}</td>
    <td><div align="right" class="style8">{{ number_format($pdf->getKontrakBA->getKontrak->harga*$pdf->getKontrakBA->getKontrak->jml) }}&nbsp;</div></td>
  </tr>
  <tr>
    <td div align="right" class="style9"colspan="2">Jumlah&nbsp;</td>
    <td class="style9"><div align="center" class="style8">{{ $pdf->getKontrakBA->getKontrak->jml }}</div></td>
    <td class="style9"><div align="center" class="style8">{{ $pdf->getKontrakBA->getKontrak->satuan }}</div></td>
    <td colspan="3"><div align="center" class="style11">{{ number_format($pdf->getKontrakBA->getKontrak->harga*$pdf->getKontrakBA->getKontrak->jml) }}</div></td>
    </tr>
</table>
<table align="center" width="428">
  <tr>
    <td width="119"><div align="center" class="style8">
      <div align="left">Tanggal : </div>
    </div></td>
    <td width="156" style="border-left:inset"><div align="center" class="style8">Tanggal : </div></td>
    <td width="137"><div align="center" class="style8">
      <div align="center" style="border-left:inset">Tanggal: </div>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style8">
      <div align="left">Diminta oleh : </div>
    </div></td>
    <td style="border-left:inset"><div align="center" class="style8">Diperiksa oleh : </div></td>
    <td><div align="center" class="style8">
      <div align="right" style="border-left:inset">Disetujui oleh : </div>
    </div></td>
  </tr>
  <tr>
    <td><p>&nbsp;</p>
      <p>&nbsp;</p></td>
    <td style="border-left:inset">&nbsp;</td>
    <td style="border-left:inset">&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center" class="style7">
      <div align="left"><u>Sunoto</u></div>
    </div></td>
    <td style="border-left:inset"><div align="center" class="style7"><u>Djuli Fanani </u></div></td>
    <td><div align="center" class="style7">
      <div align="right" style="border-left:inset"><u>Oda Sugarda </u></div>
    </div></td>
  </tr>
  <tr>
    <td><div align="center" class="style6">
      <div align="left">(Kasi Administrasi) </div>
    </div></td>
    <td style="border-left:inset"><div align="center" class="style6">(Kabag. Transport) </div></td>
    <td><div align="center" class="style6">
      <div align="right" style="border-left:inset">(Manager Pelayanan Umum </div>
    </div></td>
  </tr>
</table>

	</td>
  </tr>
</table>


