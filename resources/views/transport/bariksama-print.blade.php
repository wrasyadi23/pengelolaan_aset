<style type="text/css">
  .style1 {font-size: 14px}
  .style2 {font-size: 12px}
  .style4 {font-size: 10px}
  .style5 {font-size: 12px; font-weight: bold; }
  body,td,th {
    font-family: Verdana, Arial, Helvetica, sans-serif;
    font-size: 10px;
  }
  .style6 {font-size: 14px; font-style: italic; }
  .style7 {font-size: 14px; font-weight: bold; }
  </style>
  
  <table align="center" width="533" border="1">
   
    <tr>
      <td width="510">
    <table  align="center" width="528" rules="rows">
    <tr>
      <td style="border-right:inset"width="109"><img src="{{ ('logo-PG-agro.jpg') }}" width="105px"/></td>
      <td width="407"><div align="center" class="style1">
        <p><strong><u>BERITA ACARA HASIL PEMERIKSAAN BERSAMA</u></strong></p>
        <p>Nomor : {{ $pdf->no_riksama }}/LG.00.03/12/BA/{{ date('Y', strtotime($pdf->tgl)) }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanggal : {{ date('d M Y', strtotime($pdf->tgl)) }}</p>
      </div></td>
    </tr>
  </table>
  <table align="center" width="512">
    <tr>
      <td width="17">&nbsp;</td>
      <td colspan="4" class="style2"><span class="style1">Pada hari ini {{ Carbon\Carbon::parse($pdf->tgl)->translatedFormat('l') . ', Tanggal ' . Carbon\Carbon::parse($pdf->tgl)->translatedFormat('d F Y') }} telah dilaksanakan pemeriksaan bersama untuk pekerjaan sebagai berikut : </span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td width="137" class="style2"><span class="style1">Rekanan *) </span></td>
      <td width="5" class="style2"><div align="center" class="style1">:</div></td>
      <td width="174" class="style2"><span class="style1"> {{ $pdf->getOK->getPR->getSR->getKontrakBA->getKontrak->rekanan }}</span></td>
      <td width="155" class="style2"><div align="left" class="style1">Tanggal : {{ Carbon\Carbon::parse($pdf->getOK->tgl)->translatedFormat('d F Y') }}</div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td class="style2"><span class="style1">No. Kontrak /PO/OK *) </span></td>
      <td class="style2"><div align="center" class="style1">:</div></td>
      <td class="style2"><span class="style1">{{ $pdf->getOK->no_ok }}</span></td>
      <td class="style2"><span class="style1">No. PR : {{ $pdf->getOK->getPR->no_pr }}</span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td class="style2"><span class="style1">Masa Periode </span></td>
      <td class="style2"><div align="center" class="style1">:</div></td>
      <td colspan="2" class="style2"><span class="style1">{{ date('d M Y', strtotime($pdf->tgl_awal)) }} s/d {{ date('d M Y', strtotime($pdf->tgl_akhir)) }}</span></td>
    </tr>
    <tr>
      <td height="21">&nbsp;</td>
      <td class="style2">&nbsp;</td>
      <td class="style2">&nbsp;</td>
      <td colspan="2" class="style2">&nbsp;</td>
    </tr>
  </table>
  <table  align="center" width="526"  rules="all">
    <tr>
      <td width="20" class="style2"><div align="center" class="style2">NO</div></td>
      <td width="255" class="style2"><div align="center" class="style2">URAIAN PEKERJAAN *)</div></td>
      <td width="36" class="style2"><div align="center" class="style2">JML</div></td>
      <td width="37" class="style2"><div align="center" class="style2">SATUAN</div></td>
      <td width="120" class="style2"><div align="center" class="style2">KETERANGAN</div></td>
    </tr>
    <tr>
      <td class="style2"><div align="center" class="style2">1</div></td>
      <td class="style1">&nbsp;{{ $pdf->getOK->getPR->getSR->getKontrakBA->getKontrak->uraian }} - {{ date('Y', strtotime($pdf->tgl)) }}</td>
      <td class="style2"><div align="center" class="style1">{{ $pdf->getOK->getPR->getSR->getKontrakBA->getKontrak->jml }}</div></td>
      <td class="style2"><div align="center" class="style1">{{ $pdf->getOK->getPR->getSR->getKontrakBA->getKontrak->satuan }}</div></td>
      <td align="center" class="style2"><div align="right" class="style1">
        <div align="center">{{ number_format($pdf->getOK->getPR->getSR->getKontrakBA->getKontrak->harga*$pdf->getOK->getPR->getSR->getKontrakBA->getKontrak->jml*$waktu) }}</div>
      </div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center" class="style6">Nomor SP : {{ $pdf->getOK->getPR->getSR->getKontrakBA->getKontrak->no_sp }}</div></td>
      <td colspan="2" class="style2"><div align="right"><strong>Total</strong>&nbsp;&nbsp;</div></td>
      <td class="style2"><div align="center" class="style7">{{ number_format($pdf->getOK->getPR->getSR->getKontrakBA->getKontrak->harga*$pdf->getOK->getPR->getSR->getKontrakBA->getKontrak->jml*$waktu) }}</div></td>
    </tr>
  </table>
  <table  align="center" width="496">
    <tr>
      <td colspan="3" class="style2"><span class="style1">&nbsp;<u><strong>Catatan Hasil Pemeriksaan *) :</strong></u></span></td>
    </tr>
    <tr>
      <td colspan="3" class="style2"><span class="style1">&nbsp;- Tidak ada masalah / Pekerjaan yang harus diulang lagi **)</span></td>
    </tr>
    <tr>
      <td colspan="3" class="style1">&nbsp;- Progres Pekerjaan (mohon dicentang salah satu) :</td>
    </tr>
    <tr>
      <td colspan="3" class="style2"><span class="style1">&nbsp;</span></td>
    </tr>
    
    <tr>
      <td width="27" class="style1"><div align="center" class="style1">a.</div></td>
      <td width="412" class="style1"><span class="style1">Selesai 100% <br> Selesai sesuai progres yang diminta oleh User (dilampiri dengan bukti<br/></span></td>
      <td width="41" rowspan="5"><table width="31" height="157" rules="all">
              <tr>
                <td width="23" height="22">&nbsp;</td>
              </tr>
              <tr>
                <td height="22">&nbsp;</td>
              </tr>
              <tr>
                <td height="22">&nbsp;</td>
              </tr>
              <tr>
                <td height="22">&nbsp;</td>
              </tr>
   </table>      </td>
    </tr>
    
    <tr class="style1">
      <td><div align="center" class="style1">b.</div></td>
      <td><span class="style1"> Keberterimaan dari User, misal : rekap jam atau shift atau harian) dan untuk di <br />
  Close secara SAP</span></td>
    </tr>
    <tr class="style1">
      <td><div align="center" class="style1">c.</div></td>
      <td><span class="style1">Pekerjaan Bulanan (Penagihan Bulanan)</span></td>
    </tr>
    <tr class="style1">
      <td><div align="center" class="style1">d.</div></td>
      <td><span class="style1">Terlambat .......%</span></td>
    </tr>
    <tr class="style1">
      <td colspan="2">&nbsp;</td>
      </tr>
    <tr class="style1">
      <td colspan="3"><span class="style1">- Quality of Service = 100 %</span></td>
    </tr>
    <tr class="style1">
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr class="style1">
      <td colspan="3">&nbsp;<span class="style1">(Apabila kolom yang tersedia tidak cukup, catatan hasil pemeriksaan dapat dibuat pada lembar tersendiri dan merupakan bagian dan Berita acara ini)</span></td>
    </tr>
    <tr class="style1">
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr class="style1">
      <td colspan="3"><span class="style1">&nbsp;<strong>Tim Pemeriksa *)</strong></span></td>
    </tr>
  </table>
  <table  align="center" width="512" rules="all">
    <tr>
      <td width="25" height="20" class="style1"><div align="center" class="style1">No</div></td>
      <td width="84" class="style1"><div align="center" class="style1">Nama</div></td>
      <td width="69" class="style1"><div align="center" class="style1">No. Badge </div></td>
      <td width="69" class="style1"><div align="center" class="style1">Tanda Tangan </div></td>
      <td width="85" class="style1"><div align="center" class="style1">Unit Kerja/Instansi </div></td>
      <td width="144" class="style1"><div align="center" class="style1">Keterangan</div></td>
    </tr>
    <tr>
      <td height="20" class="style1"><div align="center"><span class="style1">1.</span></div></td>
      <td class="style1">Egy</td>
      <td class="style1"><span class="style1"></span></td>
      <td class="style1"><span class="style1"></span></td>
      <td class="style1"><div align="center" class="style1">Transport</div></td>
      <td class="style1"><div align="center" class="style6">(Unit Kerja Terkait) </div></td>
    </tr>
    <tr>
      <td height="20" class="style1"><div align="center"><span class="style1">2.</span></div></td>
      <td class="style1">Sunoto</td>
      <td class="style1"><div align="center"><span class="style1">T-284326</span></div></td>
      <td class="style1"><span class="style1"></span></td>
      <td class="style1"><div align="center" class="style1">Transport</div></td>
      <td class="style1"><div align="center" class="style6">(Unit Kerja Terkait) </div></td>
    </tr>
    <tr>
      <td height="20" class="style1"><div align="center"><span class="style1">3.</span></div></td>
      <td class="style1"><span class="style1"></span></td>
      <td class="style1"><span class="style1"></span></td>
      <td class="style1"><span class="style1"></span></td>
      <td class="style1"><div align="center" class="style1"></div></td>
      <td class="style1"><div align="center" class="style6">(Rekanan) </div></td>
    </tr>
  </table>
  <table align="center" width="492">
    <tr>
      <td width="450"><div align="center">
        <p><span class="style1">Mengetahui , 
          <br>
          Manager Pelayanan Umum
        <br/>
        </span>
        <p>&nbsp;</p>
        <span class="style1"><u>Oda Sugarda</u>	  
          <br>T1000000 </span><br/> 
        </p>
      </div></td>
    </tr>
  </table>
  </td>
    </tr>
  </table>
  <table  align="center" width="532">
    <tr>
      <td width="88" class="style5">&nbsp;FM-30-0123</td>
      <td width="306" class="style4">Lembar 1 : Unit Kerja Pembuat BA / Unit Kerja Peminta Jasa/Pemelihara<br />
      Lembar 2 : Pihak Luar/Rekanan</td>
      <td width="122" class="style4">Lembar 3 : Dep. PPBJ<br />
      Lembar 4 : Unit Kerja Pengawas </td>
    </tr>
    <tr>
      <td colspan="2" class="style2">*)Wajib diisi <br />
      **) Coret yang tidak perlu</td>
      <td class="style4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" class="style5">Lamp.2/PD-02-0002/Rev.1 (2016)</td>
      <td class="style4">&nbsp;</td>
    </tr>
    
  </table>
  
  
    
    
  
  
  
  
  