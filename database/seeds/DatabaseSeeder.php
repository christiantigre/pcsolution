<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $this->call(UserTableSeeder::class);
       $this->call(EmpresTableSeeder::class);
       $this->call(FormatOrderTableSeeder::class);
       $this->call(ClientTableSeeder::class);
       $this->call(ArticuloTableSeeder::class);
       $this->call(EstadosTableSeeder::class);
       $this->call(MarcaTableSeeder::class);
       $this->call(PaisesTableSeeder::class);
       $this->call(ProvinciaTableSeeder::class);
       $this->call(CantonTableSeeder::class);
       $this->call(ParroquiaTableSeeder::class);
       $this->call(ProveedorTableSeeder::class);
       $this->call(IvaTableSeeder::class);
       $this->call(DepartamentoTableSeeder::class);
       $this->call(CargoTableSeeder::class);
       $this->call(GeneroTableSeeder::class);
       $this->call(EstadiCivilTableSeeder::class);
       $this->call(DescuentoTableSeeder::class);
       $this->call(EstadopagoTableSeeder::class);
       $this->call(TipopagoTableSeeder::class);
       $this->call(ServiceTableSeeder::class);
       $this->call(PersonalTableSeeder::class);
   }
}
