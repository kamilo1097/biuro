namespace Budowlanav2.Migrations
{
    using System;
    using System.Data.Entity.Migrations;
    
    public partial class InitialCreate : DbMigration
    {
        public override void Up()
        {
            CreateTable(
                "dbo.Orders",
                c => new
                    {
                        Id = c.Int(nullable: false, identity: true),
                        Imie = c.String(nullable: false),
                        NumerTel = c.String(),
                        Email = c.String(),
                        BudMurow = c.Boolean(nullable: false),
                        KryDachow = c.Boolean(nullable: false),
                        PraceWyk = c.Boolean(nullable: false),
                        OciepDom = c.Boolean(nullable: false),
                        BudAltan = c.Boolean(nullable: false),
                        BudGrill = c.Boolean(nullable: false),
                        Skonczone = c.Boolean(nullable: false),
                    })
                .PrimaryKey(t => t.Id);
            
        }
        
        public override void Down()
        {
            DropTable("dbo.Orders");
        }
    }
}
