<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{
    protected $table = 'keranjang';
    protected $allowedFields = ['user_id', 'barang_id', 'jumlah'];
}
