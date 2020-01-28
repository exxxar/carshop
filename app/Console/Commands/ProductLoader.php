<?php

namespace AutoKit\Console\Commands;

use AutoKit\Brand;
use AutoKit\Product;
use Doctrine\DBAL\Driver\PDOException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ProductLoader extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //Щётки

        $categories = [
            [
            "id"=>1,
            "title"=>"Щетка",
             ],
          [
              "id"=>1,
            "title"=>"Масло моторное",
       ]
        ,
          [
              "id"=>1,
            "title"=>"Масло трансмиссионное",
        ]
         ];
 //,"Лампа","Жидкость","Дворники","АКБ"
        Log::info("test");

        $reader = IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);
        $spreadsheet = $reader->load("d:\\datatest\\test.xlsx");

        $worksheet = $spreadsheet->getActiveSheet();


        foreach ($worksheet->getRowIterator() as $row) {

            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(FALSE);
            if ($row->getRowIndex() <= 2)
                continue;

            $data = array();

            foreach ($cellIterator as $cell) {
                switch ($cell->getColumn()) {
                    case "B":
                        try {
                            if (!Brand::where("title", $cell->getValue())->first())
                                Brand::create([
                                    'title' => $cell->getValue(),
                                    'alias' => strtolower($cell->getValue())
                                ]);

                            $data["brand_id"] = Brand::where("title", $cell->getValue())->first()->id;
                        } catch (PDOException $e) {

                        }

                        break;
                    case "C":
                        $data["manufacturer_number"] = $cell->getValue();
                        break;
                    case "D":
                        $data["title"] = $cell->getValue();
                        break;
                    case "E":
                        $data["units"] = $cell->getValue();
                        break;
                    case "F":
                        $data["min_in_pack"] = $cell->getValue();
                        break;
                    case "G":
                        $data["original_number"] = $cell->getValue();
                        break;
                    case "H":
                        $data["quantity"] = $cell->getValue();
                        break;
                    case "J":
                        $data["price"] = $cell->getValue();
                        break;
                }


            }

            try {
                Product::create([
                    'title' => $data["title"],
                    'price' => $data["price"],
                    'quantity' => $data["quantity"],
                    'manufacturer_number' => $data["manufacturer_number"],
                    'units' => $data["units"],
                    'original_number' => $data["original_number"],
                    'min_in_pack' => $data["min_in_pack"],
                    'is_top' => 0,
                    'is_new' => 0,
                    'img' => '13f89b040ad84bb78f5fbf991fab52f2.jpg',
                    'description' => '',
                    'category_id' => 1,
                    'brand_id' => $data["brand_id"],
                    'weight' => 0,
                    'width' => 1,
                    'height' => 1,
                    'length' => 1
                ]);
            } catch (PDOException $e) {

            }
        }

    }
}
