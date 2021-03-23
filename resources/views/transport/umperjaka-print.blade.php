<style type="text/css">
<!--
.style2 {font-size: 14px}
.style3 {font-size: 12px}
.style4 {font-size: 14px; font-weight: bold; }
.style5 {font-size: 10px}
.style7 {font-size: 10px; color: #0000FF; }
-->
</style>
<table align="center" width="100%" border="1">
  <tr>
    <td><table align="center" width="100%" rules="rows" >
      <tr >
        <td width="14%" rowspan="2" style="border-right:inset"><img src="{{ ('logo-PG-agro.jpg') }}" width="105px"/></td>
        <td width="69%" rowspan="2"><div align="center"><span class="style2">PERMINTAAN UANG MUKA <br />
          KANTOR PERWAKILAN PERJAKA </span><br/>
          <span class="style3">Nomor : /UM/12/{{ date('Y', strtotime($pdf->tgl)) }} </span><br/>
        </div></td>
        <td width="17%"><div align="right"><span class="style7">Kode Um {{ $pdf->kd_uangmuka }}</span></div></td>
      </tr>
      <tr >
        <td>&nbsp;</td>
      </tr>
    </table>
        <table align="center" width="100%" >
          <tr>
            <td width="39%"><span class="style3">&nbsp;<span class="style2">Nama</span></span></td>
            <td width="2%"><div align="center"><strong>:</strong></div></td>
            <td width="38%"><span class="style2">{{ $pdf->getKaryawan->nama }}</span></td>
            <td width="21%">&nbsp;</td>
          </tr>
          <tr>
            <td><span class="style2">&nbsp;N I K</span></td>
            <td><div align="center"><strong>:</strong></div></td>
            <td colspan="2"><span class="style2">{{ $pdf->nik }}</span></td>
          </tr>
          <tr>
            <td><span class="style2">&nbsp;Jumlah Uang muka</span></td>
            <td><div align="center"><strong>:</strong></div></td>
            <td colspan="2"><span class="style2">{{ number_format($pdf->nilai_uangmuka,0) }}</span></td>
          </tr>
          <tr>
            <td><span class="style2">&nbsp;Rencana Penggunaan Uangmuka</span></td>
            <td><div align="center"><strong>:</strong></div></td>
            <td style="border-bottom:groove"><span class="style2">{{ $pdf->uraian }}</span></td>
            <td style="border-bottom:double"><div align="right"><span class="style3"&nbsp>Rp.{{ number_format($pdf->nilai_uangmuka,0) }}&nbsp;</span></div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><div align="right" class="style2">Jumlah = </div></td>
            <td><div align="right"><span class="style3">Rp.{{ number_format($pdf->nilai_uangmuka,0) }}&nbsp;</span></div></td>
          </tr>
          <tr>
            <td>&nbsp;<span class="style2">Diselenggarkan pada</span></td>
            <td><div align="center"><strong>:</strong></div></td>
            <td colspan="2"><span class="style2">{{ date('d M Y', strtotime($pdf->tgl_awal)) }} s/d {{ date('d M Y', strtotime($pdf->tgl_akhir)) }}</span></td>
          </tr>
          <tr>
            <td>&nbsp;Dipertanggung Jawabkan </td>
            <td><div align="center"><strong>:</strong></div></td>
            <td colspan="2">{{ $pdf->tgl_akhir }} + 3</td>
          </tr>
          <tr>
            <td>&nbsp;<span class="style2">Kode Anggaran</span></td>
            <td><div align="center"><strong>:</strong></div></td>
            <td colspan="2"><span class="style2">Cost Center - Comitmen Item </span></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><div align="center"></div></td>
            <td colspan="2"><span class="style2">{{ $pdf->getRkapDetail->getRkap->cost_center }} - {{ $pdf->getRkapDetail->getRkap->gl_acc }}</span></td>
          </tr>
          <tr>
            <td>&nbsp;<span class="style2">Advance Type/Supliyer ID</span></td>
            <td><div align="center"><strong>:</strong></div></td>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td><span class="style2">&nbsp;Uang yang belum dipertanggungjawabkan</span></td>
            <td><div align="center"><strong>:</strong></div></td>
            <td colspan="2">&nbsp;</td>
          </tr>
        </table>
      <table align="center" width="100%" rules="rows">
          <tr>
            <td colspan="5"><div align="center" class="style4">Kolom Tanda Tangan</div></td>
            <td style="border-left:inset" width="17%" rowspan="3"><div align="center"><span class="style2">Mengetahui Kasir</span></div></td>
          </tr>
          <tr>
            <td colspan="3" style="border-right:inset"><div align="center" class="style2">Permintaan</div></td>
            <td colspan="2"><div align="center" class="style2">Pengeluaran</div></td>
          </tr>
          <tr>
            <td width="15%" style="border-right:inset"><div align="center" class="style2">Diajukan</div></td>
            <td width="16%" style="border-right:inset"><div align="center" class="style2">Disetujui</div></td>
            <td width="15%" style="border-right:inset"><div align="center" class="style2">Diperiksa</div></td>
            <td style="border-right:inset" width="18%"><div align="center" class="style2">Disetujui</div></td>
            <td width="19%"><div align="center" class="style2">Dibayar</div></td>
          </tr>
      </table>
	  <table align="center" width="100%" rules="none" >
  <tr>
    <td style="border-right:inset" width="15%">&nbsp;</td>
    <td style="border-right:inset" width="16%"><div align="center" class="style2">Ka. Perjaka </div></td>
    <td style="border-right:inset" width="15%"><div align="center" class="style2">Staf Keuangan </div></td>
    <td style="border-right:inset" width="18%"><div align="center" class="style3">Pejabat yang Berwenang </div></td>
    <td style="border-right:inset" width="19%">&nbsp;</td>
    <td width="17%"><span class="style2">Jakarta,</span></td>
  </tr>
  <tr>
    <td style="border-right:inset">&nbsp;</td>
    <td style="border-right:inset">&nbsp;</td>
    <td style="border-right:inset">&nbsp;</td>
    <td style="border-right:inset">&nbsp;</td>
    <td style="border-right:inset">&nbsp;</td>
    <td><div align="center" class="style2">Diterima</div></td>
  </tr>
  <tr>
    <td style="border-right:inset">&nbsp;</td>
    <td style="border-right:inset">&nbsp;</td>
    <td style="border-right:inset">&nbsp;</td>
    <td style="border-right:inset">&nbsp;</td>
    <td style="border-right:inset">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="border-right:inset">&nbsp;</td>
    <td style="border-right:inset">&nbsp;</td>
    <td style="border-right:inset">&nbsp;</td>
    <td style="border-right:inset">&nbsp;</td>
    <td style="border-right:inset">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="border-right:inset"><div align="center" class="style2">{{ $pdf->getKaryawan->nama }}</div></td>
    <td style="border-right:inset"><div align="center" class="style2">Taufik Kohar </div></td>
    <td style="border-right:inset">&nbsp;</td>
    <td style="border-right:inset">&nbsp;</td>
    <td style="border-right:inset"><div align="center" class="style2">Kasir</div></td>
    <td>&nbsp;</td>
  </tr>
</table>
<table align="center" width="100%" rules="rows">
  <tr>
    <td width="47%"><span class="style5">FM-150016 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lamp.1/PR-02-1013/Rev.0(2017)</span></td>
    <td width="53%"><div align="right" class="style5">Lembar 1: Sie Admin Keuangan Lembar 2 : Yang mengajukan Uang Muka </div></td>
  </tr>
</table>

    </td>
  </tr>
</table>
