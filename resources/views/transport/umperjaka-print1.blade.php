<style type="text/css">

    .style1 {font-size: 12px}
    .style2 {font-size: 14px}
    
    .style4 {font-size: 14px; font-style: italic; }
</style>
    <table width="100%" border="1">
      <tr>
        <td>
        <table align="center" width="100%" rules="rows">
      <tr>
        <td width="12%" height="30" style="border-right:inset"><img src="{{ ('logo-PG-agro.jpg') }}" width="149" height="50"/></td>
        <td width="83%"><div align="center" class="style1">PERTANGGUNG JAWABAN UANG MUKA <p>KANTOR PERWAKILAN JAKARTA</p>No : {{ $pdf->kd_uangmuka }}</p></div></td>
      </tr>
    </table>
    <table width="100%">
      <tr>
        <td width="33%"><span class="style2">&nbsp;Nama</span></td>
        <td width="2%"><div align="center"><strong>:</strong></div></td>
        {{-- <td width="65%"><span class="style2">{{$ptk->getKaryawan->nama}}</span></td> --}}
      </tr>
      <tr>
        <td><span class="style2">&nbsp;N I K</span></td>
        <td><div align="center"><strong>:</strong></div></td>
        {{-- <td><span class="style2">{{$ptk->nik}}</span></td> --}}
      </tr>
      <tr>
        <td><span class="style2">&nbsp;Kode Anggaran</span></td>
        <td><div align="center"><strong>:</strong></div></td>
        <td><span class="style2">Cost Center - Commitmen Item</span></td>
      </tr>
      <tr>
        <td><span class="style2"></span></td>
        <td>&nbsp;</td>
        <td><span class="style2"></span></td>
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
        <td colspan="6">&nbsp;<span class="style4">Uraian : </span></td>
        </tr>
      <tr>
        <td width="8%"><div align="center" class="style2">No</div></td>
        <td width="35%"><div align="center" class="style2">Uraian</div></td>
        <td width="7%"><div align="center" class="style2">Jumlah</div></td>
        <td width="11%"><div align="center" class="style2">Satuan</div></td>
        <td width="15%"><div align="center" class="style2">Harga</div></td>
        <td width="24%"><div align="center" class="style2">Total Harga </div></td>
      </tr>
	  @php
          $no = 1;
      @endphp
     
      {{-- @foreach($pdf->getRealisasiUmDet as $index => $data)
      <tr>
        <td>{{$no++}}</td>
        <td>{{ $data->jumlah }}</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  @endforeach --}}
    </table>
    
        </td>
      </tr>
    </table>
    
    
    