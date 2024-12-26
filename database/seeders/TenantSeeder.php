<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\File;
use App\Models\MenuConfig;
use App\Models\Product;
use Illuminate\Database\Seeder;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenantCount = 1;
        $domain = request()->getHost();
        
        for ($i = 0; $i < $tenantCount; $i++) {
            $tenant = Tenant::create([
                'id' => fake()->word()
            ]);
            $tenant->domains()->create([
                'domain' =>  "{$tenant->id}.{$domain}"
            ]);

            $tenant->run(function ($tenant) {
                $fileNames = ['coca', 'cocazero', 'guarana', 'hotdog', 'xbacon', 'xfrango', 'xsalada', 'logorest'];
                User::factory()->count(3)->create();
                foreach ($fileNames as $fileName) {                    
                    $file = File::create([
                        'file_tenant' => $tenant->id,
                        'file_path' => "public/img/{$tenant->id}/{$fileName}.jpg",
                        'file_name' => $fileName,
                        'file_active' => 'a',
                    ]);

                    if ($fileName === 'logorest') {
                        MenuConfig::create([ 
                            'file_id' => $file->id,
                            'menuconf_title' => fake()->sentence(3),
                            'menuconf_description' => fake()->paragraph(),
                            'menuconf_open' => fake()->time('H:i'),
                            'menuconf_lunch' => fake()->time('H:i'),
                            'menuconf_reopen' => fake()->time('H:i'),
                            'menuconf_close' => fake()->time('H:i'),
                            'menuconf_wait_time' => fake()->numberBetween(5, 60),
                            'menuconf_contactphone' => fake()->phoneNumber(),
                            'menuconf_whatsappnumber' => fake()->e164PhoneNumber(),
                            'menuconf_zipcode' => fake()->postcode(),
                            'menuconf_street' => fake()->streetName(),
                            'menuconf_district' => fake()->word(),
                            'menuconf_city' => fake()->city(),
                            'menuconf_state' => fake()->stateAbbr(),
                            'menuconf_number' => fake()->buildingNumber()
                        ]);
                        continue;
                    } 

                    $categoryName = $this->getCategoryName($fileName);
                    $category = Category::firstOrCreate([
                        'category_name' => $categoryName,
                        'category_active' => 'a'
                    ]);

                    Product::factory()->count(1)->create([
                        'product_name' => $fileName,
                        'file_id' => $file->id,
                        'category_id' => $category->id,
                    ]);             
                }
                $this->copySeedImages($tenant->id);                
            });
        }
    }
    private function getCategoryName(string $fileName)
    {
        $arProducts = [     
            'coca' => 'Bebidas',
            'cocazero' => 'Bebidas',
            'guarana' => 'Bebidas',
            'hotdog' => 'Lanches',
            'xbacon' => 'Lanches',
            'xfrango' => 'Lanches',
            'xsalada' => 'Lanches',          
        ];
        return $arProducts[$fileName];
    }

    private function copySeedImages(string $tenantId): void 
    {
        $destinationPath = "/{$tenantId}";
        Storage::makeDirectory($destinationPath, 0755, true);
        $sourcePath = '/imgFactory';
        foreach (Storage::files($sourcePath) as $file) {
            Storage::copy($file, $destinationPath . '/' . basename($file));
        }
    }

}
