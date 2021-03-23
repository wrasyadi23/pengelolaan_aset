</style>
<style type="text/css">

.style1 {font-size: 14px}
.style2 {font-style: italic}
.style4 {font-style: italic; font-size: 14px; color: #000000; }
.style7 {font-size: 14px; font-style: italic; font-weight: bold; }
.style9 {font-size: 14px; font-style: italic; }
.style10 {font-size: 12px}
.style11 {font-size: 14px; font-weight: bold; }
</style>

    <table width="100%" border="1">
      <tr>
        <td>
        <table align="center" width="100%" rules="rows">
      <tr>
        <td width="12%" height="30" style="border-right:inset"><img src="{{ ('logo-PG-agro.jpg') }}" width="149" height="50"/></td>
        <td width="83%"><div align="center" class="style1">PERTANGGUNG JAWABAN UANG MUKA <p>KANTOR PERWAKILAN JAKARTA</p>No : {{$pdf->no_wum}}/Realisasi/{{ date('Y', strtotime($pdf->getUangmuka->tgl)) }}</p></div></td>
      </tr>
    </table>
    <table width="100%">
      <tr>
        <td width="33%"><span class="style2">&nbsp;Nama</span></td>
        <td width="2%"><div align="center"><strong>:</strong></div></td>
      <td width="65%"><span class="style2">{{$pdf->getUangmuka->getKaryawan->nama}}</span></td>
      </tr>
      <tr>
        <td><span class="style2">&nbsp;<span class="style1">N I K</span></span></td>
        <td><div align="center"><strong>:</strong></div></td>
        <td><span class="style2 style1">{{$pdf->getUangmuka->nik}}</span></td>
      </tr>
      <tr>
        <td><span class="style2">&nbsp;Kode Anggaran</span></td>
        <td><div align="center"><strong>:</strong></div></td>
      <td><span class="style2">&nbsp;<span class="style1">Cost Center - Commitmen Item</span></span></td>
      </tr>
      <tr>
        <td><span class="style2"></span></td>
        <td>&nbsp;</td>
        <td><span class="style9">{{$pdf->getUangmuka->getRkapDetail->getRkap->cost_center}} - {{$pdf->getUangmuka->getRkapDetail->getRkap->gl_acc}}</span></td>
      </tr>
      <tr>
        <td><span class="style2">&nbsp;Advance Type/Suppliyer ID</span></td>
        <td><div align="center"><strong>:</strong></div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><span class="style2">&nbsp;Nomor Permintaan Uang Muka</span></td>
        <td><div align="center"><strong>:</strong></div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <table width="100%" rules="all">
      <tr>
        <td colspan="6">&nbsp;<span class="style1 style4"><em>Uraian : {{$pdf->getUangmuka->uraian}}</em></span></td>
        </tr>
      <tr>
        <td bordercolor="#CCCCCC" width="7%"><div align="center" class="style7">No</div></td>
        <td width="24%"><div align="center" class="style7">Uraian</div></td>
        <td width="7%"><div align="center" class="style7">Jumlah</div></td>
        <td width="7%"><div align="center" class="style7">Satuan</div></td>
        <td width="20%"><div align="center" class="style7">Harga Satuan</div></td>
        <td width="22%"><div align="center" class="style7">Total Harga </div></td>
      </tr>
	  @php
          $no = 1;
          $total = 0;
      @endphp
     
      @foreach($pdf->getRealisasiUm->getRealisasiUmDet as $result => $data)
        @php
          $subtotal[$result] = $data->harga * $data->jumlah;
          $total = $subtotal[$result] + $total;
        @endphp
      <tr>
        <td><div align="center" class="style1">{{$no++}}</div></td>
        <td><span class="style1">&nbsp;{{ $data->uraian }}</span></td>
        <td><div align="center" class="style1">{{ $data->jumlah }}</div></td>
        <td><div align="center" class="style1">{{ $data->satuan }}</div></td>
        <td><div align="right" class="style10">Rp. {{ number_format($data->harga) }}&nbsp;</div></td>
        <td><div align="right" class="style10">Rp. {{ number_format($subtotal[$result]) }}&nbsp;</div></td>
      </tr>
      
	  @endforeach
	  <tr>
        <td colspan="5"><div class="style1">
          <div><strong><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</em></strong><em>Jumlah yang dipertanggung jawabkan</em>&nbsp;</div>
        </div></td>
      <td align="right"><span class="style10"><em>Rp. {{number_format($total)}}</em>&nbsp;</span></td>
      </tr>
	  <tr>
	    <td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style9">Jumlah uang muka yang diterima ............................................................................................</span></td>
    <td align="right"><span class="style10"><em>Rp. {{ number_format($pdf->getUangmuka->nilai_uangmuka) }}</em>&nbsp;</span></td>
	    </tr>
	  <tr>
	    <td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style9">Kekurangan / Sisa *) ................................................................................................................ </span></td>
    <td align="right"><span class="style10"><em>Rp. {{ number_format($pdf->getUangmuka->nilai_uangmuka - $total) }}</em>&nbsp;</span></td>
	    </tr>
	  <tr>
	    <td colspan="6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style1">Gresik,</span></td>
	    </tr>
    </table>
    <table width="100%" rules="rows">
  <tr>
    <td rowspan="2" style="border-right:inset"><div align="center" class="style1">Yang mempertanggung jawabkan</div></td>
    <td colspan="2"><div align="center" class="style1">Menyetujui</div></td>
    </tr>
  <tr>
    <td style="border-right:inset"><div align="center" class="style1">Kasi Admin Keuangan </div></td>
    <td><div align="center" class="style1">Pejabat yang berwenang </div></td>
  </tr>
  <tr>
    <td style="border-right:inset"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p align="center">{{$pdf->getUangmuka->getKaryawan->nama}}</p></td>
    <td style="border-right:inset">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>


        </td>
      </tr>
    </table>
	<table width="100%">
  <tr>
    <td>&nbsp;<span class="style10">*) Coret salah satu</span></td>
  </tr>
  <tr>
    <td><a class="style11">FM-150017</a></td>
  </tr>
</table>
    
    
    