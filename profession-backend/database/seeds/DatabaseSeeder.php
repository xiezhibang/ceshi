<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminUsersTableSeeder::class);
        $this->call(AdminPermissionsTableSeeder::class);
        $this->call(AdminRolesTableSeeder::class);
        $this->call(RolePermissionsTableSeeder::class);
        $this->call(MembersTableSeeder::class);
        $this->call(MemberBindsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(OrderItemsTableSeeder::class);
        $this->call(PaymentRecodesTableSeeder::class);
        $this->call(GoodBannersTableSeeder::class);
        $this->call(BannersTableSeeder::class);
        $this->call(WebsitesTableSeeder::class);
        $this->call(GradeOrdersTableSeeder::class);
        $this->call(ShopPermissionsTableSeeder::class);
        $this->call(GoodCategoriesTableSeeder::class);
        $this->call(MemberEquitiesTableSeeder::class);
        $this->call(BlackUpgradesTableSeeder::class);
        $this->call(MemberClubsTableSeeder::class);
        $this->call(ConfigRatesTableSeeder::class);
        $this->call(LeagueGiftBagsTableSeeder::class);
        $this->call(GiftBagRecodesTableSeeder::class);
        $this->call(IndustryCategoriesTableSeeder::class);
        $this->call(IntegralConverOrdersTableSeeder::class);
        $this->call(HelpCatesTableSeeder::class);
        $this->call(HelpArtcilesTableSeeder::class);
        $this->call(FiscalChargesTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(ShopStaffTableSeeder::class);
        $this->call(GoodAttributesTableSeeder::class);
        $this->call(GoodSkusTableSeeder::class);
        $this->call(GoodsTableSeeder::class);
        $this->call(PartnerRecodesTableSeeder::class);
        $this->call(GoodImagesTableSeeder::class);
        $this->call(FeedBacksTableSeeder::class);
        $this->call(FeedBackImagesTableSeeder::class);
        $this->call(StorePartnerDetailsTableSeeder::class);
        $this->call(PartnerInvestsTableSeeder::class);
        $this->call(PartnerReturnDetailsTableSeeder::class);
        $this->call(WithdrawalsTableSeeder::class);
        $this->call(MemberUpgradeMoneyTableSeeder::class);
        $this->call(ShopEvaluatesTableSeeder::class);
        $this->call(ShopCollectsTableSeeder::class);
        $this->call(GoodCollectsTableSeeder::class);
        $this->call(MerchantEntersTableSeeder::class);
        $this->call(PrepaidChangesTableSeeder::class);
        $this->call(MoneyRecodesTableSeeder::class);
        $this->call(ShopImagesTableSeeder::class);
        $this->call(PartnerGiftBagsTableSeeder::class);
        $this->call(GoodCartsTableSeeder::class);
        $this->call(LeagueEngineersTableSeeder::class);
        $this->call(BusinessRecodesTableSeeder::class);
        $this->call(MemberDiscountsTableSeeder::class);
        $this->call(BackgroundImagesTableSeeder::class);
    }
}
