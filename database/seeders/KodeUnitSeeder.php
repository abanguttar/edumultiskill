<?php

namespace Database\Seeders;

use App\Models\KodeUnit;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KodeUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kode_units = [
            ' P. 8 5 K O R 0 0 . 0 0 2 . 1 - M e n g g u n a k a n B i l a n g a n K o r e a',
            'P. 8 5 K O R 0 0 . 0 0 3 . 1 - M e m p r a k t i k k a n U n g k a p a n D a s a r B a h a s a K o r e a',
            'P. 8 5 K O R 0 0 . 0 0 4 . 1 - M e m p e r k e n a l k a n D i r i d a l a m B a h a s a K o r e a',
            'P. 8 5 K O R 0 0 . 0 0 5 . 1 - M e n j e l a s k a n L e t a k B e n d a d a l a m B a h a s a K o r e a',
            'P. 8 5 K O R 0 0 . 0 0 6 . 1 - M e n j e l a s k a n P a n d u a n A r a h d a l a m B a h a s a K o r e a',
            'P. 8 5 K O R 0 0 . 0 1 2 . 1 - M e m b e l i B a r a n g d a l a m B a h a s a K o r e a',
            'P. 8 5 K O R 0 0 . 0 1 6 . 1 - M e n g a j a k a t a u M e n g u n d a n g d a l a m B a h a s a K o r e a'
        ];


        foreach ($kode_units as $key => $ku) {
            $mock =  explode('-', $ku);
            $kode = str_replace(' ', '', $mock[0]);
            $keterangan = str_replace(' ', '', $mock[1]);
            KodeUnit::create([
                'kelas_id' => 1,
                'kode_unit' => $kode,
                'keterangan' => $keterangan,
                'create_by' => 4
            ]);
        }
    }
}
