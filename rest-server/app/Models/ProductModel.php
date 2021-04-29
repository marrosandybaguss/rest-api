<?php
namespace App\Models;
use CodeIgniter\Model;
class ProductModel extends Model
{
    protected $table = 'products';
    protected $useTimestamps = true;
    protected $allowedFields = ['prod_name', 'prod_type', 'prod_qty', 'prod_notes'];
}