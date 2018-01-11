<?php
namespace App\Repositories;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductRepository extends BaseRepository{
   
    public function __construct(Product $product)
    {
        $this->entity=$product;
    }

    public function testing(){
        return "ceci vient de mon repos";
    }

    //database

    //***** eloquent *********/ 
   // utilisation des classes  product et order et orderProduct dans model
    public function selectMyproduct($id){
      return Product::find($id);// ex 1
     // Product::all();//ex 2
    //   avantages permet d'appeler les classes qui lui sont liees sans jointures
    //   attention il faut mettre des liens dans les models


    }

    public function selectproductbypriceinferiorto($price){
        $product=Product::where('prix','>',$price)
        ->take(4)
        ->orderBy('prix','desc')
        ->get();
        return $product;
    }

    public function productsbetween($min,$max){
        $product=Product:: whereBetween('prix',array($min,$max)) 
        ->take(10)//10 produits demandes entre min et max
        ->orderBy('prix','desc')
        ->get();
        return $product;
    }
 
    ///2eme facon de passer des requetes use Illuminate\Support\Facades\DB;
    public function selectWithDB(){
       $products=DB::select("select * from products where prix <:prix",array('prix'=>200));
       return $products;
    }

    public function updateWithDB(){
        $products=DB::update("update products set title =:title where id=:id",
        array('title'=>'test',
        'id'=>1
    ));
        //return $products;
     }

     public function insertWithDB(){
        $products=DB::insert("insert into category set category =:category ,description=:description ",
        array('category'=>'test',
        'description'=>'test'
       
    ));
        //return $products;
     }

     public function deleteWithDB(){
        $products=DB::delete("delete from category where category =:category ",
        array('category'=>'test',
        
       
    ));
        //return $products;
     }

     //*********** statement
     public function statementWithDB(){
      // DB::statement("alter table products auto_increment=1");
      // $products= DB::raw("select * products where id=1");
      // return $products;
         }



       //************ 
       //querybuider pour les jointures 
       public function queryBuilderquery(){
        //  return DB::table('products')->get();

          //************* */ jointure
         $products=DB::table('products')
         ->leftJoin('category', 'products.category_id', '=', 'category.id')
         ->select('products.*', 'category.category')
         ->get();
         return $products;
       }

       //***********   transaction */
       //permet en cas d erreur d une operation d'annuler une aute operations

      // pour cela sql gere les transactions à travers du statement "start transaction"
      // 1- insert ..
      // 2- update..
      // si le 1 et 2 sont verifie alors on confirmera avec le statement sql "commit"
      // sinon avec le statement rollback


      public function tansaction(){
        DB::transaction(function(){
        //ici mettre le requetes

        });
        return true; // si true alors succes
      }


}