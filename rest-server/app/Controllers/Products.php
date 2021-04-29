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

    // get single product
    public function show($id = null)
    {
        $data = $this->productModel->getWhere(['id' => $id])->getResult();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }
 
    // delete product
    public function delete($id = null)
    {
        $data = $this->productModel->find($id);
        if($data){
            $this->productModel->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Deleted'
                ]
            ];
             
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
         
    }
 
}