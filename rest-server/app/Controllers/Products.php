<?php 

namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ProductModel;
 
class Products extends ResourceController
{
    use ResponseTrait;
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    // get all product
    public function index()
    {
        $data = $this->productModel->findAll();
        return $this->respond($data, 200);
    }
 
}