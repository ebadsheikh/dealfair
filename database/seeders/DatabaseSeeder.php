<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            CountrySeeder::class,
            SuperAdminSeeder::class,
            CustomersSeeder::class,
            CommunityCreationProcessSeeder::class,
            StaffSeeder::class,
            AdminSeeder::class,
            BrandSeeder::class,
            CategoriesSeeder::class,
            ColorsSeeder::class,
            CategoryBrandsSeeder::class,
            KeywordsSeeder::class,
            TopicSeeder::class,
            TicketCategoriesSeeder::class,
            TicketSeeder::class,
            SettingsSeeder::class,
            EmailTemplatesSeeder::class,
            ArticleCategorySeeder::class,
            ArticleSeeder::class,
            ReportedUserReasonSeeder::class,
            ReportedUserSeeder::class,
            ListingsSeeder::class,
            ListingCommunitiesSeeder::class,
            StoresSeeder::class
        ]);
    }
}
