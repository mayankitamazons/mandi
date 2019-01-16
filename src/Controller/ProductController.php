<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Event\EventManager;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\Error\Debugger;
use Cake\Http\Exception;

class ProductController extends AppController
{
	function beforeFilter(Event $event) {
	    parent::beforeFilter($event);
	    // $this->getEventManager()->off($this->Csrf);
	    $this->viewBuilder()->setLayout('admin');
	}
	function getRootCategory(){
    	$category = TableRegistry::get('Category');
		$query = $category
	    ->find()
	    ->select(['id','path','level','children_count','position','name','is_active'])
	    ->where(['level ='=>'0']);
	    $simple=[];
	    foreach ($query as $data) {
		   $simple[]=$data;
		}
		return $simple;
    }
    function add(){
    	$root_category = $this->getRootCategory();
    	if ($this->request->is('post')) {
    		$ProductTable = TableRegistry::get('Product');
    		// pr($this->request->getData());die;	
			$request = $this->request->getData();
			

			$request['pic'] = $this->uploadImage($_FILES['pic']);
			$Product = $ProductTable->newEntity($request);
			$result = $ProductTable->save($Product);
			if($result){
				if(!empty($request['category_node']))
				{
					foreach($request['category_node'] as $cid)
					{
						$sub_category[]=['category_id'=>$cid,'product_id'=>$Product->id];
					}
					unset($request['category_node']);
					$request['Subcategory']=$sub_category;
					$SubcategoryTable = TableRegistry::get('Subcategory');
					$entity = $SubcategoryTable->newEntities($sub_category);
					$SubcategoryTable->saveMany($entity);
				}
			}
	    	$this->Flash->success('Product created successfully');
		}
		$this->set(compact('root_category'));
    }
    function deleteProduct($cat_id){
    	if((int)$cat_id >0){
			$ProductTable = TableRegistry::get('Product');
			$Product = $ProductTable->get($cat_id); // Return Product with id 
			$ProductTable->delete($Product);
		}
    }
    function updateProduct($cat_id){
    	if((int)$cat_id >0){
			$ProductTable = TableRegistry::get('Product');
			$Product = $ProductTable->get($cat_id); // Return Product with id 
			$Product->name = $this->request->getData('name');
			$Product->is_active = $this->request->getData('is_active');
			$ProductTable->save($Product);
		}
    }

    function getProductData(){
    	$this->autoRender = false;
    	$this->viewBuilder()->setLayout(false);
    	if ($this->request->is('post')) {
    		$cat_id = $this->request->getData('cat_id'); 
    		$Product = TableRegistry::get('Product');
			$query = $Product
		    ->find()
		    ->select(['id','name','is_active'])
		    ->limit(1)
		    ->where(['id =' => $cat_id]);
		    foreach ($query as $data) {
			   echo json_encode($data);
			}
		    
		}
		exit;
    }
    function subCategoryTree($cat_id=1){
    	
    	$this->viewBuilder()->setLayout(false);
    	$category_data=array();
		if ($this->request->is('post')) {

    		$cat_id = $this->request->getData('cat_id'); 
			$category = TableRegistry::get('Category');
			$query = $category
		    ->find()
		    ->select(['id','path','level','children_count','position','name','is_active'])
		    ->where(['parent_id = '=>$cat_id])
		    ->all()
		    ;
		    foreach ($query as $data) {
			   $category_data[]=$data;
			}	
		}
		$this->set(compact('category_data'));
    }
    function uploadImage($file=''){
    	if(!empty($file)){
    		$source = $file['tmp_name'];

    		$dir = WWW_ROOT."image/";
    		$name = date('Y')."/".date('m')."/".str_replace(" ", "-", $file['name']) . time();
    		if(!file_exists($dir)){
    			mkdir($dir,0777,true);
    		}
    		move_uploaded_file($source, $dir.$name);
    		return $name;
    	}

    }
    function index(){
    	
    	$product_data=array();
		$Product = TableRegistry::get('Product');
		$query = $Product
	    ->find()
	    // ->select(['id','path','level','children_count','position','name','is_active'])
	    ->all()
	    ;
	    foreach ($query as $data) {
		   $product_data[]=$data;
		}	
		// pr($product_data);die;
		$this->set(compact('product_data'));
    }
}
