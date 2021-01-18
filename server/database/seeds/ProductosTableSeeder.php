<?php

use Illuminate\Database\Seeder;
use App\Producto;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->delete();
        $json = File::get("database/data-sample/productos.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Producto::create(array(
              'id' => $obj->id,
              'nombre' => $obj->nombre,
              'precio' => $obj->precio,
              'id_categoria' => $obj->id_categoria
            ));
         }
    }
}
