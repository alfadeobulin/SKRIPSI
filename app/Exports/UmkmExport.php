<?php

namespace App\Exports;

use App\Models\Umkm;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class UmkmExport implements FromCollection, WithMapping, WithHeadings, WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Umkm::all();
    }

    public function map($usaha): array
    {
        return [
            $usaha->nama_ush,
            $usaha->id_member,
            $usaha->alamat_ush,
            $usaha->id_kec,
            $usaha->id_kel,
            $usaha->ket_ush
        ];
    }

    public function headings(): array
    {
        return [
            'Nama Usaha',
            'Member',
            'Alamat',
            'Kecamatan',
            'Kelurahan',
            'Keterangan'
        ];
    }
    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_NUMBER,
        ];
    }
    
}
