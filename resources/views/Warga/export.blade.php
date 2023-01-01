<table>
    <thead>
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Gender</th>
            <th>Tanggal Lahir</th>
            <th>Agama</th>
            <th>Gol. Darah</th>
            <th>Pekerjaan</th>
            <th>RT</th>
            <th>RW</th>
            <th>No. Kartu Keluarga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nik }}</td>
                <td>{{ $item->wargaNama }}</td>
                <td>
                    @if ($item->gender == 1)
                        Pria
                    @else
                        Wanita
                    @endif
                </td>
                <td>{{ $item->tgl_lahir }}</td>
                <td>{{ $item->agama }}</td>
                <td>
                    @if ($item->gol_darah == 1)
                        A
                    @elseif($item->gol_darah == 2)
                        B
                    @elseif($item->gol_darah == 3)
                        AB
                    @else
                        O
                    @endif
                </td>
                <td>{{ $item->pekerjaan }}</td>
                <td>{{ $item->rt }}</td>
                <td>{{ $item->rw }}</td>
                <td>{{ $item->kk }}</td>
            </tr>
        @endforeach
    </tbody>
</table>