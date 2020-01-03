namespace Budowlanav2.Migrations
{
    using System;
    using System.Data.Entity.Migrations;
    
    public partial class mig1 : DbMigration
    {
        public override void Up()
        {
            DropColumn("dbo.Orders", "BudMurow");
        }
        
        public override void Down()
        {
            AddColumn("dbo.Orders", "BudMurow", c => c.Boolean(nullable: false));
        }
    }
}
