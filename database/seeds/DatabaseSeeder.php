<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(StudentsSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(ModelSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(StateSeeder::class);
        $this->call(AudiovisaulFormatSeeder::class);
        $this->call(AudiovisualTypeSeeder::class);
        $this->call(AuthorSeeder::class);
        $this->call(EditorialSeeder::class);
        $this->call(PeriodicPublcationSeeder::class);
        $this->call(LoanableSeeder::class);
        $this->call(LoanSeeder::class);
        $this->call(AudiovisaulEquipmentSeeder::class);
        $this->call(CartographicFormatSeeder::class);
        $this->call(BibliographicMaterialSeeder::class);
        $this->call(BookSeeder::class);
        $this->call(KeyWordSeeder::class);
        $this->call(CopyPeriodicPublicationSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(ArticleKeyWordSeeder::class);
        $this->call(ArticleAuthorSeeder::class);
        $this->call(PenaltySeeder::class);
        $this->call(TimePenaltySeeder::class);
        $this->call(MoneyPenaltySeeder::class);
        $this->call(AudiovisualMaterialSeeder::class);
        $this->call(CartographicMaterialSeeder::class);
        $this->call(AudiovisualMaterialKeyWordSeeder::class);
        $this->call(BibliographicMaterialAuthorSeeder::class);
        $this->call(ThreeDimensionalObjectsSeeder::class);
        $this->call(ThreeDimensionalObjectKeyWordSeeder::class);
        $this->call(CartographicMaterialKeyWordSeeder::class);

        Model::reguard();
    }
}
