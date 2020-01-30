namespace Budowlanav2.Migrations
{
    using System;
    using System.Data.Entity.Migrations;
    
    public partial class mig2 : DbMigration
    {
        public override void Up()
        {
            AddColumn("dbo.Orders", "OciepPoddaszy", c => c.Boolean(nullable: false));
            AddColumn("dbo.Orders", "UkladPaneli", c => c.Boolean(nullable: false));
            AddColumn("dbo.Orders", "Malowanie", c => c.Boolean(nullable: false));
            AddColumn("dbo.Orders", "Szpachlowanie", c => c.Boolean(nullable: false));
            AddColumn("dbo.Orders", "KartonGipsy", c => c.Boolean(nullable: false));
            AddColumn("dbo.Orders", "Glazura", c => c.Boolean(nullable: false));
            AddColumn("dbo.Orders", "Terakota", c => c.Boolean(nullable: false));
            AddColumn("dbo.Orders", "NapDachow", c => c.Boolean(nullable: false));
            AddColumn("dbo.Orders", "NapPoddaszy", c => c.Boolean(nullable: false));
            AddColumn("dbo.Orders", "NapKartonGipsy", c => c.Boolean(nullable: false));
            AddColumn("dbo.Orders", "NapGlazura", c => c.Boolean(nullable: false));
            AddColumn("dbo.Orders", "NapTerakota", c => c.Boolean(nullable: false));
            AddColumn("dbo.Orders", "BudDrewutni", c => c.Boolean(nullable: false));
            DropColumn("dbo.Orders", "PraceWyk");
        }
        
        public override void Down()
        {
            AddColumn("dbo.Orders", "PraceWyk", c => c.Boolean(nullable: false));
            DropColumn("dbo.Orders", "BudDrewutni");
            DropColumn("dbo.Orders", "NapTerakota");
            DropColumn("dbo.Orders", "NapGlazura");
            DropColumn("dbo.Orders", "NapKartonGipsy");
            DropColumn("dbo.Orders", "NapPoddaszy");
            DropColumn("dbo.Orders", "NapDachow");
            DropColumn("dbo.Orders", "Terakota");
            DropColumn("dbo.Orders", "Glazura");
            DropColumn("dbo.Orders", "KartonGipsy");
            DropColumn("dbo.Orders", "Szpachlowanie");
            DropColumn("dbo.Orders", "Malowanie");
            DropColumn("dbo.Orders", "UkladPaneli");
            DropColumn("dbo.Orders", "OciepPoddaszy");
        }
    }
}
