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

    // create a product
    public function create()
    {
        $this->productModel->save([
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_type' => $this->request->getPost('prod_type'),
            'prod_qty' => $this->request->getPost('prod_qty'),
            'prod_notes' => $this->request->getPost('prod_notes')
        ]);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'New Product '.$this->request->getPost('prod_name').' Has Been Created'
            ],
        ];
         
        return $this->respondCreated($response, 201);
    }
 
}