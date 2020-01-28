<?php

use AutoKit\Comment;
use AutoKit\Product;
use AutoKit\Review;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //  $this->call(RolesTableSeeder::class);
     //   $this->call(UsersTableSeeder::class);
       /* try {
            $this->call(MenusTableSeeder::class);
        } catch (PDOException $e) {

        }*/


        try {
            $this->call(ArticlesTableSeeder::class);
        } catch (PDOException $e) {
            Log::info($e);
        }
        /*
                try {
                    $this->call(CategoriesTableSeeder::class);
                } catch (PDOException $e) {

                }

                try {
                    $this->call(BrandsTableSeeder::class);
                } catch (PDOException $e) {

                }

                try {
                    $this->call(ProductsTableSeeder::class);
                } catch (PDOException $e) {

                }




                try {
                    $this->call(SlidersTableSeeder::class);
                } catch (PDOException $e) {

                }

                try {
                    $this->call(CommentsTableSeeder::class);
                } catch (PDOException $e) {

                }

                try {
                    $this->call(ReviewsTableSeeder::class);
                } catch (PDOException $e) {

                }


                factory(Product::class, 500)->create();
                factory(Review::class, 5000)->create();
                factory(Comment::class, 50)->create();*/
    }
}
