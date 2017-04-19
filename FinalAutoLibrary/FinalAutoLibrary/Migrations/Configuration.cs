namespace FinalAutoLibrary.Migrations
{
    using System;
    using System.Data.Entity;
    using System.Data.Entity.Migrations;
    using System.Linq;
    using Microsoft.AspNet.Identity;
    using FinalAutoLibrary.Models;
    using Microsoft.AspNet.Identity.EntityFramework;

    internal sealed class Configuration : DbMigrationsConfiguration<FinalAutoLibrary.Models.ApplicationDbContext>
    {
        public Configuration()
        {
            AutomaticMigrationsEnabled = true;
            ContextKey = "Identity.Models.ApplicationDbContext";
        }

        protected override void Seed(FinalAutoLibrary.Models.ApplicationDbContext context)
        {
            if(!context.Users.Any(u => u.Email == "ccabr071@fiu.edu"))
            {
                var store = new UserStore<ApplicationUser>(context);
                var manager = new UserManager<ApplicationUser>(store);
                var user = new ApplicationUser { UserName = "ccabr071@fiu.edu", Email = "ccabr071@fiu.edu" };

                manager.Create(user, "P@ssword1");
            }

            context.Books.AddOrUpdate(b => b.Title,
                new Book
                {
                    Title = "The Giving Tree",
                    AuthorFirst = "Shel",
                    AuthorLast = "Silverstein",
                    Genre = "Picture Book",
                    Year = 1964
                });
        }
    }
}
