namespace Budowlanav2
{
    using System;
    using System.Data.Entity;
    using System.Linq;
    using Budowlanav2.Models;
    using Microsoft.AspNet.Identity.EntityFramework;

    public class OrderDbContext : IdentityDbContext<ApplicationUser>
    {
        // Your context has been configured to use a 'OrderDbContext' connection string from your application's 
        // configuration file (App.config or Web.config). By default, this connection string targets the 
        // 'Budowlanav2.OrderDbContext' database on your LocalDb instance. 
        // 
        // If you wish to target a different database and/or database provider, modify the 'OrderDbContext' 
        // connection string in the application configuration file.
        public OrderDbContext()
            : base("name=OrderDbContext")
        {
        }
        public static OrderDbContext Create()
        {
            return new OrderDbContext();
        }
        public DbSet<Zamowienie> Zamowienia { get; set; }

        // Add a DbSet for each entity type that you want to include in your model. For more information 
        // on configuring and using a Code First model, see http://go.microsoft.com/fwlink/?LinkId=390109.

        // public virtual DbSet<MyEntity> MyEntities { get; set; }
    }

    //public class MyEntity
    //{
    //    public int Id { get; set; }
    //    public string Name { get; set; }
    //}
}